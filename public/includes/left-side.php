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
        <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <div class="left-side-account">
            
            <div class="profil-menu2">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu2"><?= htmlspecialchars($name) ?></h1>
                <div id="back" class="container-button">
                    <div id="back" class="hover bt-1"></div>
                    <div id="back" class="hover bt-2"></div>
                    <div id="back" class="hover bt-3"></div>
                    <div id="back" class="hover bt-4"></div>
                    <div id="back" class="hover bt-5"></div>
                    <div id="back" class="hover bt-6"></div>
                    <button id="back" class="button-back"></button>
                </div>
            </div>
            <div class="div-btn-side">
            <button id="myaccount" class="menu-btn2">Mon Compte</button>
            <button id="pseudo" class="menu-btn2">Modifier le pseudo</button>
            <button id="mdp" class="menu-btn2">Modifier le mot de passe</button>
            <button id="mail" class="menu-btn2">Modifier l'adresse mail</button>
            <div class="log-div">
                <button id="log" class="menu-log">Login</button>
                <button id="reg" class="menu-reg">Register</button>
            </div>
            <button id="deco" class="menu-btn-deco2">Se déconnecter</button>
            </div>

        </div>

        <div class="separation-side"></div>
        
        <script src="/assets/menu.js"></script>
    </body>
</html>