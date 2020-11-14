<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }
  require_once "../private/utils.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
</head>
<body>
  <?php include "../private/navView.php" ?>
</body>
</html>