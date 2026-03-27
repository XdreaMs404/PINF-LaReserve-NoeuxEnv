<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

// Seul un administrateur peut modifier les paramètres globaux
Auth::requireRole('administrateur');

$pdo = Database::getConnection();

// --- 1. Traitement du formulaire ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['parametres'])) {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur de sécurité. Veuillez réessayer.");
    }
    
    // Parcourir chaque paramètre envoyé et le mettre à jour dynamiquement
    foreach ($_POST['parametres'] as $id => $valeur) {
        $stmt = $pdo->prepare("UPDATE parametres SET valeur = :valeur WHERE id = :id");
        $stmt->execute(['valeur' => trim($valeur), 'id' => (int)$id]);
    }
    
    header("Location: index.php?msg=" . urlencode("Les paramètres ont été mis à jour avec succès."));
    exit;
}

// --- 2. Récupération des paramètres pour affichage ---
// Jointure pour afficher proprement le nom du site
$stmt = $pdo->query("
    SELECT p.id, p.cle, p.valeur, s.nom AS nom_site 
    FROM parametres p
    JOIN sites s ON p.site_id = s.id
    ORDER BY s.nom ASC, p.cle ASC
");
$parametres_bruts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// On regroupe les résultats par site pour un affichage propre (Noeux / La Réserve)
$parametres_par_site = [];
foreach ($parametres_bruts as $p) {
    $parametres_par_site[$p['nom_site']][] = $p;
}

$page_title = 'Paramètres Globaux - Admin';
require_once __DIR__ . '/../includes/header.php';
?>
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Paramètres Globaux</h1>
        <a href="../index.php" class="btn btn-secondary">Retour Dashboard</a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div style="background:#e8f5e9; color:#2e7d32; padding:15px; border-radius:5px; margin-bottom:20px; font-weight:bold;">
            ✅ <?= htmlspecialchars($_GET['msg']) ?>
        </div>
    <?php endif; ?>

    <div style="background-color: #e3f2fd; padding:15px; border-radius:5px; border-left: 4px solid #2196f3; margin-bottom: 25px; line-height: 1.5;">
        <strong>ℹ️ Information importante :</strong><br>
        Les valeurs que vous renseignez ici (téléphone, email, liens de réseaux sociaux...) sont répercutées 
        <strong>instantanément sur tout le site public</strong> (pied de page, pages de contact, mentions légales). 
        <br>Assurez-vous de bien vérifier l'exactitude des informations, dont les URL des liens, avant d'enregistrer vos modifications.
    </div>

    <form method="POST" action="index.php">
        <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
        
        <?php foreach ($parametres_par_site as $nom_site => $params): ?>
            <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 30px;">
                <h2 style="color: var(--primary-color); border-bottom: 2px solid #eee; padding-bottom: 10px; margin-top: 0;">🏢 Site : <?= htmlspecialchars($nom_site) ?></h2>
                
                <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                    <thead>
                        <tr>
                            <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; width: 35%;">Paramètre</th>
                            <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd; width: 65%;">Valeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($params as $param): ?>
                            <tr>
                                <td style="padding: 15px 10px; border-bottom: 1px solid #eee; vertical-align: middle;">
                                    <strong style="text-transform: capitalize; font-size: 1.05em;">
                                        <?= htmlspecialchars(str_replace('_', ' ', $param['cle'])) ?>
                                    </strong>
                                </td>
                                <td style="padding: 15px 10px; border-bottom: 1px solid #eee;">
                                    <?php if (strlen($param['valeur']) > 80 || strpos($param['valeur'], "\n") !== false): ?>
                                        <textarea name="parametres[<?= $param['id'] ?>]" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit; resize: vertical; box-sizing: border-box;"><?= htmlspecialchars($param['valeur']) ?></textarea>
                                    <?php else: ?>
                                        <input type="text" name="parametres[<?= $param['id'] ?>]" value="<?= htmlspecialchars($param['valeur']) ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit; box-sizing: border-box;">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>

        <div style="position: sticky; bottom: 20px; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 -4px 15px rgba(0,0,0,0.1); text-align: right; margin-bottom: 40px;">
            <button type="submit" class="btn btn-primary" style="font-size: 1.1em; padding: 10px 20px; cursor: pointer;">💾 Enregistrer tous les paramètres</button>
        </div>
    </form>
    
    <div style="margin-top: 20px; margin-bottom: 100px;">
        <a href="../index.php" style="color: #666; text-decoration: none;">&larr; Retour à l'accueil de l'administration</a>
    </div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
