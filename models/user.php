<?php 
    class User {
        private $id;
        private $fullname;
        private $username;
        private $email;
        private $join_date;
        private $role;

/* Validation */
        function isValidFullname() { 
            if (strlen($this->fullname) < 5 || strlen($this->fullname) > 100)
                return false;
            else if (ctype_alpha(str_replace(' ', '', $this->fullname)) == false) 
                return false;
            else
                return true;
        }

        function isValidUsername() {
            if (strlen($this->username) < 5 || strlen($this->username) > 50)
                return false;
            else if (!ctype_alnum($this->username))
                return false;
            else
                return true;
        }

        function isValidEmail() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return false;
            return true;
        }
        
        function isValidPassword($password) {
            if (strlen($password) < 5 || strlen($password) > 50)
                return false;
            return true;
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

/* Getters */
        function getID() {
            return $this->id;
        }

        function getFullname() {
            return $this->fullname;
        }

        function getUsername() {
            return $this->username;
        }

        function getEmail() {
            return $this->email;
        }

        function getJoinDate() {
            return $this->join_date;
        }

        function getRole() {
            return $this->role;
        }
        
/* Setters */
        function setID($id) {
            $this->id = $id;
        }

        function setFullname($fullname) {
            $this->fullname = $fullname;
        }
        
        function setUsername($username) {
            $this->username = $username;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setJoinDate($join_date) {
            $this->join_date = $join_date;
        }

        function setRole($role) {
            $this->role = $role;
        }

    }
?>