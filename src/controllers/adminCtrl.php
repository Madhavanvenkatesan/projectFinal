<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['id_role']))
    header('Location: /');

//checke if the user is an administrator
if ($_SESSION['id_role'] !== 1)
    header('Location: /');
