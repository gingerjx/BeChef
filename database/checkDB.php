<?php
    function userReactedOnIt($select_query, $recipeID, $userID) {
        require "connectDB.php";
        
        try {
            $query = $connection->prepare($select_query);
            $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->execute();
            return $query->rowCount() > 0 ? true : false;
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function isLikedByUser($recipeID, $userID) {
        require "sqlQueries.php";
        return userReactedOnIt($is_liked_by_user, $recipeID, $userID);
    }

    function isSavedByUser($recipeID, $userID) {
        require "sqlQueries.php";
        return userReactedOnIt($is_saved_by_user, $recipeID, $userID);
    }
?>