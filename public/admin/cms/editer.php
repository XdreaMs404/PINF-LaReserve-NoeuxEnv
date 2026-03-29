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

// Check if style column exists (auto-migration)
try {
    $stmtCol = $pdo->query("SHOW COLUMNS FROM blocs_page LIKE 'style'");
    if ($stmtCol->rowCount() == 0) {
        $pdo->exec("ALTER TABLE blocs_page ADD style VARCHAR(50) NOT NULL DEFAULT 'normal'");
    }
} catch (Exception $e) {}

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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
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
            <div class="form-group" style="margin-top: 10px;">
                <label>Visibilité de la page :</label>
                <select name="page_statut" class="form-control" style="max-width:300px;">
                    <option value="publie" <?= $page['statut'] === 'publie' ? 'selected' : '' ?>>Publiée 🟢 (Visible sur le site)</option>
                    <option value="brouillon" <?= ($page['statut'] === 'brouillon' || $page['statut'] === 'a_valider') ? 'selected' : '' ?>>Masquée 🔴 (Brouillon)</option>
                </select>
            </div>
        </div>

        <div id="blocs-container">
        <?php foreach ($blocs as $bloc): ?>
            <?php
            $texteValue = $bloc['contenu_texte_propose'] !== null ? $bloc['contenu_texte_propose'] : $bloc['contenu_texte_publie'];
            $urlValue = $bloc['url_propose'] !== null ? $bloc['url_propose'] : $bloc['url_publie'];
            $mediaIdValue = $bloc['media_propose_id'] !== null ? $bloc['media_propose_id'] : $bloc['media_publie_id'];
            ?>
            <div id="bloc-<?= $bloc['id'] ?>" class="bloc-item" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 8px; background: #fff; <?= $bloc['statut'] === 'a_valider' ? 'border-left: 4px solid #f59e0b;' : '' ?>">
                <input type="hidden" name="blocs[<?= $bloc['id'] ?>][ordre]" class="bloc-ordre" value="<?= $bloc['ordre'] ?>">
                <div class="drag-handle" title="Déplacer ce bloc" style="cursor: grab; display: inline-block; padding: 5px; margin-right: 15px; color: #999; font-size: 1.5em; vertical-align: middle;">☰</div>
                
                <?php if (Auth::hasRole('administrateur')): ?>
                <a href="supprimer_bloc.php?id=<?= $bloc['id'] ?>&page_id=<?= $page['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bloc ?');" style="float: right; background: #dc3545; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.9em; margin-top: 5px;">🗑️ Supprimer</a>
                <?php endif; ?>
                
                <h3 style="margin-top: 0; color: #2E7D32; display: inline-block; vertical-align: middle;">
                    Bloc : <?= htmlspecialchars($bloc['titre_publie'] ?: ($bloc['titre_propose'] ?? 'Sans titre')) ?>
                    <?php if ($bloc['statut'] === 'a_valider'): ?>
                        <span style="font-size:0.7em; background:#f59e0b; color:white; padding:2px 6px; border-radius:10px; margin-left:10px;">Modifié (à valider)</span>
                    <?php endif; ?>
                </h3>
                
                <div class="form-group" style="margin-bottom: 15px; background: #f1f3f5; padding: 10px; border-radius: 4px;">
                    <label style="font-size: 0.9em; font-weight: bold; color: #555;">Apparence (Style) du bloc :</label>
                    <select name="blocs[<?= $bloc['id'] ?>][style]" class="form-control" style="max-width: 300px; display: inline-block; margin-left: 10px;">
                        <option value="normal" <?= ($bloc['style'] ?? 'normal') === 'normal' ? 'selected' : '' ?>>Normal (Texte classique)</option>
                        <option value="fond_colore" <?= ($bloc['style'] ?? 'normal') === 'fond_colore' ? 'selected' : '' ?>>Fond coloré (Mise en avant)</option>
                        <option value="encadre" <?= ($bloc['style'] ?? 'normal') === 'encadre' ? 'selected' : '' ?>>Encadré discret</option>
                    </select>
                </div>
                
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
                            <img src="../../<?= htmlspecialchars($imgSrc) ?>" style="max-height: 80px; max-width: 120px; object-fit: cover; border-radius: 4px;">
                            <div style="flex-grow: 1;"><strong><?= htmlspecialchars($currentMedia['nom_original'] ?: $currentMedia['chemin_fichier']) ?></strong></div>
                        <?php else: ?>
                            <div style="flex-grow: 1; color: #666; font-style: italic;">Aucune image sélectionnée pour le moment.</div>
                        <?php endif; ?>
                        
                        <a href="../medias/index.php?select_for_page=<?= $page['id'] ?>&bloc_id=<?= $bloc['id'] ?>&site_id=<?= $page['site_id'] ?>" class="btn btn-secondary">🖼️ Choisir depuis la médiathèque</a>
                    </div>
                    <input type="hidden" name="blocs[<?= $bloc['id'] ?>][media_id]" value="<?= htmlspecialchars($mediaIdValue) ?>">
                    <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #2E7D32; color: white; border: none; cursor: pointer; font-size:1.1em; border-radius:6px; margin-top:10px;">
            💾 Enregistrer les modifications
        </button>
    </form>

    <hr style="margin: 40px 0;">
    <h3>➕ Ajouter un nouveau bloc</h3>
    <form action="ajouter_bloc.php" method="POST" style="background: #e9ecef; padding: 15px; border-radius: 8px; border: 1px solid #ced4da; margin-bottom: 20px;">
        <input type="hidden" name="page_id" value="<?= $page['id'] ?>">
        <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
        <div class="form-group" style="margin-bottom: 0;">
            <label style="font-weight: bold; margin-right: 15px;">Type de bloc :</label>
            <select name="type_bloc" class="form-control" required style="max-width: 300px; display: inline-block;">
                <option value="texte">Texte</option>
                <option value="image">Image</option>
                <option value="lien">Lien (Bouton)</option>
            </select>
            <button type="submit" style="padding: 8px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; margin-left: 15px;">
                Ajouter ce bloc
            </button>
        </div>
    </form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('blocs-container');
    if(el) {
        var sortable = Sortable.create(el, {
            handle: '.drag-handle',
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function () {
                var orderInputs = el.querySelectorAll('.bloc-ordre');
                orderInputs.forEach(function(input, index) {
                    input.value = (index + 1) * 10;
                });
            }
        });
    }
});
</script>
<style>
.sortable-ghost { opacity: 0.4; background-color: #f8f9fa; border: 2px dashed #ccc !important; }
.drag-handle:hover { color: #333 !important; }
</style>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>