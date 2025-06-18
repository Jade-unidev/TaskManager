<?php
session_start();
require __DIR__ . '/../config/connect.php';

// Connexion à la base (même config que register)
$host = "localhost";
$dbname = "Task";
$user = "Jade";
$pass = "motdepasse2911.";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupérer l’utilisateur par email
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: index.php");
            exit();
        } else {
            $error = "Mot de passe incorrect !";
        }
    } else {
        $error = "Email introuvable !";
    }
}


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <?php include 'includes/header.php'; ?>

        <div class="body-accueil">

            <!-- From Uiverse.io by Yaya12085 --> 
            <form method="POST" class="form">
                <p class="title">Login </p>   
                <label>
                    <input required name="email" placeholder="" type="email" class="input">
                    <span>Email</span>
                </label> 
                <label>
                    <input required name="password" placeholder="" type="password" class="input">
                    <span>Password</span>
                </label>
                <button type="submit" class="submit">Submit</button>
                <p class="signin">Tu n'as pas de compte ? <a href="register.php" >Register</a> </p>
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            </form>
            
        </div>
        
        <div id="menu-deroulant" class="menu hidden">
            <div class="profil-menu">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu">username</h1>
                <h1 class="mail-menu">exemple@gmail.com</h1>
            </div>
            <button id="account" class="menu-btn">Mon Compte</button>
            <button id="pseudo" class="menu-btn">Modifier le pseudo</button>
            <button id="mdp" class="menu-btn">Modifier le mot de passe</button>
            <button id="mail" class="menu-btn">Modifier l'adresse mail</button>
            <button id="log" class="menu-log">Login</button>
            <button id="deco" class="menu-btn-deco">Se déconnecter</button>
        </div>

        <script src="/assets/menu.js"></script>
    </body>
</html>