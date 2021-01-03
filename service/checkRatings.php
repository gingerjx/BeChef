<?php
    session_start();

    if (!isset($_SESSION['logged'])) {
        header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/login.php');
        exit();
    }

    require_once $_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/database/insertDB.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/database/checkDB.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/models/user.php";

    $url_components = parse_url($_SERVER['HTTP_REFERER']); 
    parse_str($url_components['query'], $params); 
    $recipe_id = $params['recipeID'];
    $user = unserialize($_SESSION['user']);
    $user_id = $user->getID();

    if (isset($_POST['like'])) {
        if (isLikedByUser($recipe_id, $user_id)) 
            dislikeRecipe($recipe_id, $user_id);
        else
            likeRecipe($recipe_id, $user_id);
    } else if (isset($_POST['save'])) {
        if (isSavedByUser($recipe_id, $user_id))
            unsaveRecipe($recipe_id, $user_id);
        else
            saveRecipe($recipe_id, $user_id);
    }

    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit();
?>