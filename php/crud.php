<?php
namespace Crud;
using config.php;

class Crud
{
    public function create($data_array, $table)
    {

        $conn = getDBConnection();

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
        $conn = getDBConnection();

        $stmt = $conn->prepare($sql_query);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $conn->close();
    }

    public function update()
    {
        $conn = getDBConnection();

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
        $conn = getDBConnection();

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

        $stmt->close();
        $conn->close();
    }
}
