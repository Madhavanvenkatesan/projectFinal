<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['id_role']) || $_SESSION['id_role'] !== 1)
    header('Location: index.html');


//create a new user
if (!empty($_POST) && !empty($_POST['type'])) {
    require 'models/User.php';
    $user = new User();

    if ($_POST['type'] == 'create') {
        $error = [];

        if (!empty($_POST['firstname'])) {
            if (strlen($_POST['firstname']) >= 3 && strlen($_POST['firstname']) <= 30) {
                $user->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $error['firstname'] = 'Entre 3 et 30 caracteres';
            }
        } else {
            $error['firstname'] = 'Prenom obligatoire';
        }

        if (!empty($_POST['lastname'])) {
            if (strlen($_POST['lastname']) >= 3 && strlen($_POST['lastname']) <= 30) {
                $user->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $error['lastname'] = 'Entre 3 et 30 caracteres';
            }
        } else {
            $error['lastname'] = 'Prenom obligatoire';
        }

        if (!empty($_POST['email'])) {
            // Remove var_dump after debugging
            if (strlen($_POST['email']) >= 3 && strlen($_POST['email']) <= 100) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $user->email = htmlspecialchars($_POST['email']);
                    $checkUser = $user->getUserByEmail();
                    if ($checkUser) {
                        $error['email'] = 'email deja utiliser';
                        $user->email = null;
                    }
                } else {
                    $error['email'] = 'email invalide';
                }
            } else {
                $error['email'] = 'Entre 3 et 100 caracteres';
            }
        } else {
            $error['email'] = 'email obligatoire';
        }

        if (!empty($_POST['password'])) {
            if (!empty($_POST['confirmPassword'])) {
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    $user->password = $_POST['password'];
                } else {
                    $error['confirmPassword'] = 'Confirmation de mot de passe ne correspond pas';
                }
            } else {
                $error['confirmPassword'] = 'Confirmation de mot de passe obligatoire';
            }
        } else {
            $error['password'] = 'Mot de passe obligatoire';
        }

        if (empty($error)) {
            if ($user->registerNew()) {
                $error[] = '';
                header('Location: userList.php');
                exit;
            } else {
                $error['global'] = 'Enregistrement echouer';
            }
        }
    }
}