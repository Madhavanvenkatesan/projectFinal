<?php
require 'models/Photo.php'; // Include the Photo model for handling image data
require 'models/Category.php'; // Include the Category model for handling category data

$photo = new Photo(); // Create an instance of the Photo class
$category = new Category(); // Create an instance of the Category class

$allCategory = $category->getAllCategoryExceptUser(); // Retrieve all categories except those associated with the user
$photoData = []; // Initialize an array to hold photo data

foreach ($allCategory as $cat) { // Loop through each category
    $photo->id_category = $cat->id; // Set the current category ID in the Photo instance
    foreach ($photo->getAllPhotosOfCategory() as $value) { // Retrieve all photos for the current category

        $imageSize = getimagesize('./assets/img/uploads/' . $value->name); // Get the size of the image

        if (!empty($imageSize)) { // Check if the image size is valid
            $data = [
                'name' => $value->name, // Store the image name
                'height' => $imageSize[1], // Store the image height
                'category' => $value->id_category, // Store the category ID of the image
            ];

            array_push($photoData, $data); // Add the image data to the photoData array
        }
    }
}
