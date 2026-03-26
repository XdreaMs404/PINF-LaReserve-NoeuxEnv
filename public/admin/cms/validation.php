<?php
$page_title = 'Contenus à valider - Admin';
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('administrateur');

$pdo = Database::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valider_page_id'])) {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF.");
    }
    
    $pid = (int)$_POST['valider_page_id'];
    
    // Publier le titre de la page
    $pdo->prepare("UPDATE pages SET titre_publie = COALESCE(titre_propose, titre_publie), titre_propose = NULL, statut = 'publie' WHERE id = ?")->execute([$pid]);
    
    // Publier les blocs de la page
    $pdo->prepare("UPDATE blocs_page SET 
        contenu_texte_publie = COALESCE(contenu_texte_propose, contenu_texte_publie), contenu_texte_propose = NULL,
        url_publie = COALESCE(url_propose, url_publie), url_propose = NULL,
        media_publie_id = COALESCE(media_propose_id, media_publie_id), media_propose_id = NULL,
        statut = 'publie' 
        WHERE page_id = ? AND statut = 'a_valider'")->execute([$pid]);

    header("Location: validation.php?msg=" . urlencode("Page validée et publiée avec succès !"));
    exit;
}

$stmt = $pdo->query("SELECT p.id, p.titre_publie, p.statut as page_statut, s.nom as site_nom,
                     (SELECT COUNT(*) FROM blocs_page bp WHERE bp.page_id = p.id AND bp.statut = 'a_valider') as blocs_modifies,
                     u.email as dernier_auteur
                     FROM pages p 
                     JOIN sites s ON p.site_id = s.id
                     LEFT JOIN utilisateurs u ON p.dernier_modifie_par_id = u.id
                     WHERE p.statut = 'a_valider' OR EXISTS (SELECT 1 FROM blocs_page bp WHERE bp.page_id = p.id AND bp.statut = 'a_valider')
                     ORDER BY p.date_modification DESC");
$pagesAValider = $stmt->fetchAll();

require_once __DIR__ . '/../includes/header.php';
?>
<h1>Contenus en attente de validation</h1>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
<?php endif; ?>

<p>Voici la liste des pages qui ont été modifiées par les rédacteurs et qui attendent votre validation.</p>

<?php if (empty($pagesAValider)): ?>
    <div style="background:#f8f9fa; padding:30px; text-align:center; border-radius:8px; border:1px solid #ddd;">
        <h3>🎉 Tout est à jour !</h3>
        <p style="color:#666;">Aucune modification en attente de validation.</p>
    </div>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Site</th>
                <th>Page modifiée</th>
                <th>Modifications</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagesAValider as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['site_nom']) ?></td>
                <td><strong><?= htmlspecialchars($p['titre_publie']) ?></strong></td>
                <td>
                    <?php if ($p['page_statut'] === 'a_valider'): ?>
                        <span style="background:#f59e0b; color:white; padding:2px 6px; border-radius:10px; font-size:0.8em;">Paramètres page</span>
                    <?php endif; ?>
                    <?php if ($p['blocs_modifies'] > 0): ?>
                        <span style="background:#3b82f6; color:white; padding:2px 6px; border-radius:10px; font-size:0.8em;"><?= $p['blocs_modifies'] ?> bloc(s)</span>
                    <?php endif; ?>
                </td>
                <td><small><?= htmlspecialchars($p['dernier_auteur'] ?? 'Inconnu') ?></small></td>
                <td>
                    <a href="editer.php?id=<?= $p['id'] ?>" class="btn btn-secondary btn-sm" target="_blank" title="Ouvrir l'éditeur pour voir les brouillons">👀 Voir</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
                        <input type="hidden" name="valider_page_id" value="<?= $p['id'] ?>">
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Publier ces modifications pour le grand public ?');">✅ Valider et Publier</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
