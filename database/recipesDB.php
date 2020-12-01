<?php
    function fetchRecipe($record) {
        require "connectDB.php";
        require_once "../models/recipe.php";

        $recipe_id = $record['recipeID'];
        $author_id = $record['authorID'];
        $add_date = $record['addDate'];

        $image_path = $record['imagePath'];
        $title = $record['title'];
        $description = $record['description'];

        $ingredients_inline = $record['ingredients'];
        $ingredients_inline = ltrim($ingredients_inline, $ingredients_inline[0]); 
        $ingredients = explode(";", $ingredients_inline);

        $preaparation_inline = $record['preparation'];
        $preaparation_inline = ltrim($preaparation_inline, $preaparation_inline[0]); 
        $preparation = explode(";", $preaparation_inline);

        $preparation_time = $record['preparationTime'];
        $average_cost = $record['averageCost'];
        $country = $record['country'];
        $vegetarian = $record['vegetarian'];
        $difficulty_level = $record['difficultyLevel'];
        $number_of_people = $record['peopleNumber'];
        $kcal_per_person = $record['kcalPerPerson'];
        
        $query = $connection->prepare('SELECT * FROM Tags WHERE recipeID=:recipeID');
        $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
        $query->execute();
        $tags = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $tags[] = $record['name'];
        }

        $recipe = new Recipe($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, $country,
                             $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path, $tags);
        $recipe->setRecipeID($recipe_id);
        $recipe->setAuthorID($author_id);
        $recipe->setaddDate($add_date);

        return $recipe;
    }

    function getDescOrAscQuery($order, $desc, $asc) {
        require "connectDB.php";

        switch ($order) {
            case 'DESC':
                return $connection->prepare($desc); 
            case 'ASC':
                return $connection->prepare($asc); 
            default:
                return null;
        }
    }

    function getRecipesArray($query) {
        $recipes = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $recipes[] = fetchRecipe($record);
        }
        return $recipes;
    }


    function getUserRecipes($userID) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_recipes);
        $query->bindValue(":authorID", $userID, PDO::PARAM_STR);
        $query->execute();

        return getRecipesArray($query);
    }

    function getUserRecipesInOrder($userID, $column, $order) {
        require "sqlQueries.php";

        $query = null;
        
        if ($column == 'add-date') {
            $query = getDescOrAscQuery($order, 
                                        $select_user_recipes_by_add_date_desc,
                                        $select_user_recipes_by_add_date_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'title') {
            $query = getDescOrAscQuery($order, 
                                        $select_user_recipes_by_title_desc,
                                        $select_user_recipes_by_title_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'likes'){
            $query = getDescOrAscQuery($order, 
                                        $select_user_recipes_by_likes_desc,
                                        $select_user_recipes_by_likes_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'saves'){
            $query = getDescOrAscQuery($order, 
                                        $select_user_recipes_by_saves_desc,
                                        $select_user_recipes_by_saves_asc);
            if ($query == null) 
                return array();
        } else {
            return array();
        }
        
        $query->bindValue(":authorID", $userID, PDO::PARAM_INT); 
        $query->execute();
        return getRecipesArray($query);
    }

    function getAllRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_all_recipes);  
        $query->execute();

        return getRecipesArray($query);
    }
    
    function getAllRecipesInOrder($column, $order) {
        require "sqlQueries.php";

        $query = null;
        
        if ($column == 'add-date') {
            $query = getDescOrAscQuery($order, 
                                        $select_all_recipes_by_add_date_desc,
                                        $select_all_recipes_by_add_date_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'title') {
            $query = getDescOrAscQuery($order, 
                                        $select_all_recipes_by_title_desc,
                                        $select_all_recipes_by_title_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'likes'){
            $query = getDescOrAscQuery($order, 
                                        $select_all_recipes_by_likes_desc,
                                        $select_all_recipes_by_likes_asc);
            if ($query == null) 
                return array();
        } else if ($column == 'saves'){
            $query = getDescOrAscQuery($order, 
                                        $select_all_recipes_by_saves_desc,
                                        $select_all_recipes_by_saves_asc);
            if ($query == null) 
                return array();
        } else {
            return array();
        }

        $query->execute();
        return getRecipesArray($query);
    }

    function getTheNewestRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_all_recipes_by_add_date_desc);  
        $query->execute();

        return getRecipesArray($query);
    }

    function getPopularRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_all_recipes_by_likes_desc);  
        $query->execute();

        return getRecipesArray($query);
    }

    function getSavedRecipes($userID) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_saved_recipes);  
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->execute();

        return getRecipesArray($query);
    }

    function getRecipeByID($recipeID) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_recipe_by_id);
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchRecipe($record);
        } else
            return null;
    }

    function getRecipeComments($recipeID) {
        require "connectDB.php";
        require "sqlQueries.php";
        require_once "../models/comment.php";

        $query = $connection->prepare($select_comments_by_recipe_id);
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();
        
        $comments = array();
        for ($i = 0; $i < $query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $commentID = $record['commentID'];
            $recipeID = $record['recipeID'];
            $userID = $record['userID'];
            $addDate = $record['addDate'];
            $content = $record['content'];
    
            $user_query = $connection->prepare($select_user_by_id);
            $user_query->bindValue(":id", $userID, PDO::PARAM_STR);
            $user_query->execute();

            $user_record = $user_query->fetch();
            $fullname = $user_record['fullname'];

            $comments[] = new Comment($commentID, $recipeID, $userID, $fullname, $addDate, $content);
        }

        return $comments;
    }
?>