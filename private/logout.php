<?php
session_start();
if (isset($_SESSION['logged'])) {
    unset($_SESSION['logged']);
    unset($_SESSION['username']);
    header('Location: ../public/loginView.php');
} 
?>