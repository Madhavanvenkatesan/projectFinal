<?php
// Include the controller responsible for managing user profile logic
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
        <!-- Sidebar (left side) -->
        <div id="slideLeft" class="slideLeft">
            <!-- Menu burger button to toggle the sidebar -->
            <button id="menuBurger">
                <!-- Icon for the burger menu -->
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>

            <!-- Display user profile info in the sidebar -->
            <div class="profileInfo">
                <!-- Show the user's profile photo (the first image uploaded) -->
                <div class="profilePhoto">
                    <img src="assets/img/uploads/<?= $userPhotos[0]->name ?>" alt="photos">
                </div>
                <!-- Display the user's first name dynamically -->
                <div class="profileName">Profile of <?= $userProfile->firstname ?></div>
            </div>

            <!-- Sidebar menu options -->
            <div>
                <!-- Link to return to the home page -->
                <a href="index.php">
                    <div class="menuList">Home</div>
                </a>
                <!-- Link to log out of the session -->
                <a href="controllers/logout.php">
                    <div class="menuList">sign out</div>
                </a>
            </div>
        </div>

        <!-- Main content area (right side) -->
        <div class="contentRight">
            <!-- Section for download buttons (download all, selected images, cancel) -->
            <div class="download">
                <!-- Button to download all images -->
                <button id="downloadAll">Download all
                    <ion-icon name="download-outline"></ion-icon>
                </button>

                <!-- Button to download only selected images -->
                <button id="download">Download
                    <ion-icon name="download-outline"></ion-icon>
                </button>

                <!-- Button to cancel the selected images -->
                <button id="cancel">Cancel</button>
            </div>

            <!-- Image gallery where user's photos are displayed -->
            <div id="gallery" class="gallery">
                <div class="images">
                    <!-- Loop through user photos and display them in the gallery -->
                    <?php for ($i = 0; $i < sizeof($userPhotos); $i++) { ?>
                        <div class="photoCard">
                            <!-- Display each uploaded photo -->
                            <img src="assets/img/uploads/<?= $userPhotos[$i]->name ?>" alt="photos">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/js/script.js"></script>
    <!-- Include JavaScript for user-specific functionalities (e.g., selecting images) -->
    <script src="assets/js/user.js"></script>
    <!-- Ionicons library for icons used in buttons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
