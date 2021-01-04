<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }

  require_once "database/recipesDB.php";
  require_once "database/checkDB.php";
  require_once "database/numbersDB.php";
  require_once "models/user.php";
  require_once "models/recipe.php";

  $user = unserialize($_SESSION['user']);
  $recipes = getSavedRecipes($user->getID());
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="description" content="BeChef">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <?php include 'view/components/nav.php' ?>
    <main id="recipe-cards">
        <?php foreach ($recipes as $rec) : ?>
            <?php include 'view/components/card.php' ?>
        <?php endforeach ?>
    </main>
  </body>
</html>