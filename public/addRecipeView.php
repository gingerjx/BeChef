<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
    exit();
  }
  require_once "../private/utils.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../private/navInc.php" ?>
  <link href="css/addRecipe.css?v=<?php echo time(); ?>" rel="stylesheet">
  <script src="js/addRecipe.js"></script>
</head>
<body>
  <?php include "../private/navView.php" ?>
  
  <form id="add-recipe" action="../private/addRecipe.php" method="post" enctype=multipart/form-data>
    <div class="add-recipe-component">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value=<?php displayInputAndUnset('title'); ?>>
    </div>
    <div class="error"><?php displayAndUnset('e_title') ?></div>
    <div class="add-recipe-component">
      <label for="description">Description:</label>
      <textarea id="description" name="description"><?php displayAndUnset('description'); ?></textarea>
    </div>
    <div class="error"><?php displayAndUnset('e_description') ?></div>
    <div id="ingredient-box-1" class="add-recipe-component">
      <label for="ingredient-1">Ingredient 1:</label>
      <input type="text" id="ingredient-1" name="ingredient-1"  value=<?php displayInputAndUnset('ingredient_1'); ?>>
      <input type="button" value="+" onclick="addIngredient()">
    </div>
    <div class="error"><?php displayAndUnset('e_ingredients') ?></div>
    <div id="preparation-box-1" class="add-recipe-component">
      <label for="preparation-1">Preparation step 1:</label>
      <input type="text" id="preparation-1" name="preparation-1"  value=<?php displayInputAndUnset('preparation_1'); ?>>
      <input type="button" value="+" onclick="addPreparationStep()">
    </div>
    <div class="error"><?php displayAndUnset('e_preparation') ?></div>
    <div id="properties" class="add-recipe-component">
      <div class="property">
        <label for="preparation-time">Preparation Time (min)</label>
        <input type="number" min="1" max="324000" id="preparation-time" name="preparation-time"  value=<?php displayInputAndUnset('preparation_time'); ?>>
        <div class="error"><?php displayAndUnset('e_preparation_time') ?></div>
      </div>
      <div class="property">
        <label for="average-cost">Average Cost</label>
        <input type="number" min="0.1" max="1000.0" step=".01" id="average-cost" name="average-cost"  value=<?php displayInputAndUnset('average_cost'); ?>>
        <div class="error"><?php displayAndUnset('e_average_cost') ?></div>
      </div>
      <div class="property">
        <label for="country">Country</label>
        <input type="text" id="country" name="country"  value=<?php displayInputAndUnset('country'); ?>>
        <div class="error"><?php displayAndUnset('e_country') ?></div>
      </div>
      <div class="property">
        <label for="vegetarian">Vegetarian</label>
        <input type="checkbox" id="vegetarian" name="vegetarian">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="difficulty-level">Difficulty level</label>
        <input type="number" min="1" max="5" id="difficulty-level" name="difficulty-level" value=<?php displayInputAndUnset('difficulty_level'); ?>>
        <div class="error"><?php displayAndUnset('e_difficulty_level') ?></div>
      </div>
      <div class="property">
        <label for="number-of-people">Number of people</label>
        <input type="number" min="1" max="10" id="number-of-people" name="number-of-people" value=<?php displayInputAndUnset('people_number'); ?>>
        <div class="error"><?php displayAndUnset('e_people_number') ?></div>
      </div>
      <div class="property">
        <label for="kcal-per-person" >Kcal per person</label>
        <input type="number" min="1" max="8000" id="kcal-per-person" name="kcal-per-person" value=<?php displayInputAndUnset('kcal_per_person'); ?>>
        <div class="error"><?php displayAndUnset('e_kcal_per_person') ?></div>
      </div>
    </div>
    <div class="add-recipe-component">
      <label for="recipe-img">Select recipe image:</label>
      <input type="file" id="recipe-img" name="recipe-img" accept="image/*">
    </div>
    <div class="error"><?php displayAndUnset('e_recipe_img') ?></div>
    <div id="submit-input" class="add-recipe-component">
      <input type="submit">
    </div>
  </form>

  <script src="js/navigation.js"></script>
</body>
</html>