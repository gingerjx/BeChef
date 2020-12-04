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
        
        try {
            $query = $connection->prepare('SELECT * FROM Tags WHERE recipeID=:recipeID');
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->execute();
            $tags = array();
            for ($i=0; $i<$query->rowCount(); $i += 1) {
                $record = $query->fetch();
                $tags[] = $record['name'];
            }
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
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

        try {
            switch ($order) {
                case 'DESC':
                    return $connection->prepare($desc); 
                case 'ASC':
                    return $connection->prepare($asc); 
                default:
                    return null;
            }
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
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

    function getUserRecipes($user_id) {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_user_recipes);
            $query->bindValue(":authorID", $user_id, PDO::PARAM_STR);
            $query->execute();

            return getRecipesArray($query);
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function getUserRecipesInOrder($user_id, $column, $order) {
        require "sqlQueries.php";

        $query = null;
        
        switch ($column) {
            case 'add-date':             
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_add_date_desc,
                $select_user_recipes_by_add_date_asc);
                break;
            case 'title':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_title_desc,
                $select_user_recipes_by_title_asc);
                break;
            case 'likes':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_likes_desc,
                $select_user_recipes_by_likes_asc);
                break;
            case 'saves':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_saves_desc,
                $select_user_recipes_by_saves_asc);
                break;
            case 'cost':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_cost_desc,
                $select_user_recipes_by_cost_asc);
                break;
            case 'difficulty':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_difficulty_desc,
                $select_user_recipes_by_difficulty_asc);
                break;
             case 'people':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_people_desc,
                $select_user_recipes_by_people_asc);
                break;
            case 'kcal':
                $query = getDescOrAscQuery($order, 
                $select_user_recipes_by_kcal_desc,
                $select_user_recipes_by_kcal_asc);
                break;
            default:
                return array();
        }
        if ($query == null)
            return array();
        
        $query->bindValue(":authorID", $user_id, PDO::PARAM_INT); 
        $query->execute();
        return getRecipesArray($query);
    }

    function getAllRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_all_recipes);  
            $query->execute();

            return getRecipesArray($query);
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }
    
    function getAllRecipesInOrder($column, $order) {
        require "sqlQueries.php";

        $query = null;
        
        switch ($column) {
            case 'add-date':             
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_add_date_desc,
                $select_all_recipes_by_add_date_asc);
                break;
            case 'title':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_title_desc,
                $select_all_recipes_by_title_asc);
                break;
            case 'likes':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_likes_desc,
                $select_all_recipes_by_likes_asc);
                break;
            case 'saves':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_saves_desc,
                $select_all_recipes_by_saves_asc);
                break;
            case 'cost':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_cost_desc,
                $select_all_recipes_by_cost_asc);
                break;
            case 'difficulty':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_difficulty_desc,
                $select_all_recipes_by_difficulty_asc);
                break;
            case 'people':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_people_desc,
                $select_all_recipes_by_people_asc);
                break;
            case 'kcal':
                $query = getDescOrAscQuery($order, 
                $select_all_recipes_by_kcal_desc,
                $select_all_recipes_by_kcal_asc);
                break;
            default:
                return array();
        }
        if ($query == null)
            return array();

        $query->execute();
        return getRecipesArray($query);
    }

    function getTheNewestRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_all_recipes_by_add_date_desc);  
            $query->execute();

            return getRecipesArray($query);
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function getPopularRecipes() {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_all_recipes_by_likes_desc);  
            $query->execute();

            return getRecipesArray($query);
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function getSavedRecipes($user_id) {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_user_saved_recipes);  
            $query->bindValue(":userID", $user_id, PDO::PARAM_STR);
            $query->execute();

            return getRecipesArray($query);
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function getRecipeByID($recipe_id) {
        require "connectDB.php";
        require "sqlQueries.php";

        try {
            $query = $connection->prepare($select_recipe_by_id);
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $record = $query->fetch();
                return fetchRecipe($record);
            } else
                return null;
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function getRecipeComments($recipe_id) {
        require "connectDB.php";
        require "sqlQueries.php";
        require_once "../models/comment.php";

        try {
            $query = $connection->prepare($select_comments_by_recipe_id);
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->execute();
            
            $comments = array();
            for ($i = 0; $i < $query->rowCount(); $i += 1) {
                $record = $query->fetch();
                $comment_id = $record['commentID'];
                $recipe_id = $record['recipeID'];
                $user_id = $record['userID'];
                $add_date = $record['addDate'];
                $content = $record['content'];
        
                $user_query = $connection->prepare($select_user_by_id);
                $user_query->bindValue(":id", $user_id, PDO::PARAM_STR);
                $user_query->execute();

                $user_record = $user_query->fetch();
                $fullname = $user_record['fullname'];

                $comments[] = new Comment($comment_id, $recipe_id, $user_id, $fullname, $add_date, $content);
            }

            return $comments;
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }
?>