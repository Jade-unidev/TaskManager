<?php
session_start();

require __DIR__ . '/../config/connect.php'; // $conn est ton mysqli ici
require __DIR__ . '/../config/user-var.php';

$message = '';
$error = '';

// Simule ou récupère l'id utilisateur connecté
$id = $_SESSION['id'] ?? 1; // à adapter plus tard

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPass = $_POST['old-pass'] ?? '';
    $newPass = $_POST['new-pass'] ?? '';

    if (!empty($oldPass) && !empty($newPass)) {
        // On récupère le mot de passe actuel depuis la base
        $stmt = $conn->prepare("SELECT password FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($currentHashedPassword);
        $stmt->fetch();
        $stmt->close();

        // On vérifie que l'ancien mot de passe est correct
        if (password_verify($oldPass, $currentHashedPassword)) {
            // On hash le nouveau mot de passe
            $newHashedPassword = password_hash($newPass, PASSWORD_DEFAULT);

            // On le met à jour dans la base
            $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $newHashedPassword, $id);
            $stmt->execute();
            $stmt->close();

            $message = "Mot de passe mis à jour avec succès !";
        } else {
            $error = "Ancien mot de passe incorrect.";
        }
    } else {
        $error = "Remplis tous les champs s'il te plaît";
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
    </head>
    <body>
        
        <?php include 'includes/header.php'; ?>

        <?php include 'includes/left-side.php'; ?>

        <div class="body-account">

            <div id="back" class="container-button">
                <div id="back" class="hover bt-1"></div>
                <div id="back" class="hover bt-2"></div>
                <div id="back" class="hover bt-3"></div>
                <div id="back" class="hover bt-4"></div>
                <div id="back" class="hover bt-5"></div>
                <div id="back" class="hover bt-6"></div>
                <button id="back" class="button-back"></button>
            </div>

            <div class="profil-account">    
                <img src="includes/images/pdp.png" class="pdp-account">
                <h1 class="username-account"><?= htmlspecialchars($_SESSION['username'] ?? 'Invité') ?></h1>
            </div>

            <div class="div-under-username">

                <label class="title-enter-vari" for="username">Change ton mot de passe :</label>

                    <form class="form-modif-vari" action="" method="post">
                        <input type="password" name="old-pass" placeholder="Ancien mot de passe :" class="input-modif-vari" id="old-pass" required>
                        <input type="password" name="new-pass" placeholder="Nouveau mot de passe :" class="input-modif-vari2" id="new-pass" required>
                        <button class="btn-modif-vari" type="submit">Mettre à jour</button>
                    </form>
       
            </div>

            <?php if (!empty($message)) : ?>
                        <p class="msg-info2"><?= htmlspecialchars($message) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($error)) : ?>
                        <p class="msg-info2"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>

        </div>

        


        <div id="menu-deroulant" class="menu hidden">
            <div class="profil-menu">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu">username</h1>
                <h1 class="mail-menu">exemple@gmail.com</h1>
            </div>
            <button id="myaccount" class="menu-btn">Mon Compte</button>
            <button id="pseudo" class="menu-btn">Modifier le pseudo</button>
            <button class="menu-btn">Modifier le mot de passe</button>
            <button class="menu-btn">Modifier l'adresse mail</button>
            <button class="menu-btn-deco">Se déconnecter</button>
        </div>

        <script src="/assets/menu.js"></script>
    </body>
</html>