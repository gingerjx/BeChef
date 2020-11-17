<?php
    require_once "debug.php";

    session_start();
    $valid = true;

    $title = htmlentities($_POST['title']);
    $_SESSION['title'] = $title;

    $description = htmlentities($_POST['description']);
    $_SESSION['description'] = $description;

    $ingredient_number = 1;
    $ingredients = array();
    while (!empty($_POST['ingredient-'.$ingredient_number])) {
        $ingredients[] = htmlentities($_POST['ingredient-'.$ingredient_number]);
        $ingredient_number += 1;
        $_SESSION['ingredient_1'] = $ingredients[0];
    }

    $preparation_number = 1;
    $preaparation = array();
    while (!empty($_POST['preparation-'.$preparation_number])) {
        $preaparation[] = htmlentities($_POST['preparation-'.$preparation_number]);
        $preparation_number += 1;
        $_SESSION['preparation_1'] = $preaparation[0];
    }
    
    $preparation_time = htmlentities($_POST['preparation-time']);
    $_SESSION['preparation_time'] = $preparation_time;
    $average_cost = htmlentities($_POST['average-cost']);
    $_SESSION['average_cost'] = $average_cost;
    $country = htmlentities($_POST['country']);
    $_SESSION['country'] = $country;
    $vegetarian = empty($_POST['vegetarian']) ? false : true;
    $difficulty_level = htmlentities($_POST['difficulty-level']);
    $_SESSION['difficulty_level'] = $difficulty_level;
    $number_of_people = htmlentities($_POST['number-of-people']);
    $_SESSION['people_number'] = $number_of_people;
    $kcal_per_person = htmlentities($_POST['kcal-per-person']);
    $_SESSION['kcal_per_person'] = $kcal_per_person;

    $image_path = "";
    $max_size = 1024*1024;
    $target_dir = $_SERVER['DOCUMENT_ROOT'].'/public/img/';
    $image_ext = strtolower(pathinfo($_FILES['recipe-img']['name'], PATHINFO_EXTENSION));

    try {
        if (!isset($_FILES['recipe-img']['error']) || is_array($_FILES['recipe-img']['error'])) {
            throw new RuntimeException('Invalid parameters');
        }
        
        switch ($_FILES['recipe-img']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('File size limit '.$max_size.'B');
            default:
                throw new RuntimeException('Unknown errors.');
        }
        
        if ($_FILES['recipe-img']['size'] > $max_size) {
            throw new RuntimeException('File size limit '.$max_size.'B');
        }
        
        if ($image_ext != 'jpeg' && $image_ext != 'jpg'
            && $image_ext != 'png' && $image_ext != 'svg') {
            throw new RuntimeException('Invalid format');
        }

        $image_path = sprintf("%s%s.%s", 
                            $target_dir, 
                            sha1_file($_FILES['recipe-img']['tmp_name']),
                            $image_ext);
        move_uploaded_file($_FILES['recipe-img']['tmp_name'], $image_path);
    } catch (RuntimeException $e) {
        $valid = false;
        $_SESSION['e_recipe_img'] = $e->getMessage();
    } 

    require_once "recipe.php";
    require_once "catchAddRecipeFormErrors.php";

    $recipe = new Recipe($title, $description, $ingredients, $preaparation, $preparation_time, $average_cost, $country,
                         $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path);
    if ($valid)
        $valid = catchAddRecipeFormErrors($recipe);
    else 
        catchAddRecipeFormErrors($recipe);

    if (!$valid) {
        header("Location: ../public/addRecipeView.php");
        exit();
    }

    require_once "connectdb.php";
    require_once "user.php";

    $user = unserialize($_SESSION['user']);
    $recipe->setAuthorID($user->getId());
    $recipe->insertToDB($connection);
?>  