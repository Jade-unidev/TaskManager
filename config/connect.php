<?php
$host = 'localhost';
$db = 'TM';
$user = 'jade';
$pass = 'motdepasse2911.'; // Mets le bon !

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
?>
