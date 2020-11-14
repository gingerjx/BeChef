<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: ../public/loginView.php');
    exit();
  }
  header("Location: ../public/addRecipeView.php");
?>