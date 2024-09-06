<?php
require 'controllers/uploadCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/upload.css">
    <title>upload</title>
</head>

<body>
    <main>
        <div id="slideLeft" class="slideLeft">
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>
            <div class="profileInfo">
                <div class="profilePhoto"></div>
                <div class="profileName">profile of <?= $userProfile->firstname ?></div>
            </div>
            <div>
                <a href="admin.php">
                    <div class="menuList">Dashboard</div>
                </a>
                <a href="controllers/logout.php">
                    <div class="menuList">sign out</div>
                </a>
            </div>
        </div>
        <div class="contentRight">
            <div class="error">
                <p><?php if (!empty($error) && !empty($error['upload'])) { ?>
                        <!-- Show the popup and close the popup after 2 seconds -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const error = document.getElementsByClassName('error')[0];
                                error.style.display = 'flex';
                                setTimeout(function () {
                                    error.style.display = 'none';
                                }, 2500);
                            });
                        </script>

                        <?= $error['upload'] ?>
                    <?php } ?>
                </p>
                <div></div>
            </div>
            <div id="gallery" class="gallery">
                <div class="images">
                    <div class="addPhotos">
                        <form method="POST" enctype="multipart/form-data">
                            <ion-icon name="cloud-upload"></ion-icon>
                            <input class="inputFile" type="file" name="image[]" accept="image/*" multiple />
                            <button type="submit" name="submit" value="submit">Upload</button>
                        </form>
                    </div>
                    <?php for ($i = 0; $i < sizeof($listOfUserPhotos); $i++) {
                        ?>
                        <div class="photoCard">
                            <img src="assets/img/uploads/<?= $listOfUserPhotos[$i]->name ?>" alt="photos">
                            <a href="upload.php?userId=<?= $listOfUserPhotos[$i]->id_user ?>&&category=<?= $listOfUserPhotos[$i]->id_category ?>&&idPhoto=<?= $listOfUserPhotos[$i]->id ?>">
                                <button>
                                <ion-icon name="remove"></ion-icon>
                                </button>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/upload.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>