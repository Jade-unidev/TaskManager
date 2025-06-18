<?php
$servername = "localhost";
$username = "Jade";
$password = "motdepasse2911."; // ou ton mot de passe root si tu en as mis un
$dbname = "Task"; // crée ta base dans MySQL avant 

// Création de connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>