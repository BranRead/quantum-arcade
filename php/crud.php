<?php

require_once "config.php";
class Crud
{
    public function create($data_array, $table)
    {
        try {

            $config = new config;
            $conn = $config->getDBConnection();

            $columns = implode(", ", array_keys($data_array));
            $place_holders = str_repeat("?, ", count($data_array));

            $sql = "INSERT INTO $table ($columns) VALUES ($place_holders)";

            $stmt = $conn->stmt_init();

            if (!$stmt->prepare($sql)) {

                die("err: " . $conn->error);
            }

            $stmt->bind_param("sss", $data_array["name"], $data_array["email"], $data_array["passHash"]);

            if ($stmt->execute()) {
                header("location: signup-success.html");
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
                exit;
            } else {
                die("err: " . $conn->errno);
            }
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        }

        try {
            $this->deleteScores($id);
        } catch (Exception $e) {
            die("err: " . $e->getMessage());
        } finally {
            $stmt->close();
            $conn->close();
        }
    }
}
