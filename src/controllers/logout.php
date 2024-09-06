<?php
//after clicked logout link followed functions will close a session and redirect to index page
session_start();
session_destroy();
header('Location: ../index.php');
