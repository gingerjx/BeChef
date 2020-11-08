<?php
  session_start();
  if (isset($_SESSION['logged'])) {
    header("Location: public/homeView.php");
  } 
  else {
    header("Location: public/loginView.php");
  }
?>