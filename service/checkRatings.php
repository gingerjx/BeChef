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

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'like') {
            if (isLikedByUser($recipe_id, $user_id)) {
                dislikeRecipe($recipe_id, $user_id);
                echo 'unliked';
            }
            else {
                likeRecipe($recipe_id, $user_id);
                echo 'liked';
            }
        } else if ($_POST['action'] == 'save') {
            if (isSavedByUser($recipe_id, $user_id)) {
                unsaveRecipe($recipe_id, $user_id);
                echo 'unsaved';
            }
            else {
                saveRecipe($recipe_id, $user_id);
                echo 'saved';
            }
        }
    }

    exit();
?>