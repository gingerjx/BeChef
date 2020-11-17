<?php
session_start();
if (isset($_SESSION['logged'])) {
    unset($_SESSION['logged']);
    unset($_SESSION['user']);
    header('Location: ../public/loginView.php');
} 
?>