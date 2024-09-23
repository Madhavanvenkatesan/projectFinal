<!-- Include the gallery controller for data handling -->
<?php require 'controllers/galleryCtrl.php' ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="assets/css/gallery.css"> 
    <!-- Title of the page -->
    <title>gallery</title> 
</head>

<body>
    <header>
            <!-- import nav bar from UI -->
            <?php include "ui/nav.php"; ?>
    </header>
    <main>
        <div class="containerLeft">
            <!-- Loop through categories -->
            <?php foreach ($allCategory as $cat) { ?> 
                <!-- Display each category -->
                <div class="category" id_cat="<?= $cat->id ?>"><?= $cat->name ?></div> 
            <?php } ?>
            <!-- "All" category with camera icon -->
            <div class="category" id_cat="all"><ion-icon name="camera"></ion-icon></div>
        </div>
        <div id="containerRight" class="containerRight">
            <!-- Place for JavaScript-generated image content -->
        </div>
    </main>
    <script>
        // Create a JavaScript array of image objects from PHP data
        const images = <?= json_encode($photoData) ?>;
    </script>
    <script src="assets/js/gallery.js"></script> <!-- Include gallery-specific JavaScript -->
    <script src="assets/js/script.js"></script> <!-- Include main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Import Ionicons for icons -->
</body>

</html>
