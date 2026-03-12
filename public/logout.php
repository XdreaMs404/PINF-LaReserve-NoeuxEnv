<?php
require_once __DIR__ . '/../config/bootstrap.php';

Auth::logout();
header('Location: /noeux/index.php?view=accueil');
exit;
