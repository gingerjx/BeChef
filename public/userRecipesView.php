<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }
  require_once "../private/utils.php";
  require_once "../private/dbQueries.php";
  require_once "../private/user.php";

  $user = unserialize($_SESSION['user']);
  $recipes = getUserRecipes($user->getID());
  $stop = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
</head>
<body>
  <?php include "../private/navView.php" ?>

  <script src="js/navigation.js"></script>
</body>
</html>
