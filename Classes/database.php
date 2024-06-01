<?php
    class Database {
        protected $connection;

        function __construct() {
            $this->connectDB();
        }

        private function connectDB() {
            $this->connection = new PDO("mysql:host=localhost;dbname=fashionhub", "root", "");
            // Set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        }
    }
?>