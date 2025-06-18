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
        
        <?php include 'includes/header-accueil.php'; ?>
        <div class="separation-header"></div>
        <div class="body-accueil">
            <h1 class="salut-name">Bonjour <?= htmlspecialchars($name) ?> !</h1>
            <h1 class="title-accueil-tm">TaskManager</h1>
            <h3 class="under-title-accueil">Moins de stress, plus de progrès.</h3>
            <div class="ico_div">
                <img src="includes/images/ico.png" class="ico">
            </div>
        </div>

        <h2 class="desc">
            Pour continuer, il faut d'abord t’enregistrer. 
            <br>Si tu l’as déjà fait, clique simplement sur le bouton To-Do List en haut pour accéder à ta liste. 
            <br>Sinon, rends-toi sur ton profil en haut à gauche pour gérer les paramètres de ton compte.
        </h2>

        <div class="bande">
            <h1 class="title-bande">Derrière ce projet</h1>
        </div>
        <div class="under-bande">
            <div class="bull1">
                <h1 class="txt1">
                    Ce site a été conçu et développé par Jade, une 
                    <br>lycéenne passionnée par le développement, 
                    <br>dans le cadre d’un stage de seconde.
                    <br>L’objectif ? Créer une application simple, 
                    <br>intuitive et efficace pour gérer ses tâches au 
                    <br>quotidien.
                    <br>TaskManager, c’est le fruit d’un stage, de 
                    <br>beaucoup d’apprentissage, et surtout d’une 
                    <br>grosse dose de motivation.
                </h1>
            </div>
            <div class="bull2">
                <h1 class="txt2">
                    Ce site a été conçu et développé par Jade, une 
                    <br>lycéenne passionnée par le développement, 
                    <br>dans le cadre d’un stage de seconde.
                    <br>L’objectif ? Créer une application simple, 
                    <br>intuitive et efficace pour gérer ses tâches au 
                    <br>quotidien.
                    <br>TaskManager, c’est le fruit d’un stage, de 
                    <br>beaucoup d’apprentissage, et surtout d’une 
                    <br>grosse dose de motivation.
                </h1>
            </div>
            <div class="droit">
                <h1 class="txt-droit">© Jade Dousset 2025 - TaskManager - Tous droits réservés</h1>
            </div>
        </div>

        <div id="menu-deroulant" class="menu hidden">
            <div class="profil-menu">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu"><?= htmlspecialchars($name) ?></h1>
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