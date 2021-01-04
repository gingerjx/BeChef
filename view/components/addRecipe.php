<form id="add-recipe" action="service/addRecipe.php" method="post" enctype=multipart/form-data>
    <div class="add-recipe-component">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div id="add-title-error" class="error"></div>

    <div class="add-recipe-component">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div id="add-decription-error" class="error"></div>
    
    <div id="add-recipe-properties" class="add-recipe-component">
        <div class="property">
            <img src="view/images/chronometer.svg" alt="Time icon"/>
            <input id="preparation-time" type="number" min="1" max="324000" name="preparation-time">
            <label for="preparation-time">Preparation Time (min)</label>
        <div id="preparation-time-error" class="error"></div>
        </div>
        <div class="property">
            <img src="view/images/money.svg" alt="Money icon"/>
            <input type="number" min="0.1" max="1000.0" step=".01" id="average-cost" name="average-cost">
            <label for="average-cost">Average Cost</label>
        <div id="average-cost-error" class="error"></div>
        </div>
        <div class="property">
            <img src="view/images/coronavirus.svg" alt="World icon"/>
            <input type="text" id="country" name="country">
            <label for="country">Country</label>
        <div id="country-error" class="error"></div>
        </div>
        <div class="property">
            <img src="view/images/vegetarian.svg" alt="Vegetarian icon"/>
            <input type="checkbox" id="vegetarian" name="vegetarian">
            <label id="vege" for="vegetarian">Vegetarian</label>
        <div class="error"></div>
        </div>
        <div class="property">
            <img src="view/images/level.svg" alt="Level icon"/>
            <input type="number" min="1" max="5" id="difficulty-level" name="difficulty-level">
            <label for="difficulty-level">Difficulty level</label>
        <div id="difficulty-level-error" class="error"></div>
        </div>
        <div class="property">
            <img src="view/images/community.svg" alt="Level icon"/>
            <input type="number" min="1" max="10" id="number-of-people" name="number-of-people">
            <label for="number-of-people">Number of people</label>
        <div id="number-of-people-error" class="error"></div>
        </div>
        <div class="property">
        <img src="view/images/calories.svg" alt="Level icon"/>
        <input type="number" min="1" max="8000" id="kcal-per-person" name="kcal-per-person">
        <label for="kcal-per-person" >Kcal per person</label>
        <div id="kcal-per-person-error" class="error"></div>
        </div>
    </div>

    <div id="ingredient-box-1" class="add-recipe-component">
        <label for="ingredient-1">Ingredient 1:</label>
        <input type="text" id="ingredient-1" name="ingredient-1" >
        <input type="button" id="add-ingredient-button" onclick="addIngredient()" value="+">
    </div>
    <div id="ingredients-error" class="error"></div>
    
    <div id="preparation-box-1" class="add-recipe-component">
        <label for="preparation-1">Preparation step 1:</label>
        <input type="text" id="preparation-1" name="preparation-1">
        <input type="button" id="add-preparation-button" onclick="addPreparationStep()" value="+">
    </div>
    <div id="preparations-error" class="error"></div>

    <div class="add-recipe-component">
        <label for="recipe-img">Select recipe image:</label>
        <input type="file" id="recipe-img" name="recipe-img" accept="image/*">
    </div>
    <div id="recipe-img-error" class="error"></div>

    <div class="add-recipe-component">
        <label for="tags">Tags:</label>
        <input type="text" placeholder="tag1,tag2,tag3,..." id="tags" name="tags">
    </div>
    <div id="tags-error" class="error"></div>

    <div id="submit-input" class="add-recipe-component">
        <input type="submit" value="Submit">
    </div>
    <script src="view/script/addRecipe.js"></script>
</form>
