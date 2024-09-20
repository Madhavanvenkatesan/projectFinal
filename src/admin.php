<?php
require 'controllers/adminCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>admin</title>
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
        </div>
    </main>

    <script src="assets/js/admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>