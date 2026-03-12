<?php
// config/seed_users.php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/db.php';

echo "Seeding users...\n";

$pdo = Database::getConnection();

$users = [
    [
        'email' => 'admin@pinf.local',
        'password' => 'Admin123!',
        'role' => 'administrateur'
    ],
    [
        'email' => 'redacteur@pinf.local',
        'password' => 'Redac123!',
        'role' => 'redacteur'
    ],
    [
        'email' => 'lecteur@pinf.local',
        'password' => 'Lecteur123!',
        'role' => 'lecteur'
    ]
];

foreach ($users as $u) {
    // Check if exists
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $stmt->execute([$u['email']]);
    if ($stmt->fetch()) {
        echo "User {$u['email']} already exists.\n";
        continue;
    }

    $hash = password_hash($u['password'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (email, mot_de_passe_hash, role, actif) VALUES (?, ?, ?, 1)");
    $stmt->execute([$u['email'], $hash, $u['role']]);
    echo "Created user {$u['email']}\n";
}

echo "Done.\n";
