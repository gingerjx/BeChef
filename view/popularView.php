<?php
  session_start();

  require_once "../service/utils.php";
  require_once "../database/recipesDB.php";
  require_once "../database/checkDB.php";
  require_once "../database/numbersDB.php";
  require_once "../models/user.php";
  require_once "../models/recipe.php";

  $recipes = getPopularRecipes();

  $user = null;
  if (isset($_SESSION['logged']))
    $user = unserialize($_SESSION['user']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "components/navHead.php" ?>
  <link href="css/recipeCard.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
  <?php include "components/navView.php" ?>
  <?php include "components/recipesListView.php" ?>

  <script src="js/navigation.js"></script>
</body>
</html>
