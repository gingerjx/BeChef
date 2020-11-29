<?php

    function insertComment($recipeID, $userID, $content) {
        require "connectDB.php";

        $query = $connection->prepare('INSERT INTO Comments VALUES (NULL, :recipeID, :userID, now(), :content)');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->execute();
    }

    function insertUser($user, $password) {
        require "connectDB.php";

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = $connection->prepare('INSERT INTO Users VALUES (NULL, now(), :fullname, :email, :username, :pass, 3)');
        $query->bindValue(":fullname", $user->getFullname(), PDO::PARAM_STR);
        $query->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
        $query->bindValue(":pass", $hashed_password, PDO::PARAM_STR);
        $query->execute();
    }
?>