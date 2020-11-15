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
  
  <form id="add-recipe" action="#">
    <div class="add-recipe-component">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title">
    </div>
    <div id="title-error" class="error"></div>
    <div class="add-recipe-component">
      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>
    </div>
    <div id="description-error" class="error"></div>
    <div id="ingredient-box-1" class="add-recipe-component">
      <label for="ingredient-label-1">Ingredient 1:</label>
      <input type="text" id="ingredient-label-1" name="ingredient-label-1">
      <input type="button" value="+" onclick="addIngredient()">
    </div>
    <div id="ingredient-box-error" class="error"></div>
    <div id="preparation-box-1" class="add-recipe-component">
      <label for="preparation-label-1">Preparation step 1:</label>
      <input type="text" id="preparation-label-1" name="preparation-label-1">
      <input type="button" value="+" onclick="addPreparationStep()">
    </div>
    <div id="preparation-box-error" class="error"></div>
    <div id="properties" class="add-recipe-component">
      <div class="property">
        <label for="preparation-time">Preparation Time (min)</label>
        <input type="number" min="1" id="preparation-time" name="preparation-time">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="average-cost">Average Cost</label>
        <input type="number" min="0" step=".01" id="average-cost" name="average-cost">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="country">Country</label>
        <input type="text" id="country" name="country">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="vegetarian">Vegetarian</label>
        <input type="radio">
        <div class="error" id="vegetarian" name="vegetarian"></div>
      </div>
      <div class="property">
        <label for="difficulty-level">Difficulty level</label>
        <input type="number" min="1" max="5" id="difficulty-level" name="difficulty-level">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="number-of-people">Number of people</label>
        <input type="number" min="1" id="number-of-people" name="number-of-people">
        <div class="error"></div>
      </div>
      <div class="property">
        <label for="kcal-per-person" >Kcal per person</label>
        <input type="number" min="1" id="kcal-per-person" name="kcal-per-person">
        <div class="error"></div>
      </div>
    </div>
    <div id="input-image" class="add-recipe-component">
      <label for="img">Select recipe image:</label>
      <input type="file" id="img" name="img" accept="image/*">
    </div>
    <div id="input-image-error" class="error"></div>
    <div id="submit-input" class="add-recipe-component">
      <input type="submit">
    </div>
  </form>

  <script src="js/navigation.js"></script>
</body>
</html>