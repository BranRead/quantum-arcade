<?php

require_once "config.php";
class crud
{
    public function createUser($username, $email, $passHash)
    {
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

    public function read($sql_query)
    {
        try {
            $conn = (new config)->getDBConnection();

            return $conn->query($sql_query);
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }

    }

    public function update()
    {
        $conn = (new config)->getDBConnection();

        $sql = "UPDATE users SET username = ?, email = ?, passHash = ? WHERE id = ?";
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

    public function updateUsername($username, $userID, $location)
    {
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

    public function deleteScores($id)
    {
        $conn = (new config)->getDBConnection();

        try {
            $sql = "DELETE FROM scoreleaderboard WHERE user_id = $id";
            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("err in prep: " . $conn->error);
            }
            if ($stmt->execute()) {
                header("Location: ../quantum-arcade-brandon/play.php");
                exit;
            } else {
                die("err at execute: " . $conn->error);
            }
        } catch (Exception $e) {
            die("err in deleteScores exception: " . $e->getMessage());

        } finally {
            $stmt->close();
            $conn->close();
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
                $this->deleteScores($id);
                exit;
            } else {
                die("err in deleteaccount execute: " . $conn->errno);
            }

        } catch (Exception $e) {
            die("err in delete account general exception: " . $e->getMessage());
        }
        header("location: index.html");
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
}
