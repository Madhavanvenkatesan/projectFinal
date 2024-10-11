<?php
session_start(); // Start the session

if (!empty($_POST)) { // Check if form is submitted
    require '../models/User.php'; // Include the User model
    $user = new User(); // Create a new User object
    $error = []; // Initialize an array to store error messages

    // Check if the email field is filled
    if (!empty($_POST['login_email'])) {
        $user->email = $_POST['login_email']; // Set the user's email
        $checkUser = $user->getUserByEmail(); // Retrieve user data by email

        if ($checkUser) { // If user exists
            // Verify the provided password
            if ($_POST['login_password'] === $checkUser->password) {
                // Store user details in session
                $_SESSION['id'] = $checkUser->id;
                $_SESSION['id_role'] = $checkUser->id_role;
                $_SESSION['name'] = $checkUser->firstname;

                // Redirect based on user role
                if ($checkUser->id_role == 1) {
                    header('Location:admin.php'); // Admin role
                } else {
                    header('Location: user.php?userId=' . $checkUser->id); // Regular user
                }
            } else {
                $error['login_password'] = 'Mot de passe incorrecte'; // Incorrect password
            }
        } else {
            $error['login_email'] = 'Email non trouver'; // Email not found
        }
    } else {
        $error['login_email'] = 'Email obligatoire'; // Email field is required
    }
}
