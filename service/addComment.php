<?php
    if (isset($_POST['login'])) {
        header('Location: ../view/loginView.php');
        exit();
    }

    if (!isset($_POST['content']) || empty($_POST['content'])) {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }

    if (isset($_POST['comment'])) {
        session_start();
        require_once "../models/user.php";
        require_once "../database/insertDB.php";
        
        $url_components = parse_url($_SERVER['HTTP_REFERER']); 
        parse_str($url_components['query'], $params); 
        $recipeID = $params['recipeID'];
        $user = unserialize($_SESSION['user']);
        $content = htmlentities($_POST['content']);

        insertComment($recipeID, $user->getID(), $content);

    }

    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit();
?>