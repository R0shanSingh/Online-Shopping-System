<?php
    class Cart extends Database{
        private $product_id;
        private $user_id;
        private $quantity;

        function __construct($product_id, $user_id, $quantity) {
            $this->product_id = $product_id;
            $this->user_id = $user_id;
            $this->quantity = $quantity;

            parent::__construct();
        }

        function add_to_cart() {
            $query = "INSERT INTO `cart` (product_id, user_id, quantity) VALUES (:product_id, :user_id, :quantity)";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $this->product_id);
            $result->bindValue(":user_id", $this->user_id);
            $result->bindValue(":quantity", $this->quantity);
            $result->execute();
            return true;
        }
    }
?>