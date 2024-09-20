<?php
require 'controllers/createUserCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>admin</title>
</head>

<body>
    <main>
        <div id="slideLeft" class="slideLeft">
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>
            <div class="profileInfo">
                <div class="profilePhoto"></div>
                <div class="profileName">welcome <?= $_SESSION['name'] ?></div>
            </div>
            <div>
            <a href="admin.php">
                    <div class="menuList">Dashboard</div>
                </a>
                <a href="createUser.php">
                    <div class="menuList">Create user</div>
                </a>
                <a href="userList.php">
                    <div class="menuList">Users</div>
                </a>
                <a href="category.php">
                    <div class="menuList">Gallery</div>
                </a>
            </div>
            <a class="menuList" href="controllers/logout.php">sign out</a>
        </div>
        <div class="contentRight">
            <div id="createUser" class="createUser active">
                <div>
                    <h2 id="test">Create account</h2>
                </div>
                <div class="signinField">
                    <form method="POST">
                        <label for="firstname">Prénom</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Prénom" required>
                        <?php if (!empty($error) && !empty($error['firstname'])) { ?>
                            <small><?= $error['firstname'] ?></small>
                        <?php } ?>
                        <label for="lastname">Nom</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Nom" required>
                        <?php if (!empty($error) && !empty($error['lastname'])) { ?>
                            <small><?= $error['lastname'] ?></small>
                        <?php } ?>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email" required>
                        <?php if (!empty($error) && !empty($error['email'])) { ?>
                            <small><?= $error['email'] ?></small>
                        <?php } ?>
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" required>
                        <?php if (!empty($error) && !empty($error['password'])) { ?>
                            <small><?= $error['password'] ?></small>
                        <?php } ?>
                        <label for="confirmPassword">Confirmation du mot de passe</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Mot de passe"
                            required>
                        <?php if (!empty($error) && !empty($error['confirmPassword'])) { ?>
                            <small><?= $error['confirmPassword'] ?></small>
                        <?php } ?>
                        <button name="type" value="create" type="submit">Créer un compte</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>