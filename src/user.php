<?php
require_once 'controllers/userProfileCtrl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <title>user</title>
</head>

<body>
    <main>
        <div id="slideLeft" class="slideLeft">
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>
            <div class="profileInfo">
                <div class="profilePhoto"> <img src="assets/img/uploads/<?= $userPhotos[0]->name ?>" alt="photos"></div>
                <div class="profileName">Profile of <?= $userProfile->firstname ?></div>
            </div>
            <div>
                <a href="index.php">
                    <div class="menuList">Home</div>
                </a>
                <a href="controllers/logout.php">
                    <div class="menuList">sign out</div>
                </a>
            </div>
        </div>
        <div class="contentRight">
            <div class="download">
                    <button id="downloadAll">Download all
                        <ion-icon name="download-outline"></ion-icon>
                    </button>
                    <button id="download">Download
                        <ion-icon name="download-outline"></ion-icon>
                    </button>
                    <button id="cancel">Cancel</button>
            </div>
            <div id="gallery" class="gallery">
                <div class="images">
                    <?php for ($i = 0; $i < sizeof($userPhotos); $i++) {
                        ?>
                        <div class="photoCard">
                            <img src="assets/img/uploads/<?= $userPhotos[$i]->name ?>" alt="photos">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/user.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>