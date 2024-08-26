<?php
require 'controllers/adminCtrl.php';
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
                <div class="profileName">wellcome name</div>
            </div>
            <div>
                <div class="menuList">Create user</div>
                <div class="menuList">Users</div>
                <div class="menuList">Gallery</div>
            </div>
            <div class="menuList">sign out</div>
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
            <div id="users" class="users">
                <div>
                    <h2 id="test">Users</h2>
                </div>
                <div class="list">
                    <ul class="tableHead">
                        <li>Id</li>
                        <li>First Name</li>
                        <li>Last Name</li>
                        <li>Email</li>
                        <li>Password</li>
                        <li>Delete</li>
                    </ul>
                    <?php for ($i = 0; $i < sizeof($listOfUsers); $i++) { ?>
                        <ul>
                            <li data-label="id"><?= $listOfUsers[$i]->id; ?></li>
                            <li data-label="first name"><?= $listOfUsers[$i]->firstname; ?></li>
                            <li data-label="last name"><?= $listOfUsers[$i]->lastname; ?></li>
                            <li data-label="email"><?= $listOfUsers[$i]->email; ?></li>
                            <li data-label="password"><?= $listOfUsers[$i]->password; ?></li>
                            <li class="deleteButton">
                                <form action="admin.php?userId=<?=$listOfUsers[$i]->id; ?>" method="POST">
                                    <button name="type" value="delete" type="submit">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </li>
                        </ul>

                    <?php  } 
                    ?>
                </div>
            </div>
            <div id="gallery" class="gallery">
                <a href="upload.html">
                    <div>Portrait</div>
                </a>
                <a href="upload.html">
                    <div>Familly</div>
                </a>
                <a href="upload.html">
                    <div>Events</div>
                </a>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>