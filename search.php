<?php
  session_start();

  require_once "database/recipesDB.php";
  require_once "database/checkDB.php";
  require_once "database/numbersDB.php";
  require_once "service/search.php";
  require_once "models/user.php";
  require_once "models/recipe.php";

  $recipes = array();
  if (isset($_GET['action']) && $_GET['action'] === 'filter') 
    $recipes = getFilteredRecipes();
  else if (isset($_GET['action']) && $_GET['action'] === 'order') 
    $recipes = getAllRecipesInOrder($_GET['column'], $_GET['order']);
  else
    $recipes = getTheNewestRecipes();

  $user = null;
  if (isset($_SESSION['logged']))
    $user = unserialize($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="description" content="BeChef">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  </head>
  <body>
    <?php include 'view/components/nav.php' ?>
    <?php include 'view/components/searchBar.php' ?>
    <main id="recipe-cards" style="margin-top: 5em;">
        <?php foreach ($recipes as $rec) : ?>
            <?php include 'view/components/card.php' ?>
        <?php endforeach ?>
    </main>
  </body>
</html>