<?php

    function getUserRecipes($userID) {
        include "connectdb.php";
        require_once "recipe.php";
        
        $query = $connection->prepare('SELECT * FROM Recipes WHERE authorID=:authorID');
        $query->bindValue(":authorID", $userID, PDO::PARAM_STR);
        $query->execute();

        $recipes = array();
        for ($i=0; $i<$query->rowCount(); $i += 1) {
            $record = $query->fetch();

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

            $recipe = new Recipe($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, $country,
                                 $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path, array("a", "a"));
            $recipe->setRecipeID($recipeId);
            $recipe->setAuthorID($authorId);
            $recipe->setaddDate($addDate);

            $recipes[] = $recipe;
        }

        return $recipes;
    }

    function getRecipeByID($recipeID) {
        include "connectdb.php";
        require_once "recipe.php";
        
        $query = $connection->prepare('SELECT * FROM Recipes WHERE recipeID=:recipeID');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();

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

            $recipe = new Recipe($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, $country,
                                 $vegetarian, $difficulty_level, $number_of_people, $kcal_per_person, $image_path, array("a", "a"));
            $recipe->setRecipeID($recipeId);
            $recipe->setAuthorID($authorId);
            $recipe->setaddDate($addDate);

            return $recipe;
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
        require_once "user.php";

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
        require_once "user.php";

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
?>