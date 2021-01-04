<?php
    function getNumberOf($select_query, $recipeID) {
        require($_SERVER['DOCUMENT_ROOT']."/database/connectDB.php");
        
        try {
            $query = $connection->prepare($select_query);
            $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
            $query->execute();

            return $query->rowCount();
        } catch (PDOException $e) {
            header("Location: ".$_SERVER['DOCUMENT_ROOT']."error.php");
            exit();
        }
    }

    function getNumberOfRecipeLikes($recipeID) {
        require($_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php");
        return getNumberOf($select_recipe_likes_number, $recipeID);
    }
    
    function getNumberOfRecipeSaves($recipeID) {
        require($_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php");
        return getNumberOf($select_recipe_saves_number, $recipeID);
    }

    function getNumberOfRecipeComments($recipeID) {
        require($_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php");
        return getNumberOf($select_recipe_comments_number, $recipeID);
    }

    function getNumberOfRecipes() {
        require($_SERVER['DOCUMENT_ROOT']."/database/connectDB.php");
        require($_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php");

        $query = $connection->prepare($select_recipes_number);
        $query->execute();
        return $query->fetch()[0];
    }

    function getNumberOfUsers() {
        require($_SERVER['DOCUMENT_ROOT']."/database/connectDB.php");
        require($_SERVER['DOCUMENT_ROOT']."/database/sqlQueries.php");

        $query = $connection->prepare($select_users_number);
        $query->execute();
        return $query->fetch()[0];
    }
?>