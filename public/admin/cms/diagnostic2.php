<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$pdo = Database::getConnection();

// Also update TinyMCE blocks that might contain the string.
$cnt1 = $pdo->exec("UPDATE blocs_page SET contenu_texte_publie = REPLACE(contenu_texte_publie, 'la-reserve.html', '/reserve/index.php')");
$cnt2 = $pdo->exec("UPDATE blocs_page SET contenu_texte_propose = REPLACE(contenu_texte_propose, 'la-reserve.html', '/reserve/index.php')");

// Also check the specific reserve_bouton if it was somehow skipped
$cnt3 = $pdo->exec("UPDATE blocs_page SET url_publie = '/reserve/index.php' WHERE url_publie LIKE '%la-reserve.html%'");
$cnt4 = $pdo->exec("UPDATE blocs_page SET url_propose = '/reserve/index.php' WHERE url_propose LIKE '%la-reserve.html%'");

echo "Deep DB patch completed. Text blocks replaced: Publie=$cnt1, Propose=$cnt2. Links replaced: Publie=$cnt3, Propose=$cnt4.";
