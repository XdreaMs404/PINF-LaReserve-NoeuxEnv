<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
Auth::requireRole('redacteur');

$pdo = Database::getConnection();
$isAdmin = Auth::hasRole('administrateur');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::check($_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF - Veuillez réessayer.");
    }

    $site_id = (int) $_POST['site_id'];
    $titre = trim($_POST['titre']);
    $url = trim($_POST['identifiant_url']);
    
    // Rédacteur crée -> A valider. Admin crée -> Brouillon (en attente d'ajout de contenu)
    $statut = $isAdmin ? 'brouillon' : 'a_valider';
    $userId = $_SESSION['user']['id'] ?? null;

    if (!empty($titre) && !empty($url) && $site_id > 0) {
        $stmt = $pdo->prepare("INSERT INTO pages (site_id, identifiant_url, titre_publie, statut, dernier_modifie_par_id, date_creation) VALUES (:site_id, :url, :titre, :statut, :uid, NOW())");
        $stmt->execute([
            'site_id' => $site_id,
            'url' => $url,
            'titre' => $titre,
            'statut' => $statut,
            'uid' => $userId
        ]);
        
        $new_id = $pdo->lastInsertId();
        header("Location: editer.php?id=" . $new_id . "&success=1");
        exit;
    }
}

// Récupérer les sites pour le select
$sites = $pdo->query("SELECT id, nom FROM sites ORDER BY nom ASC")->fetchAll();

$page_title = 'Créer une page - Admin';
require_once __DIR__ . '/../includes/header.php';
?>
<div style="display:flex; justify-content:space-between; align-items:center;">
    <h1>Créer une nouvelle page</h1>
    <a href="index.php" class="btn btn-secondary">Retour à la liste</a>
</div>

<p>Créez une page vierge puis ajoutez-y des blocs de contenu de votre choix.</p>

<form method="POST" action="ajouter.php" style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #ddd; max-width: 600px; margin-top: 20px;">
    <input type="hidden" name="csrf_token" value="<?= Csrf::token() ?>">
    
    <div style="margin-bottom: 15px;">
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Site de destination <span style="color:red;">*</span> :</label>
        <select name="site_id" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
            <option value="">-- Choisir un site --</option>
            <?php foreach($sites as $site): ?>
                <option value="<?= $site['id'] ?>"><?= htmlspecialchars($site['nom']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Titre de la page <span style="color:red;">*</span> :</label>
        <input type="text" name="titre" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" placeholder="Ex: Nos partenaires, Politique de confidentialité...">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Identifiant URL (Slug) <span style="color:red;">*</span> :</label>
        <input type="text" name="identifiant_url" required pattern="[a-z0-9\-]+" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;" placeholder="Ex: politique-de-confidentialite">
        <small style="color: #666; display:block; margin-top:5px;">Uniquement des lettres minuscules, chiffres, et tirets. Pas d'espaces ni d'accents.</small>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-top: 10px; width: 100%; font-size: 1.1em; background: #2E7D32; color:white; border:none; border-radius:4px; padding:10px; cursor:pointer;">Enregistrer et passer à l'édition</button>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
