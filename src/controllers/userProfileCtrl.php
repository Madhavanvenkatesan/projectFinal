<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['id_role'])) header('Location: /');

require_once 'models/User.php';
require_once 'models/Photo.php';

$photo = new Photo();
$user = new User();

$photo->id_user = $_GET['userId'];
$user->id = $_GET['userId'];



$userProfile = $user->getUserById();

$userPhotos = $photo->getPhotosByUserId();