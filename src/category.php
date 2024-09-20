<?php
require 'controllers/adminCtrl.php';
require 'controllers/categoryCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>Category</title>
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
        <?php if (!empty($cat_id)) { ?>
                <div class="popUp">
                    <div class="popUpContent">
                        <h3>Are you sure you want to delete this category?</h3>
                        <p>All photos within this category will also be permanently deleted.</p>
                        <div>
                        <a class="delete act" href="category.php?cat_id=<?= $cat_id ?>">
                                    <div>Delete</div>
                                </a>
                            <a href="http://localhost/category.php">cancel</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div id="gallery" class="gallery">
                <div class="addCat">
                    <p>Add Category</p>
                    <a href="category.php?newCat=new">
                        <button><ion-icon name="add-outline"></ion-icon></button>
                    </a>
                </div>
                <?php foreach ($allCategory as $cat) { ?>
                    <form method="post">
                        <div class="catList">
                            <input class="input" type="text" value="<?= $cat->name ?>" name="category" disabled>
                            <div class="controls">
                                <a class="delete act" href="category.php?id=<?= $cat->id ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                                <a class="upload act"
                                    href="upload.php?userId=<?= $_SESSION['id'] ?> && category=<?= $cat->id ?> ">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                </a>
                                <a class="update act">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a class="ok" href="category.php?idCat=<?= $cat->id ?>">
                                    <button class="validate-button" type="submit" name="update" value="<?= $cat->id ?>">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                </a>
                                <a class="cancel"><ion-icon name="close-circle-outline"></ion-icon></a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
    </main>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/uploadGallery.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>