<?php
    function getNumberOf($select_query, $recipeID) {
        require "connectDB.php";
        
        $query = $connection->prepare($select_query);
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();

        return $query->rowCount();
    }

    function getNumberOfRecipeLikes($recipeID) {
        require "sqlQueries.php";
        return getNumberOf($select_recipe_likes_number, $recipeID);
    }
    
    function getNumberOfRecipeSaves($recipeID) {
        require "sqlQueries.php";
        return getNumberOf($select_recipe_saves_number, $recipeID);
    }

    function getNumberOfRecipeComments($recipeID) {
        require "sqlQueries.php";
        return getNumberOf($select_recipe_comments_number, $recipeID);
    }
?>