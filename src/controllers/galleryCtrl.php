<?php
require '../models/Photo.php'; 
require '../models/Category.php'; 

// Create an instance of the Photo class
$photo = new Photo(); 
// Create an instance of the Category class
$category = new Category(); 

// Retrieve all categories except those associated with the user
$allCategory = $category->getAllCategoryExceptUser(); 
// Initialize an array to hold photo data
$photoData = []; 

foreach ($allCategory as $cat) { 
    // Set the current category ID in the Photo instance
    $photo->id_category = $cat->id; 
    // Retrieve all photos for the current category
    foreach ($photo->getAllPhotosOfCategory() as $value) { 

        // Get the size of the image
        $imageSize = getimagesize('../assets/img/uploads/' . $value->name); 

        // Check if the image size is valid
        if (!empty($imageSize)) { 
            $data = [
                'name' => $value->name, // Store the image name
                'height' => $imageSize[1] / $imageSize[0], // Store the image with ratio by divising height by width (1 heighr and 0 width)
                'category' => $value->id_category, // Store the category ID of the image
            ];

            array_push($photoData, $data); // Add the image data to the photoData array
        }
    }
}
