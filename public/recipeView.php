<?php
    session_start();
    if (!isset($_GET['recipeID'])) {
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

    $author = getUserByID($rec->getAuthorID());
    $user = unserialize($_SESSION['user']);
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
          <span>author: <?= $author->getFullname() ?></span>
          <span>add date: <?= $rec->getAddDate() ?></span>
        </div>
        <form class="ratings" action="../private/checkRatings.php" method="post">
          <div class="img-number">
            <button type="submit" name="like">
              <? if (userLikedIt($recipeID, $user->getID())): ?>
                <img src="img/thumbs-up-orange.svg" alt="Web icon"/>
              <? else: ?>
                <img src="img/thumbs-up.svg" alt="Web icon"/>
              <? endif; ?>
            </button>
            <b><?= getNumberOfLikes($rec->getRecipeID()) ?></b>
          </div>
          <div class="img-number">
            <button type="submit" name="save">
              <? if (userSavedIt($recipeID, $user->getID())): ?>
                <img src="img/disk-orange.svg" alt="Web icon"/>
              <? else: ?>
                <img src="img/disk.svg" alt="Web icon"/>
              <? endif; ?>
            </button>
            <b><?= getNumberOfSaves($rec->getRecipeID()) ?></b>
          </div>
          <div class="img-number">
            <button type="submit" name="comment">
              <img src="img/comment.svg" alt="Web icon"/>
            </button>
            <b><?= getNumberOfComments($rec->getRecipeID()) ?></b>
          </div>
        </form>
      </div>
      <img src="<?= $rec->getImagePath() ?>"></img>
    </div>
    <div class="space-between-container">
      <div class="property">
        <p><?= $rec->getPreparationTime() ?></p>
        <b>Preparation Time (min)</b>
      </div>
      <div class="property">
        <p><?= $rec->getAverageCost() ?>$</p>
        <b>Average Cost</b>
      </div>
      <div class="property">
        <p><?= $rec->getCountry() ?></p>
        <b>Country</b>
      </div>
      <div class="property">
        <p>
          <?php if ($rec->getVegetarian() == 1) echo 'Yes';
                else echo 'No'; ?>
        </p>
        <b>Vegetarian</b>
      </div>
      <div class="property">
        <p><?= $rec->getDifficultyLevel() ?></p>
        <b>Difficulty level</b>
      </div>
      <div class="property">
        <p><?= $rec->getPeopleNumber() ?></p>
        <b>Number of people</b>
      </div>
      <div class="property">
        <p><?= $rec->getKcalPerPerson() ?></p>
        <b>Kcal per person</b>
      </div>
    </div>
    <div class="space-between-container">
      <ul>
        <h2>Ingredients</h2>
        <?php foreach ($rec->getIngredients() as $ingredient) : ?>
          <li><?= $ingredient ?></pli>
        <?php endforeach ?>
      </ul>
      <ul>
        <h2>Preparation</h2>
        <?php foreach ($rec->getPreparation() as $preparation) : ?>
          <li><?= $preparation ?></pli>
        <?php endforeach ?>
      </ul>
    </div>
    <div id="tags">
      <?php foreach ($rec->getTags() as $tag) : ?>
        <p><?= $tag ?></p>
      <?php endforeach ?>
    </div>
  </div>

  <script src="js/navigation.js"></script>
</body>
</html>