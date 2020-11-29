<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }
  
  require_once "../private/utils.php";
  require_once "../private/selectQueries.php";
  require_once "../private/user.php";
  require_once "../private/recipe.php";

  $user = unserialize($_SESSION['user']);
  $recipes = getSavedRecipes($user->getID());
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

  <div id="recipes-container" style="width: 100%;">
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

  <script src="js/navigation.js"></script>
</body>
</html>