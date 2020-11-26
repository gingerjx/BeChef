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

  $url_components = parse_url($_SERVER['REQUEST_URI']); 
  $recipes = array();

  if (!isset($url_components['query'])) {
    $recipes = getAllRecipes();
  } else {
    parse_str($url_components['query'], $params); 
    $column = $params['column'];
    $order = $params['order'];
    $recipes = getAllRecipesInOrder($column, $order);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
  <link href="css/recipeCard.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/orderContainer.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
  <?php include "../private/navView.php" ?>

  <div id="recipes-container">
  <?php foreach ($recipes as $rec) : ?>
    <a class="card" href="<?= 'recipeView.php?recipeID='.$rec->getRecipeID() ?>">
      <img src="<?= $rec->getImagePath() ?>"></img>
      <div class="ratings">
        <div class="img-number">
          <? if ($user != null && userLikedIt($rec->getRecipeID(), $user->getID())): ?>
            <img src="img/thumbs-up-orange.svg" alt="Web icon"/>
          <? else: ?>
            <img src="img/thumbs-up.svg" alt="Web icon"/>
          <? endif; ?>
          <b> <?= getNumberOfLikes($rec->getRecipeID()) ?></b>
        </div>
        <div class="img-number">
          <? if ($user != null && userSavedIt($rec->getRecipeID(), $user->getID())): ?>
            <img src="img/disk-orange.svg" alt="Web icon"/>
          <? else: ?>
            <img src="img/disk.svg" alt="Web icon"/>
          <? endif; ?>
          <b><?= getNumberOfSaves($rec->getRecipeID()) ?></b>
        </div>
        <div class="img-number">
          <img src="img/comment.svg" alt="Web icon"/>
          <b><?= getNumberOfComments($rec->getRecipeID()) ?></b>
        </div>
      </div>
      <h2><?= $rec->getTitle() ?></h2>
    </a>
  <?php endforeach ?>
  </div>
  <form id="order-container" action="../private/orderBy.php" method="post">
    <div id="radio-container">
      <div>
        <input type="checkbox" name="order" value="order">
        <label for="order">Ascending</label><br>
      </div>
      <div>
        <input type="radio" name="order-by" value="add-date">
        <label for="add-date">Add date</label><br>
      </div>
      <div>
        <input type="radio" name="order-by" value="likes">
        <label for="likes">Likes</label><br>
      </div>
      <div>
        <input type="radio" name="order-by" value="saves">
        <label for="saves">Saves</label>
      </div>
      <div>
        <input type="radio" name="order-by" value="title">
        <label for="title">Title</label>
      </div>
      <input type="submit" value="Order by">
    <div>
  </form>

  <script src="js/navigation.js"></script>
</body>
</html>
