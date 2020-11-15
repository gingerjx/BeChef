window.onload = function() {
}

let ingredientNumber = 1;
let preparationNumber = 1;

function addIngredient() {
    var nextIngredient =    `<div id="ingredient-box-` + (ingredientNumber + 1) + `" class="add-recipe-component">
                                <label for="ingredient-label-` + (ingredientNumber + 1) + `">Ingredient ` + (ingredientNumber + 1) + `:</label>
                                <input type="text" id="ingredient-label-` + (ingredientNumber + 1) + `" name="ingredient-label-` + (ingredientNumber + 1) + `">
                            </div>`
    $("#ingredient-box-" + ingredientNumber).after(nextIngredient); 

    ingredientNumber += 1;
}

function addPreparationStep() {
    var nextPreparationStep =    `<div id="preparation-box-` + (preparationNumber + 1) + `" class="add-recipe-component">
                                <label for="preparation-label-` + (preparationNumber + 1) + `">Preparation step ` + (preparationNumber + 1) + `:</label>
                                <input type="text" id="preparation-label-` + (preparationNumber + 1) + `" name="preparation-label-` + (preparationNumber + 1) + `">
                            </div>`
    $("#preparation-box-" + preparationNumber).after(nextPreparationStep); 

    preparationNumber += 1;
}