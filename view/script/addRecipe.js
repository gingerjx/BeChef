let ingredientNumber = 1;
let preparationNumber = 1;
let normalBorder;
const border = '3px #CD6155 solid';

window.onload = () => {
    normalBorder = $('#title').css('border');
}

function addIngredient() {

    let nextIngredient =    `<div id="ingredient-box-${ingredientNumber + 1}" class="add-recipe-component">
                                <label for="ingredient-${ingredientNumber + 1}">Ingredient ${ingredientNumber + 1}:</label>
                                <input type="text" id="ingredient-${ingredientNumber + 1}" name="ingredient-${ingredientNumber + 1}" >
                            </div>`;

    if (window.innerWidth > 979) 
        $("#ingredient-box-" + ingredientNumber).after(nextIngredient); 
    else
        $("#add-ingredient-button").before(nextIngredient);

    ingredientNumber += 1;
}

function addPreparationStep() {
    var nextPreparationStep =   `<div id="preparation-box-${preparationNumber + 1}" class="add-recipe-component">
                                    <label for="preparation-${preparationNumber + 1}">Preparation step ${preparationNumber + 1}:</label>
                                    <input type="text" id="preparation-${preparationNumber + 1}" name="preparation-${preparationNumber + 1}">
                                </div>`;

    if (window.innerWidth > 979) 
        $("#preparation-box-" + preparationNumber).after(nextPreparationStep); 
    else
        $("#add-preparation-button").before(nextPreparationStep);
    
    preparationNumber += 1;
}


$('#add-recipe').on('submit', function (e) {
    e.preventDefault();

    $('#recipe-img').css('border', normalBorder);
    $('#recipe-img-error').html('');

    let values = $(this).serializeArray();
    
    let ingredients = createIngredients(values);
    let preparations = createPreparations(values, 'preparation');

    let valid = validateForm(values[0].value,
                            values[1].value,
                            values[2].value,
                            values[3].value,
                            values[4].value,
                            values[5].value,
                            values[6].value,
                            values[7].value,
                            ingredients,
                            preparations,   
                            values[values.length - 1].value,);

    if (!valid)
        return;

    let inputsName =    'title, description, preparation-time, average-cost, country, ' +
                        'vegetarian, difficulty-level, number-of-people, kcal-per-person' +
                        'recipe-img, tags, recipe-img, ';
    for (let i=0; i<ingredients.length; ++i)
        inputsName += 'ingredient-' + (i+1) + ', ';
    for (let i=0; i<preparations.length; ++i)
        inputsName += 'preparation-' + (i+1) + ', ';
    inputsName = inputsName.substr(0, inputsName.length - 2);

    let inputs = $(this).find(inputsName);
    inputs.prop('disabled', true);

    let request = $.ajax({
        type: 'post',
        url: 'service/addRecipe.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false
    });

    request.done((data) => {
        if (data === 'success') {
            location.href = 'userRecipes.php';
        } else if (data === 'Invalid form') {

        } else {
            $('#recipe-img-error').html(data);
            $('#recipe-img').css('border', border);
        }
    });

    request.fail(() => {
        //TODO
    })

    request.always(() => {
        inputs.prop('disabled', false);
    }) 
});

function createIngredients(values, substr) {
    let array = []
    values.forEach(e => {
        if (e.name.includes('ingredient')) 
            array.push(e.value);
    });
    return array;
}

function createPreparations(values, substr) {
    let array = []
    values.forEach(e => {
        if (e.name.includes('preparation') && !e.name.includes('preparation-time')) 
            array.push(e.value);
    });
    return array;
}

function validateForm(title, descr, prepTime, avgCost, country, diffLevel, numOfPpl, kcalPerPerson, ingredients, preparations, tags) {
    let valid = true;

    $('#title').css('border', normalBorder);
    $('#add-title-error').html('');
    
    $('#description').css('border', normalBorder);
    $('#add-decription-error').html('');

    $('#preparation-time').css('border', normalBorder);
    $('#preparation-time-error').html('');

    $('#average-cost').css('border', normalBorder);
    $('#average-cost-error').html('');

    $('#country').css('border', normalBorder);
    $('#country-error').html('');

    $('#difficulty-level').css('border', normalBorder);
    $('#difficulty-level-error').html('');

    $('#number-of-people').css('border', normalBorder);
    $('#number-of-people-error').html('');

    $('#kcal-per-person').css('border', normalBorder);
    $('#kcal-per-person-error').html('');

    for(let i=0; i<ingredients.length; ++i) {
        $('#ingredient-' + (i+1)).css('border', normalBorder);
    }
    $('#ingredients-error').html('');

    for(let i=0; i<preparations.length; ++i) {
        $('#preparation-' + (i+1)).css('border', normalBorder);
    }
    $('#preparations-error').html('');

    $('#tags').css('border', normalBorder);
    $('#tags-error').html('');



    if (title.length < 5 || title.length > 50) {
        valid = false;
        $('#add-title-error').html('Text range: (5, 50)');
        $('#title').css('border', border);
    }

    if (descr.length < 50 || title.descr > 2550) {
        valid = false;
        $('#add-decription-error').html('Text range: (50, 2500)');
        $('#description').css('border', border);
    }

    if (prepTime < 1 || prepTime > 324000) {
        valid = false;
        $('#preparation-time-error').html('Time range: (1, 324000)');
        $('#preparation-time').css('border', border);
    }

    if (avgCost < 0.1 || avgCost > 1000) {
        valid = false;
        $('#average-cost-error').html('Cost range: (0.1, 1000)');
        $('#average-cost').css('border', border);
    }

    if (country.length < 3 || country.length > 50) {
        valid = false;
        $('#country-error').html('Text range: (3, 50)');
        $('#country').css('border', border);
    }

    if (diffLevel < 1 || diffLevel > 5) {
        valid = false;
        $('#difficulty-level-error').html('Level range: (1, 5)');
        $('#difficulty-level').css('border', border);
    }

    if (numOfPpl < 1 || numOfPpl > 10) {
        valid = false;
        $('#number-of-people-error').html('Number range: (1, 10)');
        $('#number-of-people').css('border', border);
    }

    if (kcalPerPerson < 1 || kcalPerPerson > 8000) {
        valid = false;
        $('#kcal-per-person-error').html('Number range: (1, 8000)');
        $('#kcal-per-person').css('border', border);
    }

    for(let i=0; i<ingredients.length; ++i) {
        let ingrd = ingredients[i];
        if (ingrd.length < 5 || ingrd.length > 100) {
            valid = false;
            $('#ingredients-error').html('Text range: (5, 100)');
            $('#ingredient-' + (i+1)).css('border', border);
        }
    }

    for(let i=0; i<preparations.length; ++i) {
        let prep = preparations[i];
        if (prep.length < 5 || prep.length > 100) {
            valid = false;
            $('#preparations-error').html('Text range: (5, 100)');
            $('#preparation-' + (i+1)).css('border', border);
        }
    }

    if (!tags.match(/^[0-9a-z,]+$/)) {
        valid = false;
        $('#tags-error').html('Only characters, numbers and commas as separator');
        $('#tags').css('border', border);
    }
    return valid;
}