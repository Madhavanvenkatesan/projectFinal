<?php
// Include the controller for handling image uploads, deletions, and other logic.
require '../controllers/uploadCtrl.php';
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
        <!-- Sidebar (left slide panel) -->
        <div id="slideLeft" class="slideLeft">
            <!-- Menu burger button for toggling sidebar -->
            <button id="menuBurger">
                <div id="burgerDiv" class="burgerDiv"></div>
            </button>
            <!-- Profile information displayed in the sidebar -->
            <div class="profileInfo">
                <!-- Display user's first uploaded profile photo -->
                <div class="profilePhoto">
                    <img src="../assets/img/uploads/<?= $listOfUserPhotos[0]->name ?>" alt="photos">
                </div>
                <!-- Display the user's first name dynamically -->
                <div class="profileName">profile of <?= $userProfile->firstname ?></div>
            </div>
            <!-- Navigation links in the sidebar -->
            <div>
                <!-- Link to go back to the user list -->
                <a href="userList.php">
                    <div class="menuList">Back</div>
                </a>
                <!-- Link to log out -->
                <a href="controllers/logout.php">
                    <div class="menuList">sign out</div>
                </a>
            </div>
        </div>

        <!-- Main content area (right side) -->
        <div class="contentRight">
            <!-- Button to delete all uploaded images -->
            <div class="delete">
                <!-- Delete all button, triggers a form submission with 'deleteAll' value -->
                <form method="post">
                    <button name="deleteAll" value="deleteAll" id="deleteAll">Delete all<ion-icon name="trash"></ion-icon></button>
                </form>
            </div>

            <!-- Error display area -->
            <div class="error">
                <p>
                    <?php if (!empty($error) && !empty($error['upload'])) { ?>
                        <!-- Show the popup and automatically hide it after 2.5 seconds -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const error = document.getElementsByClassName('error')[0];
                                error.style.display = 'flex';
                                setTimeout(function () {
                                    error.style.display = 'none';
                                }, 2500); // Error disappears after 2.5 seconds
                            });
                        </script>
                        <!-- Display the upload error message -->
                        <?= $error['upload'] ?>
                    <?php } ?>
                </p>
                <div></div>
            </div>

            <!-- Gallery section where uploaded photos are displayed -->
            <div id="gallery" class="gallery">
                <!-- Image upload form and add photo button -->
                <div class="images">
                    <div class="addPhotos">
                        <!-- Form for uploading multiple images -->
                        <form method="POST" enctype="multipart/form-data">
                            <ion-icon name="cloud-upload"></ion-icon>
                            <!-- Input field for selecting multiple image files -->
                            <input class="inputFile" type="file" name="image[]" accept="image/*" multiple />
                            <!-- Submit button to upload selected images -->
                            <button type="submit" name="submit" value="submit">Upload</button>
                        </form>
                    </div>

                    <!-- Display uploaded images in the gallery -->
                    <?php for ($i = 0; $i < sizeof($listOfUserPhotos); $i++) { ?>
                        <div class="photoCard">
                            <!-- Image element displaying uploaded photo -->
                            <img src="../assets/img/uploads/<?= $listOfUserPhotos[$i]->name ?>" alt="photos">
                            <!-- Button to delete the individual photo -->
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
