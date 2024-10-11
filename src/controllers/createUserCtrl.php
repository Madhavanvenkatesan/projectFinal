<?php
session_start();

// Check if the user is authenticated and has an admin role (id_role = 1)
if (empty($_SESSION['id']) || empty($_SESSION['id_role']) || $_SESSION['id_role'] !== 1)
// Redirect to index.html if not authenticated or not an admin
    header('Location: index.html');

// Check if the form is submitted and the 'type' field is present in the POST request
if (!empty($_POST) && !empty($_POST['type'])) {
    require '../models/User.php'; // Include the User model
    $user = new User(); // Create a new instance of the User class

    // If the request is to create a new user
    if ($_POST['type'] == 'create') {
        // Initialize an array to store any errors
        $error = [];

        // Validate the 'firstname' field
        if (!empty($_POST['firstname'])) {
            if (strlen($_POST['firstname']) >= 3 && strlen($_POST['firstname']) <= 30) {
                // If 'firstname' length is between 3 and 30 characters, sanitize and assign it
                $user->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $error['firstname'] = 'Entre 3 et 30 caracteres'; // Add error message for invalid length
            }
        } else {
            $error['firstname'] = 'Prenom obligatoire'; // Add error if 'firstname' is missing
        }

        // Validate the 'lastname' field
        if (!empty($_POST['lastname'])) {
            if (strlen($_POST['lastname']) >= 3 && strlen($_POST['lastname']) <= 30) {
                // If 'lastname' length is between 3 and 30 characters, sanitize and assign it
                $user->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $error['lastname'] = 'Entre 3 et 30 caracteres'; // Add error message for invalid length
            }
        } else {
            $error['lastname'] = 'Prenom obligatoire'; // Add error if 'lastname' is missing
        }

        // Validate the 'email' field
        if (!empty($_POST['email'])) {
            if (strlen($_POST['email']) >= 3 && strlen($_POST['email']) <= 100) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    // If the email is valid, sanitize and assign it
                    $user->email = htmlspecialchars($_POST['email']);
                    $checkUser = $user->getUserByEmail(); // Check if the email already exists
                    if ($checkUser) {
                        $error['email'] = 'email deja utiliser'; // Add error if email is already in use
                        $user->email = null; // Reset email value to null if duplicate found
                    }
                } else {
                    $error['email'] = 'email invalide'; // Add error if email is invalid
                }
            } else {
                $error['email'] = 'Entre 3 et 100 caracteres'; // Add error if email length is invalid
            }
        } else {
            $error['email'] = 'email obligatoire'; // Add error if 'email' is missing
        }

        // Validate the 'password' field
        if (!empty($_POST['password'])) {
            if (!empty($_POST['confirmPassword'])) {
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    // If password and confirm password match, assign the password
                    $user->password = $_POST['password'];
                } else {
                    $error['confirmPassword'] = 'Confirmation de mot de passe ne correspond pas'; // Password mismatch error
                }
            } else {
                $error['confirmPassword'] = 'Confirmation de mot de passe obligatoire'; // Add error if confirmation is missing
            }
        } else {
            $error['password'] = 'Mot de passe obligatoire'; // Add error if 'password' is missing
        }

        // If there are no errors, proceed with user registration
        if (empty($error)) {
            if ($user->registerNew()) {
                // If registration is successful, redirect to the user list page
                $error[] = ''; // Clear any errors
                header('Location: userList.php');
                exit; // Ensure script stops after redirection
            } else {
                // Add a global error message if registration fails
                $error['global'] = 'Enregistrement echouer';
            }
        }
    }
}