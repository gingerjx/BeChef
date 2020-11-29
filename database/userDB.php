<?php
    function getUserByUsername($username) {
        require "connectDB.php";

        $query = $connection->prepare($select_user_by_username);
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
        require "connectDB.php";

        $query = $connection->prepare($select_user_by_id);
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