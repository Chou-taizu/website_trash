<?php
$host = '51.44.23.21:3000'; // Adresse du serveur MySQL
$db = 'poubelle'; // Remplace par le nom de ta base de données
$user = 'chou'; // Remplace par ton utilisateur MySQL (par défaut 'root' sous XAMPP)
$pass = '1234'; // Mot de passe (vide par défaut sous XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
