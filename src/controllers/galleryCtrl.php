<?php
require 'models/Photo.php';
require 'models/Category.php';


$photo = new Photo();
$category = new Category();

$allCategory = $category->getAllCategoryExceptUser();
$photoData = [];

foreach ($allCategory as $cat) {
    $photo->id_category = $cat->id;
    foreach ($photo->getAllPhotosOfCategory() as $value) {

        $imageSize = getimagesize('./assets/img/uploads/' . $value->name);

        if (!empty($imageSize)) {
            $data = [
                'name' => $value->name,
                'height' => $imageSize[1],
                'category' => $value->id_category,
            ];


            array_push($photoData, $data);
        }
    }
}


