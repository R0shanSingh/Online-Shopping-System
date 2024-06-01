<?php
    class Order extends Database {
        private $user_id;
        private $order_user_name;
        private $order_email;
        private $order_phone_no;
        private $order_address;
        private $order_amount;
        private $city;
        private $zip_code;
        private $state;

        function __construct($user_id, $order_user_name, $order_email, $order_phone_no, $order_address, $order_amount, $city, $zip_code, $state) {
            $this->user_id = $user_id;
            $this->order_user_name = $order_user_name;
            $this->order_email = $order_email;
            $this->order_phone_no = $order_phone_no;
            $this->order_address = $order_address;
            $this->order_amount = $order_amount;
            $this->city = $city;
            $this->zip_code = $zip_code;
            $this->state = $state;

            parent::__construct();
        }

        function push() {
            $query = "INSERT INTO `orders` (`user_id`, `order_user_name`, `order_email`, `order_phone_no`, `order_address`, `amount`, `city`, `zip_code`, `state`, `ordered_time`, `status`) VALUES (:user_id, :order_user_name, :order_email, :order_phone_no, :order_address, :order_amount,:city, :zip_code, :ordered_state, NOW(), 'processing')";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $this->user_id);
            $result->bindValue(":order_user_name", $this->order_user_name);
            $result->bindValue(":order_email", $this->order_email);
            $result->bindValue(":order_phone_no", $this->order_phone_no);
            $result->bindValue(":order_address", $this->order_address);
            $result->bindValue(":order_amount", $this->order_amount);
            $result->bindValue(":city", $this->city);
            $result->bindValue(":zip_code", $this->zip_code);
            $result->bindValue(":ordered_state", $this->state);
            $result->execute();
            return true;
        }

        function inser_order_no($order_id, $order_no, $product_id, $quantity) {
            $query = "INSERT INTO `order_details` (`order_id`, `order_no`, `product_id`, `quantity`) VALUES (:order_id, :order_no, :product_id, :quantity)";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->bindValue(":order_no", $order_no);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":quantity", $quantity);
            $result->execute();
            return true;
        }
    }
?>