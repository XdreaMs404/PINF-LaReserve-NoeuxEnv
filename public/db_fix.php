<?php
require_once __DIR__ . '/../config/bootstrap.php';
$pdo = Database::getConnection();

// Fix hardcoded HTML links in DB
$pdo->exec("UPDATE blocs_page SET url_publie = '/reserve/index.php' WHERE url_publie = 'la-reserve.html'");
$pdo->exec("UPDATE blocs_page SET url_propose = '/reserve/index.php' WHERE url_propose = 'la-reserve.html'");

echo "DB Fixed";
unlink(__FILE__); // self-destruct after execution
