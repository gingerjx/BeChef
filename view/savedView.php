<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }

  require_once "../service/utils.php";
  require_once "../database/recipesDB.php";
  require_once "../database/checkDB.php";
  require_once "../database/numbersDB.php";
  require_once "../models/user.php";
  require_once "../models/recipe.php";

  $user = unserialize($_SESSION['user']);
  $recipes = getSavedRecipes($user->getID());
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
