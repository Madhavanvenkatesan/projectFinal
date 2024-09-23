<?php
require 'controllers/connectionCtrl.php'; // Include the connection controller
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Main stylesheet -->
    <link rel="stylesheet" href="assets/css/connection.css"> <!-- Connection page stylesheet -->
    <title>connection</title>
</head>

<body>
    <header>
        <!-- import nav bar from UI -->
        <?php include "ui/nav.php"; ?>
    </header>
    <main>
        <div class="mainContainer"> <!-- Main container for content -->
            <div>
                <h2 id="test">Sign in</h2> <!-- heading -->
            </div>
            <div class="signinField"> <!-- Sign-in form section -->
                <form method="POST"> <!-- Form submission via POST -->
                    <!-- Email input -->
                    <label for="email">Email</label>
                    <input type="email" name="login_email" placeholder="Email" required>
                    <?php if (!empty($error) && !empty($error['login_email'])) { ?>
                        <!-- Error message for email -->
                        <small style="color:red"><?= $error['login_email'] ?></small>
                    <?php } ?>
                    <!-- Password input -->
                    <label for="password">Mot de passe</label>
                    <input type="password" name="login_password" placeholder="Mot de passe" required>
                    <?php if (!empty($error) && !empty($error['login_password'])) { ?>
                        <!-- Error message for password -->
                        <small style="color:red"><?= $error['login_password'] ?></small>
                    <?php } ?>
                    <!-- Submit button -->
                    <button name="type" value="login" type="submit">Connexion</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script> <!-- Main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Ionicons script -->
</body>

</html>