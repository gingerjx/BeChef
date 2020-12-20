<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $result = array();

        if (!$user->isValidFullname() || 
            !$user->isValidUsername() ||
            !$user->isValidEmail() || 
            !$user->isValidPassword($password) ||
            strcmp($password, $pass_repeat)) {
                $valid = false;
        }
        
        if (isInDatabaseUsername($username)) {
            $result[] = true;
            $exists = true;
        } else 
            $result[]  = false;

        if (isInDatabaseEmail($email)) {
            $result[] = true;
            $exists = true;
        } else
            $result[] = false;

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
        } 

        echo json_encode($result);
        exit();
    }
?>