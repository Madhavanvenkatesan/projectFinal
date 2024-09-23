<?php
// Include the controller that handles user list logic
require 'controllers/userListCtrl.php'; 
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
        <!-- Include the sidebar with navigation and user profile -->
        <?php include "ui/controlSlide.php"; ?> 
        
        <!-- Main content container -->
        <div class="contentRight"> 
            <!-- Check if a user ID exists for deletion -->
            <?php if (!empty($user_id)) { ?> 
                <!-- Confirmation popup for deleting a user -->
                <div class="popUp"> 
                    <div class="popUpContent">
                        <p>Are you sure want to delete a user with his photos</p>
                        <div>
                            <!-- Confirm deletion link -->
                            <a href="userList.php?deleteId=<?= $user_id ?>">
                                <div>Delete</div> 
                            </a>
                            <!-- Cancel link -->
                            <a href="http://localhost/userList.php">cancel</a> 
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <!-- User list container -->
            <div id="users" class="users"> 
                <div>
                    <h2 id="test">Users List</h2> <!-- Header for the user list -->
                </div>
                
                <!-- Form for user management -->
                <form method="POST" class="list"> 
                    <!-- Table headers for user details -->
                    <ul class="tableHead"> 
                        <li>Id</li>
                        <li>First Name</li>
                        <li>Last Name</li>
                        <li>Email</li>
                        <li>Password</li>
                        <li style="text-align:center">Edit</li> <!-- Edit column for user actions -->
                    </ul>

                    <!-- Loop through the list of users -->
                    <?php for ($i = 0; $i < sizeof($listOfUsers); $i++) { ?> 
                        <!-- User row with details -->
                        <ul class="ul"> 
                            <!-- User ID -->
                            <li data-label="id">
                                <?= $listOfUsers[$i]->id; ?> 
                            </li>
                            <!-- First name input -->
                            <li data-label="first name">
                                <input class="input" type="text" name="firstname" 
                                    value="<?= $listOfUsers[$i]->firstname; ?>" disabled> 
                                    <!-- Error handling -->
                                <?php if (!empty($error) && !empty($error['firstname-' . $listOfUsers[$i]->id])) { ?> 
                                    <small><?= $error['firstname-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <!-- Last name input -->
                            <li data-label="last name">
                                <input class="input" type="text" name="lastname" 
                                    value="<?= $listOfUsers[$i]->lastname; ?>" disabled> 
                                    <!-- Error handling -->
                                <?php if (!empty($error) && !empty($error['lastname-' . $listOfUsers[$i]->id])) { ?> 
                                    <small><?= $error['lastname-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <!-- Email input -->
                            <li data-label="email">
                                <input class="input" type="text" name="email" 
                                    value="<?= $listOfUsers[$i]->email; ?>" disabled> 
                                    <!-- Error handling -->
                                <?php if (!empty($error) && !empty($error['email-' . $listOfUsers[$i]->id])) { ?> 
                                    <small><?= $error['email-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            <!-- Password input -->
                            <li data-label="password">
                                <input class="input" type="text" name="password" 
                                    value="<?= $listOfUsers[$i]->password; ?>" disabled> 
                                    <!-- Error handling -->
                                <?php if (!empty($error) && !empty($error['password-' . $listOfUsers[$i]->id])) { ?> 
                                    <small><?= $error['password-' . $listOfUsers[$i]->id] ?></small>
                                <?php } ?>
                            </li>
                            
                            <!-- control buttons for each user -->
                            <li class="edit"> 
                                <!--Link to Edit a user -->
                                <a class="update active"><ion-icon name="create-outline"></ion-icon></a> 
                                <!--Link to view user profile -->
                                <a class="profile active" href="user.php?userId=<?= $listOfUsers[$i]->id ?>">
                                    <ion-icon name="happy"></ion-icon> 
                                </a>
                                <!--Link to upload user data -->
                                <a class="upload active" href="upload.php?userId=<?= $listOfUsers[$i]->id ?> && category=6">
                                    <ion-icon name="cloud-upload"></ion-icon>
                                </a>
                                <!--Link to delete user -->
                                <a class="delete active" href="userList.php?userId=<?= $listOfUsers[$i]->id ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                                <!--Link to validate changes -->
                                <a class="validate">
                                    <button class="validate-button" name="userId" value="<?= $listOfUsers[$i]->id ?>" type="submit">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </button>
                                </a>
                                <!--Link to Cancel editing -->
                                <a class="cancel"><ion-icon name="close-circle-outline"></ion-icon></a> 
                            </li>
                        </ul>
                    <?php } ?>
                </form>
            </div>
        </div>
    </main>

    <script src="assets/js/userList.js"></script> <!-- JavaScript file for user list interactions -->
    <script src="assets/js/script.js"></script> <!-- Main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Ionicons for icons -->
</body>

</html>
