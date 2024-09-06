<?php require 'controllers/galleryCtrl.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gallery.css">
    <title>gallery</title>
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
        <div class="containerLeft">
            <?php foreach ($allCategory as $cat) { ?>
                <div class="category" id_cat="<?= $cat->id ?>"><?= $cat->name ?></div>
            <?php } ?>
            <div class="category" id_cat="all"><ion-icon name="camera"></ion-icon></div>
        </div>
        <div id="containerRight" class="containerRight">
            <!-- code js for image -->
        </div>
    </main>
    <script>
        const images = <?= json_encode($photoData) ?>;
    </script>
    <script src="assets/js/gallery.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>