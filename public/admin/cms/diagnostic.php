<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$pdo = Database::getConnection();

$stmt = $pdo->query("SELECT id, titre_publie, url_publie, url_propose FROM blocs_page WHERE type = 'lien'");
$blocs = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($blocs as $b) {
    echo "ID: {$b['id']} | Titre: {$b['titre_publie']} | Publie: {$b['url_publie']} | Propose: {$b['url_propose']}\n";
}

$cnt1 = $pdo->exec("UPDATE blocs_page SET url_publie = '/reserve/index.php' WHERE url_publie = 'la-reserve.html'");
$cnt2 = $pdo->exec("UPDATE blocs_page SET url_propose = '/reserve/index.php' WHERE url_propose = 'la-reserve.html'");

echo "\nUpdated rows publie: $cnt1 | propose: $cnt2";
