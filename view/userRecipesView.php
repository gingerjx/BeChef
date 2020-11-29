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

  $url_components = parse_url($_SERVER['REQUEST_URI']); 
  $recipes = array();

  if (!isset($url_components['query'])) {
    $recipes = getUserRecipes($user->getID());
  } else {
    parse_str($url_components['query'], $params); 
    $column = $params['column'];
    $order = $params['order'];
    $recipes = getUserRecipesInOrder($user->getID(), $column, $order);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "components/navHead.php" ?>
  <link href="css/recipeCard.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/orderContainer.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
  <?php include "components/navView.php" ?>
  <?php include "components/recipesListView.php" ?>
  <?php include "components/orderView.php" ?>

  <script src="js/navigation.js"></script>
</body>
</html>
