<?php
require 'controllers/connectionCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/connection.css">
    <title>connection</title>
</head>

<body>
    <header>
        <nav>
            <div><img src="assets/img/logoWhite.svg" alt="logo"></div>
            <div id="navList" class="navList">
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="gallery.php">GALERIES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="connection.php">CONNECTION</a></li>
            </div>
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>
        </nav>
    </header>
    <main>
        <div class="mainContainer">
            <div>
                <h2 id="test">Sign in</h2>
            </div>
            <div class="signinField">
                <form method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="login_email" placeholder="Email" required>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="login_password" placeholder="Mot de passe" required>
                    <button name="type" value="login" type="submit">Connexion</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>