# 🚀 Projet PINF - La Réserve & Noeux Environnement

Bienvenue dans le backend du projet ! Ce dépôt contient la nouvelle architecture sécurisée pour nos sites web.

---

## 💾 1. La Base de Données (Le plus important !)

Le site utilise MySQL pour stocker les utilisateurs et leurs accès.

### Comment l'installer ?
1.  Ouvre **phpMyAdmin**.
2.  Crée une nouvelle base de données nommée `pinf_syra` (ou le nom que tu veux).
3.  Clique sur l'onglet **Importer** et choisis le fichier `sql/pinf_syra.sql`.
4.  C'est prêt !

### Les identifiants de test
Une fois importée, tu peux te connecter avec :
- **Email :** `admin@pinf.local` 
- **Mot de passe :** `Admin123!`

---

## 🏗️ 2. L'Architecture (C'est quoi ces nouveaux dossiers ?)

On a séparé le projet pour qu'il soit plus sécurisé et organisé :

*   **`public/`** : C'est la seule partie "visible" sur Internet. Elle contient le site **La Réserve**.
*   **`src/`** : Le "cerveau" PHP (Authentification, gestion des fichiers). C'est caché pour la sécurité.
*   **`config/`** : Les réglages (connexion à la BDD).
*   **`Noeux_Environnement/`** : L'ancien dossier statique (à intégrer plus tard).

---

## 🛠️ 3. Comment lancer le projet sur ton ordi ?

Pas besoin de WAMP/XAMPP si tu as PHP installé, utilise cette commande simple dans ton terminal :

```bash
# Place-toi dans le dossier du projet, puis tape :
php -S localhost:8000 -t public
```

Ensuite, ouvre ton navigateur sur : `http://localhost:8000`

---

## 🔐 4. Configuration personnelle (`.env`)

Il y a un fichier caché nommé `.env` à la racine. Il contient les accès à **TA** base de données locale. 
Si ton mot de passe phpMyAdmin est différent (par exemple si tu es sur Mac avec MAMP), modifie ce fichier :

```ini
DB_USER=root
DB_PASS=root  # ou vide "" sur WAMP
```

**⚠️ Attention :** Ne supprime jamais le `.env` et ne le partage pas sur GitHub (il est ignoré automatiquement).

---

## ✅ 5. Checklist pour tester
1.  Va sur `/login.php` et connecte-toi avec l'admin.
2.  Va dans le menu **"Gérer les utilisateurs"** (tu peux en créer de nouveaux).
3.  Va dans **"Gérer les médias"** pour tester l'upload d'images.
4.  Vérifie que les images arrivent bien dans `public/uploads/`.

---
*Projet réalisé pour l'étape Backend - PINF.*
