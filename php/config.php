<?php
    class Config
    {
        public function getDBConnection()
        {
           $server = "localhost";
           $userName = "root";
           $pass = getenv('MYSQL_SECURE_PASSWORD');
           $dbname = "quantumarcade";

           try {
                $conn = new mysqli($server, $userName, $pass, $dbname);
                if ($conn->connect_errno) {
                    die("Connection Error: " . $conn->connect_errno);
                }

               return $conn;
           }
           catch (Exception $e)
           {
               die("Connection Error: " . $e->getMessage());
           }
        }
    }
