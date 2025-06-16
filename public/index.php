<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

require __DIR__ . '/../config/connect.php';




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
    </head>
    <body>
        
        <?php include 'includes/header-accueil.php'; ?>

        <div class="separation-header"></div>

        <div class="body-accueil">

            <h1 class="title-accueil-tm">TaskManager</h1>

            <h3 class="under-title-accueil">Moins de stress, plus de progrès.</h3>

            <div class="ico_div">

                <img src="includes/images/ico.png" class="ico">

            </div>

            <button class="btn_start" id="start"><h1 class="title_btn">COMMENCER MAINTENANT</h1></button>

        </div>

    </body>
</html>