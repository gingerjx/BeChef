<?php
    session_start();
    require_once "../models/user.php";
    require_once "../database/connectDB.php";
    require_once "../database/usersDB.php";

    $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    $user = new User();
    $user->setUsername($username);
    $valid = true;

    $_SESSION['username'] = $username;
    if (!isInDatabaseUsername($username) || !$user->isValidLogin($connection, $password)) {
        $valid = false;
        $_SESSION['e_login'] = "Invalid username or password";
    }

    if ($valid) {
        $user = getUserByUsername($username);

        unset($_SESSION['password']);
        unset($_SESSION['username']);

        $_SESSION['logged'] = true;
        $_SESSION['user'] = serialize($user);
        
        header('Location: ../index.php');
        exit();
    } else {
        header('Location: ../login.php');
        exit();
    }
?>