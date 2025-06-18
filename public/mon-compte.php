<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';
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

            <div class="div-under-user">

                <h1 class="membre">Salut ! Bienvenue sur ta To-Do List pérsonalisée !</h1>

            </div>

        </div>

        <script src="/assets/menu.js"></script>
    </body>
</html>