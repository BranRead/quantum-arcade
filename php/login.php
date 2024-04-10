<?php
    require_once 'crud.php';
    require_once 'config.php';
    class login
    {
        public function logUserIn()
        {
            $conn = (new config)->getDBConnection();
            $crud = new crud;

            $sql = sprintf("SELECT * FROM useraccounts WHERE email = '%s'", $conn->real_escape_string($_POST["email"]));
            $result = $crud->read($sql);
            $user = $result->fetch_assoc();
            if ($user) {
                if (password_verify($_POST["password"], $user["passHash"])) {
                    session_regenerate_id(true);
                    session_start();
                    $_SESSION["sessionID"] = $crud->createSessionID();
                    $_SESSION["userName"] = $user["username"];
                    $_SESSION["userID"] = $user["user_id"];
                }
                return true;
            }
            return false;
        }
    }
