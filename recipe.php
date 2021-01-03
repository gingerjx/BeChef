<?php
    session_start();
    if (!isset($_GET['recipeID'])) {
        header('Location: index.php');
        exit();
    }

    require_once "database/recipesDB.php";
    require_once "database/checkDB.php";
    require_once "database/numbersDB.php";
    require_once "database/usersDB.php";
    require_once "models/user.php";
    require_once "models/recipe.php";

    $recipeID = $_GET['recipeID'];
    $rec = getRecipeByID($recipeID);
    if ($rec == null) {
        echo "Requested recipe not found";
        exit();
    }

    $author = getUserByID($rec->getAuthorID());
    $comments = getRecipeComments($recipeID);

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
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <?php include 'view/components/nav.php' ?>
    <?php include 'view/components/recipe.php' ?>
  </body>
</html>
