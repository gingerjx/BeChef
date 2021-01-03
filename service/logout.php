<?php
session_start();
if (isset($_SESSION['logged'])) {
    $_SESSION = array();
    session_destroy();
    header('Location: '.$SERVER['DOCUMENT_ROOT'].'/login.php');
} 
?>