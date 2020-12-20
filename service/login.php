<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        require_once "../models/user.php";
        require_once "../database/connectDB.php";
        require_once "../database/usersDB.php";

        $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

        $user = new User();
        $user->setUsername($username);

        if (isInDatabaseUsername($username) && $user->isValidLogin($connection, $password)) {
            $user = getUserByUsername($username);
            unset($_SESSION['password']);
            unset($_SESSION['username']);
            $_SESSION['logged'] = true;
            $_SESSION['user'] = serialize($user);
        
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
?>