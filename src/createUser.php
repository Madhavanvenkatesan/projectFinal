<?php
 // Controller to handle the logic for creating a new user
require 'controllers/createUserCtrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Character encoding for the document -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive design for mobile and desktop -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Main stylesheet -->
    <link rel="stylesheet" href="assets/css/admin.css"> <!-- Admin-specific stylesheet -->
    <title>admin</title> <!-- Title of the page -->
</head>

<body>
    <main>
        <!-- Include the sidebar with navigation and user profile -->
        <?php include "ui/controlSlide.php"; ?>
        
        <!-- Main content container on the right side -->
        <div class="contentRight">
            <!-- User creation form container -->
            <div id="createUser" class="createUser active">
                <div>
                    <!-- Header for the create account form -->
                    <h2 id="test">Create account</h2> 
                </div>

                <div class="signinField">
                    <!-- Form to create a new user -->
                    <form method="POST"> 
                        <!-- Input for first name -->
                        <label for="firstname">Prénom</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Prénom" required> 
                        <?php if (!empty($error) && !empty($error['firstname'])) { ?> <!-- Error message for first name -->
                            <small><?= $error['firstname'] ?></small>
                        <?php } ?>

                        <!-- Input for last name -->
                        <label for="lastname">Nom</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Nom" required> 
                        <?php if (!empty($error) && !empty($error['lastname'])) { ?> <!-- Error message for last name -->
                            <small><?= $error['lastname'] ?></small>
                        <?php } ?>

                        <!-- Input for email -->
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email" required> 
                        <?php if (!empty($error) && !empty($error['email'])) { ?> <!-- Error message for email -->
                            <small><?= $error['email'] ?></small>
                        <?php } ?>

                        <!-- Input for password -->
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" required> 
                        <?php if (!empty($error) && !empty($error['password'])) { ?> <!-- Error message for password -->
                            <small><?= $error['password'] ?></small>
                        <?php } ?>

                        <!-- Input for password confirmation -->
                        <label for="confirmPassword">Confirmation du mot de passe</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Mot de passe" required> 
                        <?php if (!empty($error) && !empty($error['confirmPassword'])) { ?> <!-- Error message for password confirmation -->
                            <small><?= $error['confirmPassword'] ?></small>
                        <?php } ?>

                        <!-- Submit button to create a new user -->
                        <button name="type" value="create" type="submit">Créer un compte</button> 
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/js/script.js"></script> <!-- Main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Ionicons for icons -->
</body>

</html>
