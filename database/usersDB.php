<?php
    function fetchUser($record) {
        require_once "../models/user.php";

        $id = $record['id'];
        $fullname = $record['fullname'];
        $username = $record['username'];
        $email = $record['email'];
        $join_date = new DateTime($record['joinDate']);
        $role = $record['roleID'];

        $user = new User();
        $user->setUsername($username);
        $user->setID($id);
        $user->setFullName($fullname);
        $user->setEmail($email);
        $user->setJoinDate($join_date);
        $user->setRole($role);
        
        return $user;
    }

    function getUserByUsername($username) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_by_username);
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchUser($record);
        } else
            return null;
    }

    function getUserByID($id) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_by_id);
        $query->bindValue(":id", $id, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $record = $query->fetch();
            return fetchUser($record);
        } else
            return null;
    }

    function isInDatabaseUsername($username) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_by_username);
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }

    function isInDatabaseEmail($email) {
        require "connectDB.php";
        require "sqlQueries.php";

        $query = $connection->prepare($select_user_by_email);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }
?>