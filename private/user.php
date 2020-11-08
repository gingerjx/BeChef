<?php 
    class User {
        public $fullname;
        public $username;
        public $email;
        public $password;
        public $joinDate;
        public $role;

        function __construct ($fullname, $username, $email) {
            $this->fullname = $fullname;
            $this->username = $username;
            $this->email = $email;
        }

        function isValidFullname() { 
            if (strlen($this->fullname) < 5 || strlen($this->fullname) > 100) {
                return false;
            }
            else if (ctype_alpha(str_replace(' ', '', $this->fullname)) == false) {
                return false;
            }

            return true;
        }

        function isValidUsername() {
            if (strlen($this->username) < 5 || strlen($this->username) > 50) {
                return false;
            }
            else if (ctype_alnum($this->username) == false) {
                return false;
            }

            return true;
        }

        function isValidEmail() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            return true;
        }
        
        function isValidPassword($password) {
            if (strlen($password) < 5 || strlen($password) > 50) {
                return false;
            }

            return true;
        }

        function isInDatabaseUsername($connection) {
            $query = $connection->prepare('SELECT * FROM Users WHERE username=:username');
            $query->bindValue(":username", $this->username, PDO::PARAM_STR);
            $query->execute();

            return $query->rowCount() > 0;
        }

        function isInDatabaseEmail($connection) {
            $query = $connection->prepare('SELECT * FROM Users WHERE email=:email');
            $query->bindValue(":email", $this->email, PDO::PARAM_STR);
            $query->execute();

            return $query->rowCount() > 0;
        }

        function insertUser($connection, $password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = $connection->prepare('INSERT INTO Users VALUES (NULL, now(), :fullname, :email, :username, :pass, 3)');
            $query->bindValue(":fullname", $this->fullname, PDO::PARAM_STR);
            $query->bindValue(":email", $this->email, PDO::PARAM_STR);
            $query->bindValue(":username", $this->username, PDO::PARAM_STR);
            $query->bindValue(":pass", $hashed_password, PDO::PARAM_STR);
            $query->execute();
        }

        function isValidLogin($connection, $password) {
            $query = $connection->prepare('SELECT * FROM Users WHERE username=:username');
            $query->bindValue(":username", $this->username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $record = $query->fetch();
                return password_verify($password, $record['password']);
            }

            return false;
        }

        function fetchUser($connection) {
            /* not tested yet */
            $query = $connection->prepare('SELECT * FROM Users WHERE username=:username');
            $query->bindValue(":username", $this->username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $record = $query->fetch();
                $fullname = $record['fullname'];
                $email = $record['email'];;
                $joinDate = new DateTime($record['joinDate']);
                $role = $record['role'];
            }
        }
    }
?>