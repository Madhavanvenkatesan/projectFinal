<?php
// Include the contact controller for handling form submissions
require_once 'controllers/contactCtrl.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <!-- Title of the page -->
    <title>contact</title>
</head>

<body>
    <header>
        <!-- import nav bar from UI -->
        <?php include "ui/nav.php"; ?>
    </header>
    <main>
        <div class="mainContainer">
            <div class="contactForm"> <!-- Contact form section -->
                <div>
                    <h2>Contact</h2> <!-- Heading for the contact form -->
                </div>
                <div class="contactField">
                    <div class="status"> <!-- Status message display -->
                        <p>
                            <!-- Check if there's a status message -->
                        <?php if (!empty($popUp) && !empty($popUp['status'])) { ?> 
                            <!-- Show the popup and hide it after 2 seconds -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const popUp = document.getElementsByClassName('status')[0];
                                    popUp.style.display = 'flex'; // Show the status message
                                    setTimeout(function () {
                                        popUp.style.display = 'none'; // Hide after 2.5 seconds
                                    }, 2500);
                                });
                            </script>
                            <!-- Display the status message -->
                            <?= $popUp['status'] ?> 
                        <?php } ?>
                        </p>
                        <div></div>
                    </div>
                    <form method="POST"> <!-- Contact form -->
                        <div>
                            <!-- Last name input -->
                            <input id="lastname" type="text" name="lastname" placeholder="Nom" required> 
                            <?php if (!empty($error) && !empty($error['lastname'])) { ?>
                                <!-- Display error message for last name -->
                                <small><?= $error['lastname'] ?></small> 
                            <?php } ?>

                            <!-- First name input -->
                            <input type="text" name="firstname" placeholder="Prénom" required> 
                            <?php if (!empty($error) && !empty($error['firstname'])) { ?>
                                <!-- Display error message for first name -->
                                <small><?= $error['firstname'] ?></small> 
                            <?php } ?>
                        </div>

                        <!-- Email input -->
                        <input id="email" type="email" name="email" placeholder="Email" required> 
                        <?php if (!empty($error) && !empty($error['email'])) { ?>
                            <!-- Display error message for email -->
                            <small><?= $error['email'] ?></small> 
                        <?php } ?>

                        <!-- Message textarea -->
                        <textarea name="message" type="text" placeholder="Message..."></textarea> 
                        <?php if (!empty($error) && !empty($error['message'])) { ?>
                            <!-- Display error message for message -->
                            <small><?= $error['message'] ?></small> 
                        <?php } ?>
                        <!-- Submit button -->
                        <button type="submit" name="type" value="submit">Send</button> 
                    </form>
                </div>
            </div>
            <div class="contactInfo"> <!-- Contact information section -->
                <div class="contactBasic">
                    <div><ion-icon name="call"></ion-icon> <!-- Phone icon -->
                        <div>0769908927</div> 
                    </div>
                    <div><ion-icon name="mail"></ion-icon> <!-- Email icon -->
                        <div>Madhulivezz@gmail.com</div>
                    </div>
                    <div><ion-icon name="pin"></ion-icon> <!-- Location icon -->
                        <div>creil</div> 
                    </div>
                </div>
                <div class="socialMedia"> <!-- Social media buttons -->
                    <button><ion-icon name="logo-facebook"></ion-icon></button>
                    <button><ion-icon name="logo-instagram"></ion-icon></button> 
                    <button><ion-icon name="logo-twitter"></ion-icon></button> 
                    <button><ion-icon name="logo-whatsapp"></ion-icon></button> 
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script> <!-- Include main JavaScript file -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Import Ionicons -->
</body>

</html>
