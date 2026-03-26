<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

Auth::requireRole('lecteur');

$pdo = Database::getConnection();

$page_id = $_GET['id'] ?? 0;

$stmtPage = $pdo->prepare("SELECT * FROM pages WHERE id = :id");
$stmtPage->execute(['id' => $page_id]);
$page = $stmtPage->fetch();

if (!$page) {
    die("Page introuvable.");
}

$stmtBlocs = $pdo->prepare("SELECT * FROM blocs_page WHERE page_id = :page_id ORDER BY ordre ASC");
$stmtBlocs->execute(['page_id' => $page_id]);
$blocs = $stmtBlocs->fetchAll();

$stmtMedias = $pdo->prepare("SELECT id, site_id, chemin_fichier, texte_alt, nom_original FROM medias ORDER BY date_creation DESC");
$stmtMedias->execute();
$medias = $stmtMedias->fetchAll();
?>
<?php
$page_title = 'Modifier la page : ' . $page['titre_publie'];
require_once __DIR__ . '/../includes/header.php';
?>
<script src="https://cdn.tiny.cloud/1/gtwd8p9v2jl2b8lrgma42p04dhd3asgd5a9cshb4d4804b06/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.editeur-wysiwyg',
    plugins: 'lists link',
    toolbar: 'undo redo | fontfamily fontsizeinput | bold italic | alignleft aligncenter alignright | bullist numlist | link',
    menubar: false,
    language: 'fr_FR'
  });
</script>
    <h1>Modifier le contenu : <?= htmlspecialchars($page['titre_publie']) ?></h1>
    <a href="../cms/index.php" class="btn btn-secondary mb-3">Retour gestion page</a>

    <?php if(isset($_GET['success'])): ?>
        <p style="color: green; font-weight: bold;">✅ Modifications enregistrées avec succès !</p>
    <?php endif; ?>

    <form action="sauvegarder_page.php" method="POST">
        <input type="hidden" name="page_id" value="<?= $page['id'] ?>">
        <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">

        <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ddd;">
            <?php if ($page['statut'] === 'a_valider'): ?>
                <div style="margin-bottom:15px; padding:10px; background:#fff3cd; color:#856404; border:1px solid #ffeeba; border-radius:4px;">
                    ⚠️ La page a des propriétés (titre) en attente de validation.
                </div>
            <?php endif; ?>
            <h3 style="margin-top:0;">Paramètres de la page</h3>
            <div class="form-group">
                <label>Titre de la page :</label>
                <?php $titreValue = $page['titre_propose'] !== null ? $page['titre_propose'] : $page['titre_publie']; ?>
                <input type="text" name="page_titre" value="<?= htmlspecialchars($titreValue) ?>" required>
            </div>
            <div class="form-group">
                <label>URL / Slug :</label>
                <input type="text" name="page_url" value="<?= htmlspecialchars($page['identifiant_url']) ?>" required>
            </div>
        </div>

        <?php foreach ($blocs as $bloc): ?>
            <?php
            $texteValue = $bloc['contenu_texte_propose'] !== null ? $bloc['contenu_texte_propose'] : $bloc['contenu_texte_publie'];
            $urlValue = $bloc['url_propose'] !== null ? $bloc['url_propose'] : $bloc['url_publie'];
            $mediaIdValue = $bloc['media_propose_id'] !== null ? $bloc['media_propose_id'] : $bloc['media_publie_id'];
            ?>
            <div id="bloc-<?= $bloc['id'] ?>" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 8px; <?= $bloc['statut'] === 'a_valider' ? 'border-left: 4px solid #f59e0b;' : '' ?>">
                <h3 style="margin-top: 0; color: #2E7D32;">
                    Bloc : <?= htmlspecialchars($bloc['titre_publie'] ?: ($bloc['titre_propose'] ?? 'Sans titre')) ?>
                    <?php if ($bloc['statut'] === 'a_valider'): ?>
                        <span style="font-size:0.7em; background:#f59e0b; color:white; padding:2px 6px; border-radius:10px; margin-left:10px;">Modifié (à valider)</span>
                    <?php endif; ?>
                </h3>
                
                <?php if ($bloc['type'] === 'texte'): ?>
                    <label>Texte :</label>
                    <textarea name="blocs[<?= $bloc['id'] ?>][texte]" class="editeur-wysiwyg" rows="6" style="width: 100%;"><?= htmlspecialchars($texteValue ?? '') ?></textarea>

                <?php elseif ($bloc['type'] === 'lien'): ?>
                    <label>Texte du bouton :</label>
                    <input type="text" name="blocs[<?= $bloc['id'] ?>][texte]" value="<?= htmlspecialchars($texteValue ?? '') ?>" style="width: 100%; margin-bottom: 10px;">
                    <label>URL du lien :</label>
                    <input type="text" name="blocs[<?= $bloc['id'] ?>][url]" value="<?= htmlspecialchars($urlValue ?? '') ?>" style="width: 100%;">

                <?php elseif ($bloc['type'] === 'image'): ?>
                    <?php
                    $currentMedia = null;
                    foreach($medias as $m) {
                        if ($m['id'] == $mediaIdValue) { $currentMedia = $m; break; }
                    }
                    ?>
                    <label>Image associée à ce bloc :</label>
                    <div style="background: white; border: 1px solid #ccc; padding: 10px; border-radius: 4px; display: flex; align-items: center; gap: 15px;">
                        <?php if ($currentMedia): ?>
                            <?php 
                            $imgSrc = strpos($currentMedia['chemin_fichier'], 'assets/') === 0 ? ($currentMedia['site_id'] == 1 ? 'noeux/' : 'reserve/') . $currentMedia['chemin_fichier'] : $currentMedia['chemin_fichier']; 
                            ?>
                            <img src="/<?= htmlspecialchars($imgSrc) ?>" style="max-height: 80px; max-width: 120px; object-fit: cover; border-radius: 4px;">
                            <div style="flex-grow: 1;"><strong><?= htmlspecialchars($currentMedia['nom_original'] ?: $currentMedia['chemin_fichier']) ?></strong></div>
                        <?php else: ?>
                            <div style="flex-grow: 1; color: #666; font-style: italic;">Aucune image sélectionnée pour le moment.</div>
                        <?php endif; ?>
                        
                        <a href="/admin/medias/index.php?select_for_page=<?= $page['id'] ?>&bloc_id=<?= $bloc['id'] ?>&site_id=<?= $page['site_id'] ?>" class="btn btn-secondary">🖼️ Choisir depuis la médiathèque</a>
                    </div>
                    <input type="hidden" name="blocs[<?= $bloc['id'] ?>][media_id]" value="<?= htmlspecialchars($mediaIdValue) ?>">
                    <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" style="padding: 10px 20px; background-color: #2E7D32; color: white; border: none; cursor: pointer; font-size:1.1em; border-radius:6px; margin-top:10px;">
            💾 <?= Auth::hasRole('administrateur') ? 'Enregistrer et PUBLIER' : 'Enregistrer (Brouillon à valider)' ?>
        </button>
    </form>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>