<?php
session_start();

// Check if the user is authenticated and has a role
if (empty($_SESSION['id']) || empty($_SESSION['id_role'])) {
    // Redirect to login page if not authenticated
    header('Location: index.html');
}

require '../models/User.php';
$user = new User();

// Check if the user is an administrator
if ($_SESSION['id_role'] !== 1) {
    // Redirect to login if the user is not an admin
    header('Location: index.html');
}

// Handle user deletion with popup conformation
if (!empty($_GET) && !empty($_GET['userId'])) {
    // Get the user ID from the URL save into variable for use out of the loop
    $user_id = $_GET['userId'];
}

if (!empty($_GET) && !empty($_GET['deleteId'])) {
    // Set the user ID to be deleted
    $user->id = $_GET['deleteId'];

    $userData = $user->getUserById();
    //if admin do not delete
    if ($userData->id_role !== 1) {
        // Call the delete method from the User model
        $user->delete();
    }
}

// Handle user update
if (!empty($_POST) && !empty($_POST['userId'])) {
    $error = []; // Initialize an error array

    $user->id = $_POST['userId']; // Set the user ID to be updated

    // Validate the 'firstname' field
    if (!empty($_POST['firstname'])) {
        if (strlen($_POST['firstname']) >= 3 && strlen($_POST['firstname']) <= 30) {
            $user->firstname = htmlspecialchars($_POST['firstname']); // Sanitize and assign firstname
        } else {
            $error['firstname-' . $_POST['userId']] = 'Entre 3 et 30 caracteres'; // Error message if length is invalid
        }
    } else {
        $error['firstname-' . $_POST['userId']] = 'Prenom obligatoire'; // Error if firstname is empty
    }

    // Validate the 'lastname' field
    if (!empty($_POST['lastname'])) {
        if (strlen($_POST['lastname']) >= 3 && strlen($_POST['lastname']) <= 30) {
            $user->lastname = htmlspecialchars($_POST['lastname']); // Sanitize and assign lastname
        } else {
            $error['lastname-' . $_POST['userId']] = 'Entre 3 et 30 caractères'; // Error message if length is invalid
        }
    } else {
        $error['lastname-' . $_POST['userId']] = 'Nom obligatoire'; // Error if lastname is empty
    }

    // Validate the 'email' field
    if (!empty($_POST['email'])) {
        if (strlen($_POST['email']) >= 3 && strlen($_POST['email']) <= 100) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user->email = htmlspecialchars($_POST['email']); // Sanitize and assign email
                $checkUser = $user->getUserByEmail(); // Check if email already exists in the system

                // Ensure no duplicate email (exclude the current user's email from the check)
                if ($checkUser && $checkUser->id != $user->id) {
                    // Error if email is in use by another user
                    $error['email-' . $_POST['userId']] = 'email deja utiliser';
                    $user->email = null; // Null email to prevent setting duplicate
                }
            } else {
                $error['email-' . $_POST['userId']] = 'email invalide'; // Error if email format is invalid
            }
        } else {
            $error['email-' . $_POST['userId']] = 'Entre 3 et 100 caracteres'; // Error if email length is invalid
        }
    } else {
        $error['email-' . $_POST['userId']] = 'email obligatoire'; // Error if email is empty
    }

    // Check if password is provided
    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    } else {
        $error['password-' . $_POST['userId']] = 'Mot de passe obligatoire'; // Error if password is missing
    }

    // If no errors, proceed to update the user
    if (empty($error)) {
        if ($user->update()) {
            $error[] = ''; // Clear errors if update is successful
        } else {
            $error['global'] = 'Enregistrement echouer'; // Error message if update fails
        }
    }
}


$user = new User();
// Retrieve the list of users to display after deletion or updates
$listOfUsers = $user->getAllUser();
