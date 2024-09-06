<?php
require_once 'controllers/contactCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>contact</title>
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
            <div class="contactForm">
                <div>
                    <h2>Contact</h2>
                </div>
                <div class="contactField">
                <div class="status">
                <p><?php if (!empty($popUp) && !empty($popUp['status'])) { ?>
                        <!-- Show the popup and close the popup after 2 seconds -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const popUp = document.getElementsByClassName('status')[0];
                                popUp.style.display = 'flex';
                                setTimeout(function () {
                                    popUp.style.display = 'none';
                                }, 2500);
                            });
                        </script>
                        <?= $popUp['status'] ?>
                    <?php } ?>
                </p>
                <div></div>
            </div>
                    <form method="POST">
                        <div>
                        <input id="lastname" type="text" name="lastname" placeholder="Nom" required>
                        <?php if (!empty($error) && !empty($error['lastname'])) { ?>
                            <small><?= $error['lastname'] ?></small>
                        <?php } ?>

                            <input type="text" name="firstname" placeholder="Prénom" required>
                        <?php if (!empty($error) && !empty($error['firstname'])) { ?>
                            <small><?= $error['firstname'] ?></small>
                        <?php } ?>
                        </div>

                        <input id="email" type="email" name="email" placeholder="Email" required>
                        <?php if (!empty($error) && !empty($error['email'])) { ?>
                            <small><?= $error['email'] ?></small>
                        <?php } ?>

                        <textarea name="message" type="text" placeholder="Message..."></textarea>
                        <?php if (!empty($error) && !empty($error['message'])) { ?>
                            <small><?= $error['message'] ?></small>
                        <?php } ?>
                        <button type="submit" name="type" value="submit">Send</button>
                    </form>
                </div>
            </div>
            <div class="contactInfo">
                <div class="contactBasic">
                    <div><ion-icon name="call"></ion-icon>
                        <div>0769908927</div>
                    </div>
                    <div><ion-icon name="mail"></ion-icon>
                        <div>Madhulivezz@gmail.com</div>
                    </div>
                    <div><ion-icon name="pin"></ion-icon>
                        <div>creil</div>
                    </div>
                </div>
                <div class="socialMedia">
                    <button><ion-icon name="logo-facebook"></ion-icon></button>
                    <button><ion-icon name="logo-instagram"></ion-icon></button>
                    <button> <ion-icon name="logo-twitter"></ion-icon></button>
                    <button> <ion-icon name="logo-whatsapp"></ion-icon></button>
                </div>
            </div>
        </div>

    </main>
    <script src="assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>