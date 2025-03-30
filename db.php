<?php
// db.php
$host = 'localhost:3306'; // Adresse du serveur de base de données
$db = 'calendar_app'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur de la base de données
$pass = ''; // Mot de passe de la base de données

try {
    // Créer une nouvelle connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    die("Impossible de se connecter à la base de données $db : " . $e->getMessage());
}
?>
