<?php
    session_start();
    if (!isset($_SESSION['logged']) || !isset($_GET['recipeID'])) {
        header('Location: loginView.php');
        exit();
    }

    require_once "../private/utils.php";
    require_once "../private/dbQueries.php";
    require_once "../private/user.php";
    require_once "../private/recipe.php";

    $recipeID = $_GET['recipeID'];
    $rec = getRecipeByID($recipeID);
    if ($rec == null) {
        echo "Requested recipe not found";
        exit();
    }

    $user = unserialize($_SESSION['user']);
    $author = getUserByID($rec->getAuthorID());
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
  <link href="css/recipe.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
  <?php include "../private/navView.php"; ?>

  <div id="recipe-container">
    <div id="main-info">     
      <div>
        <h2><?= $rec->getTitle() ?></h2>
        <p><?= $rec->getDescription() ?></p>
        <div>
          <b>author: <?= $author->getFullname() ?></b>
          <b>add date: <?= $rec->getAddDate() ?></b>
        </div>
      </div>
      <img src="<?= $rec->getImagePath() ?>"></img>
    </div>
  </div>

  <script src="js/navigation.js"></script>
</body>
</html>