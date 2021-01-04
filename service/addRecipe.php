<?php
    session_start();

    require_once("catchAddRecipeFormErrors.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/database/insertDB.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/models/user.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/models/recipe.php");

    $valid = true;

    $title = htmlentities($_POST['title'], ENT_QUOTES, "UTF-8");
    $description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");

    $ingredient_number = 1;
    $ingredients = array();
    while (!empty($_POST['ingredient-'.$ingredient_number])) {
        $ingredients[] = htmlentities($_POST['ingredient-'.$ingredient_number], ENT_QUOTES, "UTF-8");
        $ingredient_number += 1;
    }

    $preparation_number = 1;
    $preaparation = array();
    while (!empty($_POST['preparation-'.$preparation_number])) {
        $preaparation[] = htmlentities($_POST['preparation-'.$preparation_number], ENT_QUOTES, "UTF-8");
        $preparation_number += 1;
    }
    
    $preparation_time = htmlentities($_POST['preparation-time'], ENT_QUOTES, "UTF-8");
    $average_cost = htmlentities($_POST['average-cost'], ENT_QUOTES, "UTF-8");
    $country = htmlentities($_POST['country'], ENT_QUOTES, "UTF-8");
    $vegetarian = empty($_POST['vegetarian']) ? false : true;
    $difficulty_level = htmlentities($_POST['difficulty-level'], ENT_QUOTES, "UTF-8");
    $number_of_people = htmlentities($_POST['number-of-people'], ENT_QUOTES, "UTF-8");
    $kcal_per_person = htmlentities($_POST['kcal-per-person'], ENT_QUOTES, "UTF-8");
    $tags = htmlentities($_POST['tags'], ENT_QUOTES, "UTF-8");

    $image_path = "";
    $max_size = 1024*1024;
    $target_dir = $_SERVER['DOCUMENT_ROOT'].'/view/images/recipes/';
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
            && $image_ext != 'png') {
            throw new RuntimeException('Invalid format, only .jpeg and .png');
        }

        $image_path = sha1_file($_FILES['recipe-img']['tmp_name']).'.'.$image_ext; 
    } catch (RuntimeException $e) {
        echo $e->getMessage();
        exit();
    } 


    $tags = explode(',', $tags);
    $recipe = new Recipe($title, $description, $ingredients, $preaparation, $preparation_time, $average_cost, $country,
                         $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path, $tags);

    if ($valid)
        $valid = catchAddRecipeFormErrors($recipe);
    else 
        catchAddRecipeFormErrors($recipe);

    if (!$valid) {
        echo 'Invalid form';
        exit();
    }

    try {
        move_uploaded_file($_FILES['recipe-img']['tmp_name'], $target_dir.$image_path);
    } catch (Exception $e) {
        echo 'Unable to download image';
        exit;
    }

    $user = unserialize($_SESSION['user']);
    $recipe->setAuthorID($user->getId());
    insertRecipe($recipe);

    echo 'success';
    exit();
?>  