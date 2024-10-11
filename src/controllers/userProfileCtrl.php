<?php
session_start();

// Check if the user is authenticated and has a role; if not, redirect to the homepage
if (empty($_SESSION['id']) || empty($_SESSION['id_role'])) {
    header('Location: /');
    exit; // Ensure script stops after redirection
}

// Include the User /Photo model
require_once '../models/User.php'; 
require_once '../models/Photo.php'; 

$photo = new Photo(); 
$user = new User(); 

// Get user ID from URL query string
if (isset($_GET['userId'])) {
    $photo->id_user = $_GET['userId']; 
    $user->id = $_GET['userId']; 
}

// Retrieve the user's profile information using their ID
$userProfile = $user->getUserById();

// Retrieve all photos associated with the user using their ID
$userPhotos = $photo->getPhotosByUserId();
