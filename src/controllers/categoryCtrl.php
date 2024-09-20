<?php
require 'models/Photo.php';
require 'models/Category.php';


$photo = new Photo();
$category = new Category();


//create new category
if (!empty($_GET) && !empty($_GET['newCat']) && !empty($_GET['newCat'] == 'new')) {
    $category->name = "New Category";
    $category->createCategory();
    header('Location: category.php');
}

//Get id category  and store in avariable for use on popup (for use out of loop)
if (!empty($_GET) && !empty($_GET['id'])) {
    $cat_id = $_GET['id'];
}



// Delete existing category
if (!empty($_GET) && !empty($_GET['cat_id'])) {
    $category->id = $_GET['cat_id'];
    $photo->id_category = $_GET['cat_id'];

    // Retrieve the photo details before deletion
    $allPhotoDetails = $photo->getAllPhotosOfCategory();

    if ($allPhotoDetails) {
        // Loop through each photo and delete its file from the server
        foreach ($allPhotoDetails as $photoDetail) {
            $filePath = "assets/img/uploads/" . $photoDetail->name;
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    // Log file deletion if necessary
                } else {
                    // Handle file deletion error (optional)
                    error_log("Failed to delete file: $filePath");
                }
            } else {
                // Handle case where file does not exist
                error_log("File not found: $filePath");
            }
        }
        
        // Delete all photo records for this category from the database
        $photo->deleteAllByCategory();
    }

    // Finally, delete the category itself
    $category->deleteCategory();

    // Redirect to the category page after successful deletion
    header('Location: category.php');
    exit(); // Ensure script execution stops after redirection
}




// update existing category
if (!empty($_POST) && !empty($_POST['update'])) {
    $category->id = $_POST['update'];
    $category->name = $_POST['category'];
    $category->updateCategory();
    header('Location: category.php');
}



$allCategory = $category->getAllCategoryExceptUser();