<?php
    class config
    {
        private $server = 'localhost';
        private $userName = 'root';
        private $pass = "";
        private $dbname = 'quantumarcade';

        public function getDBConnection()
        {
           try {
                $conn = new mysqli($this->server, $this->userName, $this->pass, $this->dbname);
                if ($conn->connect_errno) {
                    die('Connection Error: ' . $conn->connect_errno);
                }
               return $conn;
           }
           catch (Exception $e)
           {
               die('Connection Error: ' . $e->getMessage());
           }
        }
    }
