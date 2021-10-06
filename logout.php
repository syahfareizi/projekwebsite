<?php

session_start();

if (!empty($_SESSION['email'])) {
    unset($_SESSION['email']);
    session_destroy();
    header('Location: index.php');
} else {
    header('Location: login.php');
}

?>