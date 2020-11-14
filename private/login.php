<?php
    session_start();
    require_once "user.php";

    $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    $user = new User('', $username, '');
    $valid = true;

    require_once "connectdb.php";

    $_SESSION['username'] = $username;
    if (!$user->isInDatabaseUsername($connection) || !$user->isValidLogin($connection, $password)) {
        $valid = false;
        $_SESSION['e_login'] = "Invalid username or password";
    }

    if ($valid) {
        unset($_SESSION['password']);
        $_SESSION['logged'] = true;
        header('Location: ../public/newestView.php');
        exit();
    } else {
        header('Location: ../public/loginView.php');
        exit();
    }
?>