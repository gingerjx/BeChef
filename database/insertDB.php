<?php

    function insertComment($recipeID, $userID, $content) {
        require "connectDB.php";
        $query = $connection->prepare('INSERT INTO Comments VALUES (NULL, :recipeID, :userID, now(), :content)');
        $query->bindValue(":recipeID", $recipeID, PDO::PARAM_STR);
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->execute();
    }
?>