<?php
require '../models/Photo.php';
require '../models/Category.php';

$photo = new Photo();
$category = new Category();

// Create new category
if (!empty($_GET) && !empty($_GET['newCat']) && $_GET['newCat'] == 'new') {
    $category->name = "New Category"; // Set the new category name by default
    $category->createCategory(); // Create the category in the database
    // Redirect to the category page after creation
    header('Location: category.php');
}

// Get id of the category and store in a variable for use in a popup (used outside the loop)
if (!empty($_GET) && !empty($_GET['id'])) {
    $cat_id = $_GET['id'];
}

// Delete existing category
if (!empty($_GET) && !empty($_GET['cat_id'])) {
    $category->id = $_GET['cat_id']; // Set the category id for deletion
    $photo->id_category = $_GET['cat_id']; // Set the category id for the photos
    // Retrieve all photo details before deletion
    $allPhotoDetails = $photo->getAllPhotosOfCategory();

    if ($allPhotoDetails) {
        // Loop through each photo and delete the file from the server
        foreach ($allPhotoDetails as $photoDetail) {
            // Get file path
            $filePath = "../assets/img/uploads/" . $photoDetail->name; 

            if (file_exists($filePath)) {
                unlink($filePath); // Delete the photo file if it exists
            } else {
                error_log("File not found: $filePath"); // Log error if file is not found
            }
        }
        // Delete all photo records for this category from the database
        $photo->deleteAllByCategory();
    }
    // Delete the category itself from the database
    $category->deleteCategory();
    // Redirect to the category page after successful deletion
    header('Location: category.php');
    // Stop script execution after redirection
    exit(); 
}

// Update existing category
if (!empty($_POST) && !empty($_POST['update'])) {
    $category->id = filter_var($_POST['update'], FILTER_VALIDATE_INT);
    $category->name = htmlspecialchars($_POST['category']);
    $category->updateCategory();
    // Redirect to category page after update
    header('Location: category.php'); 
}

// Fetch all categories except users category(users category is 'client')
$allCategory = $category->getAllCategoryExceptUser();
