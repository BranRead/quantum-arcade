<?php
namespace Crud;

use config;
use Exception;

define('SQL_ERROR_MESSAGE', 'SQL Error: ');
class Crud
{

    public function create($data_array, $table)
    {

        $conn = new config();
        $conn = $conn->getDBConnection();

        $columns = implode(", ", array_keys($data_array));
        $place_holders = str_repeat("?, ", count($data_array));

        $sql = "INSERT INTO $table ($columns) VALUES ($place_holders)";

        $stmt = $conn->stmt_init();

        if (!$stmt->prepare($sql)) {

            die(SQL_ERROR_MESSAGE . $conn->error);
        }

        $stmt->bind_param("sss", $data_array["name"], $data_array["email"], $data_array["passHash"]);
        if ($stmt->execute()) {
            header("location: signup-success.html");
            exit;
        } else {
            if ($conn->errno === 1062) {
                die("Email already used.");
            } else {
                die(SQL_ERROR_MESSAGE . $conn->errno);
            }
        }

        $stmt->close();
        $conn->close();
    }

    public function read($sql_query)
    {
        try {
            $conn = new config();
            $conn = $conn->getDBConnection();

            $stmt = $conn->prepare($sql_query);

            $stmt->execute();

            return $stmt->get_result();
            } catch (Exception $e) {
            die(SQL_ERROR_MESSAGE . $e->getMessage());
        } finally {
            $stmt->close();
            $conn->close();
        }
    }

    public function update()
    {
        $conn = new config();
        $conn = $conn->getDBConnection();

        $sql = "UPDATE users SET username = ?, email = ?, passHash = ? WHERE id = ?";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die(SQL_ERROR_MESSAGE . $conn->error);
        }
        if ($stmt->execute()) {
            header("location: update-success.html");
            exit;
        } else {
            die(SQL_ERROR_MESSAGE . $conn->errno);
        }

        $stmt->close();
        $conn->close();
    }

    public function delete()
    {
        try {
            $conn = new config();
            $conn = $conn->getDBConnection();

            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $conn->stmt_init();
            if (!$stmt->prepare($sql)) {
                die(SQL_ERROR_MESSAGE . $conn->error);
            }
            if ($stmt->execute()) {
                header("location: delete-success.html");
                exit;
            } else {
                die(SQL_ERROR_MESSAGE . $conn->errno);
            }
        } catch (Exception $e) {
            die(SQL_ERROR_MESSAGE . $e->getMessage());
        } finally {

        $stmt->close();
        $conn->close();
        }
    }
}
