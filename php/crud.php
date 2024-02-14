<?php

require_once "config.php";
class crud
{
    public function create($data_array, $table)
    {
        try {
            $conn = (new config)->getDBConnection();

            $columns = implode(", ", array_keys($data_array));
            $place_holders = str_repeat("?, ", count($data_array));

            $sql = "INSERT INTO $table ($columns) VALUES ($place_holders)";

            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {

                die("err: " . $conn->error);
            }

            $stmt->bind_param("sss", $data_array["name"], $data_array["email"], $data_array["passHash"]);

            if ($stmt->execute()) {
                header("location: ../play.php");
                exit;
            } else {
                if ($conn->errno === 1062) {
                    die("Email already used.");
                } else {
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
            $config = new config;
            $conn = $config->getDBConnection();

            return $conn->query($sql_query);
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }

    }

    public function update()
    {
        $config = new config();
        $conn = $config->getDBConnection();

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
        $config = new config();
        $conn = $config->getDBConnection();

        $sql = "UPDATE useraccounts SET username = '{$username}' WHERE user_id = {$userID}";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("err: " . $conn->error);
        }
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
        $config = new config;
        $conn = $config->getDBConnection();

        try {
            $sql = "DELETE FROM scoreleaderboards WHERE user_id = {$id}";
            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("err: " . $conn->error);
            }
            if ($stmt->execute()) {
                header("../play.php");
                exit;
            } else {
                die("err: " . $conn->error);
            }
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        } finally {
            $stmt->close();
            $conn->close();
        }
    }

    public function deleteAccount($id)
    {
        $config = new config();
        $conn = $config->getDBConnection();

        try {
            $sql = "DELETE FROM users WHERE id = {$id}";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                die("err: " . $conn->error);
            }
            if ($stmt->execute()) {
                $this->deleteScores($id);
                exit;
            } else {
                die("err: " . $conn->errno);
            }

        } catch (Exception $e) {
            die("err: " . $e->getMessage());
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
}
