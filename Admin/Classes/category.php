<?php
    class Category extends Database {
        private $category_name;

        function __construct($category_name) {
            $this->category_name = $category_name;

            parent::__construct();
        }

        function insert_category() {
            $query = "INSERT INTO `categories` (`category_name`) VALUES (:category_name)";
            $result = $this->connection->prepare($query);
            $result->bindValue(":category_name", $this->category_name);
            $result->execute();
            return true;
        }
    }
?>