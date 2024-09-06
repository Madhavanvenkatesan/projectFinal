<?php
session_start();


if (!empty($_POST)) {
    require 'models/User.php';
    $user = new User();

    if (!empty($_POST['login_email'])) {

        $user->email = $_POST['login_email'];
        $checkUser = $user->getUserByEmail();
        if ($checkUser) {
            if ($_POST['login_password'] === $checkUser->password) {
                $_SESSION['id'] = $checkUser->id;
                $_SESSION['id_role'] = $checkUser->id_role;
                $_SESSION['name'] = $checkUser->firstname;
                if ($checkUser->id_role == 1) {
                    header('Location:admin.php');
                } else {
                    header('Location:user.php');
                }
            } else {
                $error['login_password'] = 'Mot de passe incorrecte';
            }
        } else {
            $error['login_email'] = 'Email non trouver';
        }
    } else {
        $error['login_email'] = 'Email obligatoire';
    }
}