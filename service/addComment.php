<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/models/user.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/database/insertDB.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/database/recipesDB.php");

    if (!isset($_SESSION['logged'])) {
        header('Location: '.$_SERVER['DOCUMENT_ROOT'].'login.php');
        echo 'unlogged';
        exit();
    }

    if (!isset($_POST['content']) || empty($_POST['content'])) {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        echo 'fail';
        exit();
    }
      
    $url_components = parse_url($_SERVER['HTTP_REFERER']); 
    parse_str($url_components['query'], $params); 
    $recipeID = $params['recipeID'];
    $user = unserialize($_SESSION['user']);
    $content = htmlentities($_POST['content']);

    insertComment($recipeID, $user->getID(), $content);

    $comments = getRecipeComments($recipeID);
    $added_comment = end($comments);
    $to_json = array("fullname"=>$added_comment->getFullname(), 
                    "addDate"=>$added_comment->getAddDate(), 
                    "content"=>$added_comment->getContent());
    $encoded = json_encode($to_json);
    echo $encoded;
    exit();
?>