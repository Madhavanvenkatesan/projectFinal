<?php
require 'controllers/userListCtrl.php'; ?>

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
            <?php if (!empty($user_id)) { ?>
                <div class="popUp">
                    <div class="popUpContent">
                        <p>Are you sure want to delete a user with his photos</p>
                        <div>
                            <a href="userList.php?deleteId=<?= $user_id ?>">
                                <div>Delete</div>
                            </a>
                            <a href="http://localhost/userList.php">cancel</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div id="users" class="users">
                <div>
                    <h2 id="test">Users</h2>
                </div>
                <form method="POST" class="list">
                    <ul class="tableHead">
                        <li>Id</li>
                        <li>First Name</li>
                        <li>Last Name</li>
                        <li>Email</li>
                        <li>Password</li>
                        <li style="text-align:center">Edit</li>
                    </ul>
                    <?php for ($i = 0; $i < sizeof($listOfUsers); $i++) { ?>
                        <ul class="ul">
                            <li data-label="id">
                                <?= $listOfUsers[$i]->id; ?>
                            </li>
                            <li data-label="first name">
                                <input class="input" type="text" name="firstname"
                                    value="<?= $listOfUsers[$i]->firstname; ?>" disabled>
                                <?php if (!empty($error) && !empty($error['firstname-' . $listOfUsers[$i]->id])) { ?>
                                    <small><?= $error['firstname-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <li data-label="last name">
                                <input class="input" type="text" name="lastname" value="<?= $listOfUsers[$i]->lastname; ?>"
                                    disabled>
                                <?php if (!empty($error) && !empty($error['lastname-' . $listOfUsers[$i]->id])) { ?>
                                    <small><?= $error['lastname-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <li data-label="email">
                                <input class="input" type="text" name="email" value="<?= $listOfUsers[$i]->email; ?>"
                                    disabled>
                                <?php if (!empty($error) && !empty($error['email-' . $listOfUsers[$i]->id])) { ?>
                                    <small><?= $error['email-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <li data-label="password">
                                <input class="input" type="text" name="password" value="<?= $listOfUsers[$i]->password; ?>"
                                    disabled>
                                <?php if (!empty($error) && !empty($error['password-' . $listOfUsers[$i]->id])) { ?>
                                    <small><?= $error['password-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <li class="edit">
                                <a class="update active"><ion-icon name="create-outline"></ion-icon></a>
                                <a class="profile active" href="user.php?userId=<?= $listOfUsers[$i]->id ?>">
                                    <ion-icon name="happy"></ion-icon>
                                </a>
                                <a class="upload active" href="upload.php?userId=<?= $listOfUsers[$i]->id ?> && category=6">
                                    <ion-icon name="cloud-upload"></ion-icon>
                                </a>
                                <a class="delete active" href="userList.php?userId=<?= $listOfUsers[$i]->id ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                                <a class="validate">
                                    <button class="validate-button" name="userId" value="<?= $listOfUsers[$i]->id ?>"
                                        type="submit">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                </a>
                                <a class="cancel"><ion-icon name="close-circle-outline"></ion-icon></a>
                            </li>
                        </ul>
                    <?php } ?>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>