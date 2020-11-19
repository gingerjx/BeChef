<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }
  require_once "../private/utils.php";
  require_once "../private/dbQueries.php";
  require_once "../private/user.php";
  require_once "../private/recipe.php";

  $user = unserialize($_SESSION['user']);
  $recipes = getUserRecipes($user->getID());
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
</head>
<body>
  <?php include "../private/navView.php" ?>
  <?php
    echo $recipes[0]->getRecipeID();
  ?>
  <script src="js/navigation.js"></script>
</body>
</html>
