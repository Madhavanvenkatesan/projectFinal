<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['id_role']))
// Redirect to index if session ID or role is empty
    header('Location: /'); 

// Check if the user is an administrator
if ($_SESSION['id_role'] !== 1)
// Redirect to index if the user is not an administrator
    header('Location: /'); 

