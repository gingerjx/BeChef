<?php

    function insertComment($recipeID, $userID, $content) {
        require "connectDB.php";

        try {
            $query = $connection->prepare('INSERT INTO Comments VALUES (NULL, :recipeID, :userID, now(), :content)');
            $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
            $query->bindValue(":userID", $userID, PDO::PARAM_STR);
            $query->bindValue(":content", $content, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function insertUser($user, $password) {
        require "connectDB.php";

        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = $connection->prepare('INSERT INTO Users VALUES (NULL, now(), :fullname, :email, :username, :pass, 3)');
            $query->bindValue(":fullname", $user->getFullname(), PDO::PARAM_STR);
            $query->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
            $query->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
            $query->bindValue(":pass", $hashed_password, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function insertRecipe($recipe) {
        require "connectDB.php";

        try {
            $recipe->setAddDate(new DateTime());
            $inline_ingredients = "";
            foreach ($recipe->getIngredients() as $ing)
                $inline_ingredients = $inline_ingredients.';'.$ing;

            $inline_preparation = "";
            foreach ($recipe->getPreparation() as $prep)
                $inline_preparation = $inline_preparation.';'.$prep;

            $query = $connection->prepare('INSERT INTO Recipes VALUES 
                                        (NULL, :author, now(), :imgPath, :title, :descr, :ingredients,
                                        :preparation, :preparationTime, :averageCost, :country, :vegetarian,
                                        :diffLevel, :pplNumber, :kcalPerPerson)');
            $query->bindValue(":author", $recipe->getAuthorID(), PDO::PARAM_STR);
            $query->bindValue(":imgPath", $recipe->getImagePath(), PDO::PARAM_STR);
            $query->bindValue(":title", $recipe->getTitle(), PDO::PARAM_STR);
            $query->bindValue(":descr", $recipe->getDescription(), PDO::PARAM_STR);
            $query->bindValue(":ingredients", $inline_ingredients, PDO::PARAM_STR);
            $query->bindValue(":preparation", $inline_preparation, PDO::PARAM_STR);
            $query->bindValue(":preparationTime", $recipe->getPreparationTime(), PDO::PARAM_STR);
            $query->bindValue(":averageCost", $recipe->getAverageCost(), PDO::PARAM_STR);
            $query->bindValue(":country", $recipe->getCountry(), PDO::PARAM_STR);
            $query->bindValue(":vegetarian", $recipe->getVegetarian() ? '1' : '0', PDO::PARAM_STR);
            $query->bindValue(":diffLevel", $recipe->getDifficultyLevel(), PDO::PARAM_STR);
            $query->bindValue(":pplNumber", $recipe->getPeopleNumber(), PDO::PARAM_STR);
            $query->bindValue(":kcalPerPerson", $recipe->getKcalPerPerson(), PDO::PARAM_STR);

            $query->execute();

            $recipe->setRecipeID($connection->lastInsertId());
            insertTags($recipe->getTags(), $recipe->getRecipeID());
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function insertTags($tags, $recipeID) {
        require "connectDB.php";

        try {
            foreach ($tags as $tag) {
                $query = $connection->prepare('INSERT INTO Tags VALUES (NULL, :recipeID, :name)');
                $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
                $query->bindValue(":name", $tag, PDO::PARAM_STR);

                $query->execute();
            }
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function likeRecipe($recipe_id, $user_id) {
        require "connectDB.php";

        try {
            $query = $connection->prepare('INSERT INTO Likes VALUES (NULL, :recipeID, :userID)');
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->bindValue(":userID", $user_id, PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function saveRecipe($recipe_id, $user_id) {
        require "connectDB.php";

        try {
            $query = $connection->prepare('INSERT INTO Saves VALUES (NULL, :recipeID, :userID)');
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->bindValue(":userID", $user_id, PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function dislikeRecipe($recipe_id, $user_id) {
        require "connectDB.php";

        try {
            $query = $connection->prepare('DELETE FROM Likes WHERE recipeID=:recipeID AND userID=:userID');
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->bindValue(":userID", $user_id, PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }

    function unsaveRecipe($recipe_id, $user_id) {
        require "connectDB.php";

        try {
            $query = $connection->prepare('DELETE FROM Saves WHERE recipeID=:recipeID AND userID=:userID');
            $query->bindValue(":recipeID", $recipe_id, PDO::PARAM_STR);
            $query->bindValue(":userID", $user_id, PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            header("Location: ../view/errorView.php");
            exit();
        }
    }
?>