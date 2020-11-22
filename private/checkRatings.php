<?php
    require_once "dbQueries.php";
    require_once "connectdb.php";
    require_once "user.php";

    session_start();
    
    $url_components = parse_url($_SERVER['HTTP_REFERER']); 
    parse_str($url_components['query'], $params); 
    $recipeID = $params['recipeID'];
    $user = unserialize($_SESSION['user']);
    $userID = $user->getID();

    if (isset($_POST['like'])) {
        if (userLikedIt($recipeID, $userID)) {
            $query = $connection->prepare('DELETE FROM Likes WHERE recipeID=:recipeID AND userID=:userID');
            $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->execute();
        } else {
            $query = $connection->prepare('INSERT INTO Likes VALUES (NULL, :recipe, :userID)');
            $query->bindValue(":recipe", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->execute();
        }
    } else if (isset($_POST['save'])) {
        if (userSavedIt($recipeID, $userID)) {
            $query = $connection->prepare('DELETE FROM Saves WHERE recipeID=:recipeID AND userID=:userID');
            $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->execute();
        } else {
            $query = $connection->prepare('INSERT INTO Saves VALUES (NULL, :recipe, :userID)');
            $query->bindValue(":recipe", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->execute();
        }
    } else if (isset($_POST['comment'])) {
        // TODO
    }

    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit();
?>