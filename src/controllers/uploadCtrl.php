<?php
session_start();
require '../models/Photo.php';


$photo = new Photo();
$error[] = '';

if (empty($_SESSION['id']) || empty($_SESSION['id_role']))
    header('Location: index.html');

//checke if the user is an administrator
if ($_SESSION['id_role'] !== 1)
    header('Location: index.html');

if (!empty($_GET['userId'])) {
    require '../models/User.php';
    $user = new User();
    $user->id = $_GET['userId'];
    $userProfile = $user->getUserById();
}

// Upload new photos
if (!empty($_POST['submit']) && !empty($_FILES['image'])) {

    // Sanitize and assign values to the photo object
    $userId = filter_var($_GET['userId'], FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_GET['category'], FILTER_SANITIZE_NUMBER_INT);


    for ($i = 0; $i < sizeof($_FILES['image']['name']); $i++) {

        // Check the file type to ensure it's an image (jpeg, jpg)
        $allowedTypes = ['image/jpeg', 'image/jpg'];
        if (in_array($_FILES['image']['type'][$i], $allowedTypes)) {
            // Sanitize the file name to prevent directory traversal attacks
            $photoName = basename($_FILES['image']['name'][$i]);

            $photoName = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $photoName); // Allow only specific characters

            // Specify the target directory
            $target = "../assets/img/uploads/";
            $targetFile = $target . $photoName;

            // Ensure unique file name to prevent overwriting
            if (!empty($targetFile)) {
                $photoNameNew = $userId . "_" . $photoName;
                $targetFile = $target . $photoNameNew;
            }

            // Assign values to the photo object
            $photo->name = $photoNameNew;
            $photo->id_user = $userId;
            $photo->id_category = $category;

            // Check if a photo with the same name already exists in the database
            $testExistance = $photo->getPhotoByName();
            if (!$testExistance) {
                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $targetFile)) {
                    // Upload the new photo if no conflict
                    $photo->uploadNew();
                    $error['upload'] = 'Photo uploaded successfully.';
                } else {
                    $error['upload'] = 'Failed to move the uploaded file.';
                }
            } else {
                $isConflict = false;
                // Check if a photo with the same name already exists for the current user
                foreach ($testExistance as $existingPhoto) {
                    if ($existingPhoto->id_user == $userId) {
                        $error['upload'] = 'A photo with this name already exists.';
                        break;
                    }
                }
                if (empty($error['upload'])) {
                    $isConflict = true;
                }
                // Upload the new photo if a conflict was not found
                if ($isConflict) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $targetFile)) {
                        $photo->uploadNew();
                        $error['upload'] = 'Photo uploaded successfully.';
                    } else {
                        $error['upload'] = 'Failed to move the uploaded file.';
                    }
                }
            }
        } else {
            // Handle error - invalid file type
            $error['upload'] = 'Invalid file type. Only JPEG and JPG images are allowed.';
        }
    }
} else {
    $error['upload'] = 'No file submitted or form was not submitted properly.';
}


// Delete photo using id
if (!empty($_GET) && !empty($_GET['idPhoto'])) {
    // Sanitize the input to ensure it's an integer
    $photoId = filter_var($_GET['idPhoto'], FILTER_SANITIZE_NUMBER_INT);
    $userId = filter_var($_GET['userId'], FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_GET['category'], FILTER_SANITIZE_NUMBER_INT);

    // Assign the sanitized ID to the photo object
    $photo->id = $photoId;

    // Retrieve the photo details before deletion
    $photoDetails = $photo->getPhotoById();

    if ($photoDetails) {
        // Delete the photo from the database
        if ($photo->delete()) {
            // Attempt to delete the photo file from the server
            $filePath = "../assets/img/uploads/" . $photoDetails->name;
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file from the server
            }
            $error['delete'] = 'Photo deleted successfully.';
        } else {
            $error['delete'] = 'Failed to delete the photo from the database.';
        }
    } else {
        $error['delete'] = 'Photo not found.';
    }

    // Redirect back to the upload page
    header('Location: upload.php?userId=' . $userId . '&category=' . $category);
    exit();
}

//delete all the photos
if (!empty($_POST) && !empty($_POST['deleteAll'])) {
    // Sanitize the input to ensure it's an integer
    $userId = filter_var($_GET['userId'], FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_GET['category'], FILTER_SANITIZE_NUMBER_INT);

    // Delete all photos for the specified user and category
    $photo->id_user = $userId;
    $photo->id_category = $category;

    // Retrieve the photo details before deletion
    $allPhotoDetails = $photo->getPhotosByUserId();

    if ($allPhotoDetails) {
        if ($photo->deleteAll()) {
            // Loop through each photo and delete its file from the server
            for ($i = 0; $i < sizeof($allPhotoDetails); $i++) {
                $filePath = "../assets/img/uploads/". $allPhotoDetails[$i]->name;
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file from the server
                }
            }
            $error['delete'] = 'All photos deleted successfully.';
        } else {
            $error['delete'] = 'Failed to delete the photo from the database.';
        }
    } else {
        $error['delete'] = 'Photo not found.';
    }

    // Redirect back to the upload page
    header('Location: upload.php?userId=' . $userId . '&category=' . $category);
}


//display list of photos
$photo->id_category = filter_var($_GET['category'], FILTER_SANITIZE_NUMBER_INT);
$photo->id_user = filter_var($_GET['userId'], FILTER_SANITIZE_NUMBER_INT);
$listOfUserPhotos = $photo->getPhotosByUserIdAndCat();
