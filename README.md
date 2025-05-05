# Guide de Configuration pour le Projet PHP avec MAMP

## 1. Installation de MAMP

MAMP est un environnement de développement local pour macOS qui permet de configurer facilement un serveur Apache, MySQL et PHP.

### Installation de MAMP

1. **Téléchargement** :
    - Rendez-vous sur le site officiel de [MAMP](https://www.mamp.info/en/) et téléchargez la version pour macOS ou PC.

2. **Installation** :
    - Suivez les instructions d'installation. Assurez-vous de cocher les options pour installer Apache, MySQL, et PHP.

3. **Démarrage** :
    - Après l'installation, ouvrez MAMP et démarrez les serveurs Apache et MySQL.

## 2. Configuration de la Base de Données

1. **Accéder à phpMyAdmin** :
    - Ouvrez votre navigateur et accédez à l'adresse indiquée dans votre MAMP.

2. **Créer une Base de Données** :
    - Cliquez sur "Nouvelle" pour créer une nouvelle base de données.
    - Nommez votre base de données (ici `db`).

3. **Importer le Schéma de la Base de Données** :
    - Utilisez le script SQL suivant pour créer les tables nécessaires, ici un exemple mais vous pouvez retrouver les tables dans le fichier `dd.sql`

```sql
CREATE DATABASE calendrier_db;

USE calendrier_db;

CREATE TABLE school_years (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL
);

CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    school_year_id INT,
    FOREIGN KEY (school_year_id) REFERENCES school_years(id)
);

CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    class_id INT,
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

CREATE TABLE trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20)
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME,
    module_id INT,
    trainer_id INT,
    class_id INT,
    description TEXT,
    FOREIGN KEY (module_id) REFERENCES modules(id),
    FOREIGN KEY (trainer_id) REFERENCES trainers(id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    role ENUM('admin', 'formateur', 'etudiant') NOT NULL
);
```

## 3. Configuration du Projet PHP
Structure du Projet

    Placez votre projet PHP dans le répertoire htdocs de MAMP.
    Assurez-vous que les fichiers nécessaires (index.php, db.php, functions.php, etc.) sont présents.

### Connexion à la Base de Données

    Dans votre fichier db.php, configurez la connexion à la base de données en utilisant les informations suivantes :

```<?php
\$host = 'localhost';
\$db = 'calendrier_db';
\$user = 'root';
\$pass = 'root'; // Le mot de passe par défaut pour MAMP est souvent "root"

try {
    \$pdo = new PDO("mysql\:host=\$host;dbname=\$db", \$user, \$pass);
    \$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException \$e) {
    die("Could not connect to the database \$db :" . \$e->getMessage());
}
?>
```

## 4. Lancer le Projet
Démarrer le Serveur

    Assurez-vous que les serveurs Apache et MySQL sont en cours d'exécution dans MAMP.

Accéder au Projet

    Vous pouvez rentrer la commande `php -S localhost:8000` pour accéder au front depuis cette adresse

## 5. Dépannage

    Vérifiez les Logs : Si vous rencontrez des problèmes, consultez les logs d'Apache et de MySQL dans MAMP pour plus d'informations.
    Cache du Navigateur : Parfois, les modifications ne sont pas visibles à cause du cache du navigateur. Essayez de vider le cache ou de recharger la page avec Ctrl + F5.

