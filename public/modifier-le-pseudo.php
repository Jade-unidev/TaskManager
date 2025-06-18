<?php
session_start();
?>

<?php
require __DIR__ . '/../config/connect.php'; // $pdo déjà déclaré ici
require __DIR__ . '/../config/user-var.php';

$message = ''; // Pour afficher le message plus bas

// ⚠️ Simule un utilisateur connecté (remplace par $_SESSION['id'] plus tard)
$id = $_SESSION['id'] ?? 1; // récupère l'id dans la session ou 1 par défaut (à adapter)


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'] ?? '';

    if (!empty($newUsername)) {
        $stmt = $conn->prepare("UPDATE user SET username = ? WHERE id = ?");
        $stmt->bind_param("si", $newUsername, $id);
        $stmt->execute();
        $stmt->close();

        $message = "Pseudo mis à jour avec succès !";
    } else {
        $message = "Champ vide !";
    }
    $_SESSION['username'] = $newUsername;

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

                    <label class="title-enter" for="username">Entre ton nouveau pseudo</label>

                    <form class="form-modif" action="" method="post">
                        <input type="text" name="username" placeholder="Nouveau pseudo :" class="input-modif" id="username" required>
                        <button class="btn-modif" type="submit">Mettre à jour</button>
                    </form>

                </div>

                <?php if (!empty($message)): ?>
                    <p class="msg-info"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>

            </div>

        <div id="menu-deroulant" class="menu hidden">
            <div class="profil-menu">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu">username</h1>
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