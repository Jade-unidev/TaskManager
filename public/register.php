<?php
require __DIR__ . '/../config/connect.php';
?>

<?php
// Connexion à la base
$host = "localhost";
$dbname = "Task";
$user = "Jade";
$pass = "motdepasse2911.";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nom']; // Champ <input name="nom">
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $check = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        $message = "Cet email est déjà utilisé !";
    } else {
        // Insertion
        $sql = "INSERT INTO user (name, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $username, $email, $password]);

        $message = "Inscription réussie !";
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

            <form method="POST" class="form">
                <p class="title">Register </p>
                <label>
                    <input type="text" name="nom" placeholder="" class="input" required>
                    <span>Prénom</span>
                </label>
                <label>
                    <input type="text" name="username" placeholder="" class="input" required>
                    <span>Username</span>
                </label>
                <label>
                    <input type="email" name="email" placeholder="" class="input" required>
                    <span>Email</span>
                </label> 
                <label>
                    <input type="password" name="password" placeholder="" class="input" required>
                    <span>Password</span>
                </label>
                <button type="submit" class="submit">Submit</button>
                <p class="signin">Tu as déjà un compte ? <a href="login.php">Login</a> </p>
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