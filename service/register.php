<?php
    session_start();
    require_once "../models/user.php";
    require_once "../database/connectDB.php";
    require_once "../database/insertDB.php";
    require_once "../database/usersDB.php";

    $fullname = htmlentities($_POST['fullname'], ENT_QUOTES, "UTF-8");
    $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
    $pass_repeat = htmlentities($_POST['pass-repeat'], ENT_QUOTES, "UTF-8");

    $user = new User();
    $user->setUsername($username);
    $user->setFullname($fullname);
    $user->setEmail($email);
    $valid = true;
    $exists = false;

    $_SESSION['fullname'] = $fullname;
    if (!$user->isValidFullname()) {
        $valid = false;
        $_SESSION['e_fullname'] = "Only characters and whitespaces. Range: (5, 100)";
    }

    $_SESSION['username'] = $username;
    if (!$user->isValidUsername()) {
        $valid = false;
        $_SESSION['e_username'] = "Only characters and numbers. Range: (5, 50)";
    }
    
    $_SESSION['email'] = $email;
    if (!$user->isValidEmail()) {
        $valid = false;
        $_SESSION['e_email'] = "Invalid email";
    }

    if (!$user->isValidPassword($password)) {
        $valid = false;
        $_SESSION['e_password'] = "Range: (5, 50)";
    }

    if (strcmp($password, $pass_repeat)) {
        $valid = false;
        $_SESSION['e_pass_repeat'] = "Passwords do not match";
    }
    
    if (isInDatabaseUsername($username)) {
        $_SESSION['e_username'] = "Username already exists";
        $exists = true;
    }

    if (isInDatabaseEmail($email)) {
        $_SESSION['e_email'] = "Email already used";
        $exists = true;
    } 

    if ($valid && !$exists) {
        insertUser($user, $password);
        $user = getUserByUsername($username);
        
        unset($_SESSION['password']);
        unset($_SESSION['username']);
        unset($_SESSION['fullname']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['pass-repeat']);

        $_SESSION['logged'] = true;
        $_SESSION['user'] = serialize($user);

        header('Location: ../view/newestView.php');
        exit();
    } else {
        header('Location: ../view/registerView.php');
        exit();
    }
?>