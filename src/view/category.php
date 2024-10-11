<?php
// Include the admin controller
require '../controllers/adminCtrl.php';
// Include the category controller
require '../controllers/categoryCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <!-- Title of the page -->
    <title>Category</title>
</head>

<body>
    <main>
        <!-- Include the sidebar or control panel -->
        <?php include "../ui/controlSlide.php"; ?>

        <!-- Container for the main content -->
        <div class="contentRight">
            <!-- Check if a category ID is set for deletion -->
            <?php if (!empty($cat_id)) { ?>
                <!-- Popup for deletion confirmation -->
                <div class="popUp">
                    <div class="popUpContent">
                        <h3>Are you sure you want to delete this category?</h3>
                        <p>All photos within this category will also be permanently deleted.</p>
                        <div>
                            <!-- Link to delete the category -->
                            <a class="delete act" href="category.php?cat_id=<?= $cat_id ?>">
                                <div>Delete</div>
                            </a>
                            <!-- Link to cancel deletion -->
                            <a href="http://localhost/category.php">cancel</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- category container -->
            <div id="gallery" class="gallery">
                <!-- Section to add a new category -->
                <div class="addCat">
                    <p>Add Category</p>
                    <a href="category.php?newCat=new">
                        <!-- Button to add a category -->
                        <button><ion-icon name="add-outline"></ion-icon></button>
                    </a>
                </div>

                <!-- Loop through all categories to list -->
                <?php foreach ($allCategory as $cat) { ?>
                    <!-- Form for category management -->
                    <form method="post">
                        <!-- Individual category list item -->
                        <div class="catList">
                            <!-- Display category name by default -->
                            <input class="input" type="text" value="<?= $cat->name ?>" name="category" disabled>
                            <!--buttons Controls for each category -->
                            <div class="controls">
                                <!--link for Delete a category-->
                                <a class="delete act" href="category.php?id=<?= $cat->id ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                                <!--link for upload a photos into this category-->
                                <a class="upload act"
                                    href="upload.php?userId=<?= $_SESSION['id'] ?>&category=<?= $cat->id ?>">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                </a>
                                <!--link for update a name of the category-->
                                <a class="update act">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <!--link for validate a changes on category name-->
                                <a class="ok" href="category.php?idCat=<?= $cat->id ?>">
                                    <button class="validate-button" type="submit" name="update" value="<?= $cat->id ?>">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                </a>
                                <!--link for cancel a changes on category-->
                                <a class="cancel"><ion-icon name="close-circle-outline"></ion-icon></a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="assets/js/script.js"></script> <!-- Main JavaScript file -->
    <script src="assets/js/category.js"></script> <!-- JavaScript for gallery upload functionality -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Ionicons for icons -->
</body>

</html>