<?php

require_once 'config.php';
class crud {
    public function createUser($username, $email, $passHash) {
        try {
            $conn = (new config)->getDBConnection();

            $sql = "INSERT INTO useraccounts (username, email, passHash) VALUES (?, ?, ?)";

            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {

                die("err: " . $conn->error);
            }

            $stmt->bind_param("sss", $username, $email, $passHash);

            if ($stmt->execute()) {
                header("location: ../play.php");
                exit;
            } else {
                if ($conn->errno === 1062) {
                    die("Email already used.");
                } else {
                    echo $stmt;
                    die("err: " . $conn->errno);
                }
            }
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }
    }

    public function read($sql_query) {
        try {
            $conn = (new config)->getDBConnection();
            return $conn->query($sql_query);
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }

    }

    public function update() {
        $conn = (new config)->getDBConnection();

        $sql = "UPDATE useraccounts SET username = ?, email = ?, passHash = ? WHERE user_id = ?";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("err: " . $conn->error);
        }
        if ($stmt->execute()) {
            header("location: update-success.html");
            exit;
        } else {
            die("err: " . $conn->errno);
        }
    }

    public function updateUsername($username, $userID, $location) {
        $conn = (new config)->getDBConnection();

        $sql = "UPDATE useraccounts SET username = ? WHERE user_id = ?";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("err: " . $conn->error);
        }
        $stmt->bind_param("ss", $username, $userID);
        if ($stmt->execute()) {
            $_SESSION["userName"] = $username;
            header("location: ../" . $location);
            exit;
        } else {
            die("err: " . $conn->errno);
        }
    }

    public function updatePassword($password, $userID, $location) {

        $conn = (new config)->getDBConnection();

        $sql = "UPDATE useraccounts SET passHash = ? WHERE user_id = ?";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("err: " . $conn->error);
        }
        $stmt->bind_param("ss", $password, $userID);
        if ($stmt->execute()) {
            header("location: ../" . $location);
            exit;
        } else {
            die("err: " . $conn->errno);
        }
    }

    public function readPassword($userID) {

        $conn = (new config)->getDBConnection();
        $crud = new crud;

        $sql = sprintf("SELECT * FROM useraccounts WHERE user_id = '%s'", $conn->real_escape_string($userID));
        $result = $crud->read($sql);
        $user = $result->fetch_assoc();
        if ($user) {
            return $user["passHash"];
        } else {
            return null;
        }
    }

    public function deleteScores($id) {
        $conn = (new config)->getDBConnection();

        try {
            $sql = "DELETE FROM scoreleaderboard WHERE user_id = $id";
            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("err in prep: " . $conn->error);
            }
            if ($stmt->execute()) {
                echo "completed successfully";
            } else {
                die("err at execute: " . $conn->error);
            }

        } catch (Exception $e) {
            die("err in deleteScores exception: " . $e->getMessage());

        } finally {
            $stmt->close();
            $conn->close();
            header("Location: ../index.html");
        }
    }

    //New function added by Sophie March 29th
    public function addScore($userID, $gameID, $score) {
        $conn = (new config)->getDBConnection();

        try {
            $sql = "INSERT INTO `scoreleaderboard`
            (`user_id`, `game_id`, `score`) 
            VALUES ('$userID','$gameID','$score')";
            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("err in prep: " . $conn->error);
            }
            if ($stmt->execute()) {
                echo "completed successfully";
            } else {
                die("err at execute: " . $conn->error);
            }

        } catch (Exception $e) {
            die("err in addScore exception: " . $e->getMessage());

        } finally {
            $stmt->close();
            $conn->close();
            header("Location: ../play.php");
        }
    }

    public function deleteAccount($id)
    {
        $conn = (new config)->getDBConnection();

        try {

            $sql = "DELETE FROM useraccounts WHERE user_id = $id";
            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("err in delete Account prepare: " . $conn->error);
            }
            if ($stmt->execute()) {
                echo "completed execution";
            } else {
                die("err in deleteAccount execute: " . $conn->errno);
            }

        } catch (Exception $e) {
            die("err in delete account general exception: " . $e->getMessage());
        } finally {
            $stmt->close();
            $conn->close();
            $this->deleteScores($id);
        }

    }

    public function createSessionID()
    {
        $length = 32;
        // Define the characters allowed in the session ID
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Get the number of characters allowed
        $charLength = strlen($characters);

        // Initialize the session ID variable
        $sessionID = '';

        // Generate a random session ID of the specified length
        for ($i = 0; $i < $length; $i++) {
            $sessionID .= $characters[rand(0, $charLength - 1)];
        }

        return $sessionID;
    }

    public function selectScores($userId){
        $leaderBoardSQL = sprintf("SELECT scoreleaderboard.score_id, scoreleaderboard.user_id, scoreleaderboard.score, useraccounts.avatarurl, useraccounts.username
             FROM scoreleaderboard inner join useraccounts on scoreleaderboard.user_id = useraccounts.user_id where game_id = '%u' order by score desc limit 10", $userId);
//        $conn = (new config)->getDBConnection();
        $crud = new crud;
        try {
            return $crud->read($leaderBoardSQL);

        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }
    }
}
