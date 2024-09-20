<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['id_role']))
    header('Location: index.html');

require 'models/User.php';
$user = new User();


//checke if the user is an administrator
if ($_SESSION['id_role'] !== 1)
    header('Location: index.html');

//delete a user
if (!empty($_GET) && !empty($_GET['userId'])) {
    $user_id = $_GET['userId'];
}

if (!empty($_GET) && !empty($_GET['deleteId'])) {
    $user->id = $_GET['deleteId'];
    $user->delete();
}

//update information of user
if (!empty($_POST) && !empty($_POST['userId'])) {

    $error = [];

    $user->id = $_POST['userId'];

    if (!empty($_POST['firstname'])) {
        if (strlen($_POST['firstname']) >= 3 && strlen($_POST['firstname']) <= 30) {
            $user->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $error['firstname-' . $_POST['userId']] = 'Entre 3 et 30 caracteres';
        }
    } else {
        $error['firstname-' . $_POST['userId']] = 'Prenom obligatoire';
    }

    if (!empty($_POST['lastname'])) {
        if (strlen($_POST['lastname']) >= 3 && strlen($_POST['lastname']) <= 30) {
            $user->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $error['lastname-' . $_POST['userId']] = 'Entre 3 et 30 caractères';
        }
    } else {
        $error['lastname-' . $_POST['userId']] = 'Nom obligatoire';
    }

    //check if the email address already exists and is valid
    if (!empty($_POST['email'])) {
        if (strlen($_POST['email']) >= 3 && strlen($_POST['email']) <= 100) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user->email = htmlspecialchars($_POST['email']);
                $checkUser = $user->getUserByEmail();
                //with this followe condition we can avoid checking current user email (for avoid false dublicate error)
                if ($checkUser && $checkUser->id != $user->id) {
                    $error['email-' . $_POST['userId']] = 'email deja utiliser';
                    $user->email = null;
                }
            } else {
                $error['email-' . $_POST['userId']] = 'email invalide';
            }
        } else {
            $error['email-' . $_POST['userId']] = 'Entre 3 et 100 caracteres';
        }
    } else {
        $error['email-' . $_POST['userId']] = 'email obligatoire';
    }

    //check if password is exist
    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    } else {
        $error['password-' . $_POST['userId']] = 'Mot de passe obligatoire';
    }

    //if there is no error table error then call update function for update 
    if (empty($error)) {
        if ($user->update()) {
            $error[] = '';
        } else {
            $error['global'] = 'Enregistrement echouer';
        }
    }
}



//display list of users and details after delete
$listOfUsers = $user->getAllUser();
