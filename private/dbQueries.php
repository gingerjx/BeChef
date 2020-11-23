<?php

    function fetchRecipe($record) {
        $recipeId = $record['recipeID'];
        $authorId = $record['authorID'];
        $addDate = $record['addDate'];

        $image_path = $record['imagePath'];
        $title = $record['title'];
        $description = $record['description'];

        $ingredientsInline = $record['ingredients'];
        $ingredientsInline = ltrim($ingredientsInline, $ingredientsInline[0]); 
        $ingredients = explode(";", $ingredientsInline);

        $preaparationInline = $record['preparation'];
        $preaparationInline = ltrim($preaparationInline, $preaparationInline[0]); 
        $preparation = explode(";", $preaparationInline);

        $preparation_time = $record['preparationTime'];
        $average_cost = $record['averageCost'];
        $country = $record['country'];
        $vegetarian = $record['vegetarian'];
        $difficulty_level = $record['difficultyLevel'];
        $number_of_people = $record['peopleNumber'];
        $kcal_per_person = $record['kcalPerPerson'];

        include "connectdb.php";
        require_once "recipe.php";
        
        $query = $connection->prepare('SELECT * FROM Tags WHERE recipeID=:recipeID');
        $query->bindValue(":recipeID", $recipeId, PDO::PARAM_STR);
        $query->execute();
        $tags = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $tags[] = $record['name'];
        }

        $recipe = new Recipe($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, $country,
                             $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path, $tags);
        $recipe->setRecipeID($recipeId);
        $recipe->setAuthorID($authorId);
        $recipe->setaddDate($addDate);

        return $recipe;
    }

    function getUserRecipes($userID) {
        include "connectdb.php";
        
        $query = $connection->prepare('SELECT * FROM Recipes WHERE authorID=:authorID');
        $query->bindValue(":authorID", $userID, PDO::PARAM_STR);
        $query->execute();

        $recipes = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $recipes[] = fetchRecipe($record);
        }

        return $recipes;
    }

    function getUserRecipesInOrder($userID, $column, $order) {
        include "connectdb.php";
        
        $query = null;
        
        if ($column == 'add-date') {
            $query = $connection->prepare('SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY addDate '.$order);  
            $query->bindValue(":authorID", $userID, PDO::PARAM_INT); 
        } else if ($column == 'title') {
            $query = $connection->prepare('SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY title '.$order); 
            $query->bindValue(":authorID", $userID, PDO::PARAM_INT);
        } else if ($column == 'likes'){
            $query = $connection->prepare('SELECT rec.* 
                                            FROM (SELECT Recipes.*, COUNT(Likes.likeID) AS recipe_count 
                                                    FROM Recipes 
                                                    LEFT JOIN Likes ON Recipes.recipeID = Likes.recipeID
                                                    GROUP BY Recipes.recipeID 
                                                    ORDER BY recipe_count '.$order.') AS rec
                                            WHERE rec.authorID='.$userID); //binding is not workin ;x
        } else if ($column == 'saves'){
            $query = $connection->prepare('SELECT rec.* 
                                            FROM (SELECT Recipes.*, COUNT(Saves.savedID) AS recipe_count 
                                                    FROM Recipes 
                                                    LEFT JOIN Saves ON Recipes.recipeID = Saves.recipeID
                                                    GROUP BY Recipes.recipeID 
                                                    ORDER BY recipe_count '.$order.') AS rec
                                            WHERE rec.authorID='.$userID); //binding is not workin ;x
        } else {
            return array();
        }

        $query->execute();

        $recipes = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $recipes[] = fetchRecipe($record);
        }

        return $recipes;
    }

    function getNewestRecipes() {
        include "connectdb.php";

        $query = $connection->prepare('SELECT * 
                                        FROM Recipes 
                                        ORDER BY addDate DESC');  
        $query->execute();

        $recipes = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();
            $recipes[] = fetchRecipe($record);
        }

        return $recipes;
    }

    function getRecipeByID($recipeID) {
        include "connectdb.php";
        
        $query = $connection->prepare('SELECT * FROM Recipes WHERE recipeID=:recipeID');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchRecipe($record);
        } else {
            return null;
        }
    }

    function fetchUser($record) {
        $id = $record['id'];
        $fullname = $record['fullname'];
        $username = $record['username'];
        $email = $record['email'];
        $joinDate = new DateTime($record['joinDate']);
        $role = $record['roleID'];

        $user = new User($username);
        $user->setID($id);
        $user->setFullName($fullname);
        $user->setEmail($email);
        $user->setJoinDate($joinDate);
        $user->setRole($role);
        
        return $user;
    }

    function getUserByUsername($username) {
        include "connectdb.php";

        $query = $connection->prepare('SELECT * FROM Users WHERE username=:username');
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchUser($record);
        } else {
            return null;
        }
    }

    function getUserByID($id) {
        include "connectdb.php";

        $query = $connection->prepare('SELECT * FROM Users WHERE id=:id');
        $query->bindValue(":id", $id, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchUser($record);
        } else {
            return null;
        }
    }

    function getNumberOf($tableName, $recipeID) {
        include "connectdb.php";
        
        $query = $connection->prepare('SELECT * FROM '.$tableName.' WHERE recipeID=:recipeID');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();

        return $query->rowCount();
    }

    function getNumberOfSaves($recipeID) {
        return getNumberOf('Saves', $recipeID);
    }

    function getNumberOfLikes($recipeID) {
        return getNumberOf('Likes', $recipeID);
    }

    function getNumberOfComments($recipeID) {
        return getNumberOf('Comments', $recipeID);
    }

    function userReactOnIt($tablename, $recipeID, $userID) {
        include "connectdb.php";
        
        $query = $connection->prepare('SELECT * FROM '.$tablename.' WHERE recipeID=:recipeID AND userID=:userID');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    function userLikedIt($recipeID, $userID) {
        return userReactOnIt('Likes', $recipeID, $userID);
    }

    function userSavedIt($recipeID, $userID) {
        return userReactOnIt('Saves', $recipeID, $userID);
    }

    function getRecipeComments($recipeID) {
        include "connectdb.php";
        require_once "comment.php";

        $query = $connection->prepare('SELECT * FROM Comments WHERE recipeID=:recipeID');
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
    
            $user_query = $connection->prepare('SELECT * FROM Users WHERE id=:userID');
            $user_query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $user_query->execute();

            $user_record = $user_query->fetch();
            $fullname = $user_record['fullname'];

            $comments[] = new Comment($commentID, $recipeID, $userID, $fullname, $addDate, $content);
        }

        return $comments;
    }

    function insertComment($recipeID, $userID, $content) {
        include "connectdb.php";
        $query = $connection->prepare('INSERT INTO Comments VALUES (NULL, :recipeID, :userID, now(), :content)');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->execute();
    }
?>