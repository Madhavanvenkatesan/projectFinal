<?php
 // Include the admin controller
require 'controllers/adminCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <!-- Title of the page -->
    <title>admin</title> 
</head>

<body>
    <main>
        <!-- Include the sidebar or control panel -->
        <?php include "ui/controlSlide.php"; ?>
        <!-- Container for the main content -->
        <div class="contentRight">
            <!-- Main content will go here -->
        </div>
    </main>

    <script src="assets/js/script.js"></script> <!-- Main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Ionicons for icons -->
</body>

</html>
