<?php
    class Fetch extends Database {
        function __construct() {
            parent::__construct();
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO ADMIN
        \*-----------------------------------*/

        // verify admin
        function verify_admin($username, $password) {
            $query = "SELECT * FROM `admin` WHERE `username`=:username AND `password`=:user_password";
            $result = $this->connection->prepare($query);
            $result->bindValue(":username", $username);
            $result->bindValue(":user_password", $password);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount == 1) {
                return true;
            }
            return false;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO USER
        \*-----------------------------------*/

        // count total user
        public function get_total_users() {
            $query = "SELECT count(*) AS total_users FROM `users`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_users'];
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO CATEGORIES
        \*-----------------------------------*/

        // check existing category
        public function check_existing_category($category_name) {
            $query = "SELECT * FROM `categories`";
            $result = $this->connection->prepare($query);
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (strtolower($row['category_name']) == strtolower($category_name)) {
                        return true;
                    }
            }
            return false;
        }

        // Get Category's Array
        public function get_category_array() {
            $query = "SELECT * FROM `categories`";
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $category_array = array();

            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $category_array[$row['category_id']] = $row['category_name'];
            }
            return $category_array;
        }

        // display all categories
        public function get_categories() {
            $query = "SELECT * FROM `categories`";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result;
        }

        // delete an existing category
        public function delete_category($category_id) {
            $query = "DELETE FROM `categories` WHERE `category_id`=:category_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":category_id", $category_id);
            $result->execute();
            return true;
        }

        // update an existing category
        public function update_category($category_id, $category_name) {
            $query = "UPDATE `categories` SET `category_name`=:category_name WHERE `category_id`=:category_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":category_id", $category_id);
            $result->bindValue(":category_name", $category_name);
            $result->execute();
            return true;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO PRODUCTS
        \*-----------------------------------*/

        // diaplay unique product
        public function get_unique_product($product_id) {
            $query = "SELECT * FROM `products` WHERE `product_id`= :product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // display all products
        public function display_all_products() {
            $query = "SELECT * FROM `products`";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result;
        }

        // count total products
        public function get_total_products() {
            $query = "SELECT count(*) AS total_products FROM `products`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_products'];
        }

        public function delete_product($product_id) {
            $query = "DELETE FROM `products` WHERE `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return true;
        }

        public function get_unique_product_details($product_id) {
            $query = "SELECT * FROM `products` WHERE `product_id`= :product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function update_product_details($product_id, $product_name, $product_desc, $product_keys, $product_price, $category_id, $product_quantity) {
            $query = "UPDATE `products` SET `product_name`=:product_name , `product_description`=:product_desc , `product_keywords`=:product_keys , `product_price`=:product_price , `category_id`=:category_id , `product_quantity`=:product_quantity WHERE `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":product_name", $product_name);
            $result->bindValue(":product_desc", $product_desc);
            $result->bindValue(":product_keys", $product_keys);
            $result->bindValue(":product_price", $product_price);
            $result->bindValue(":category_id", $category_id);
            $result->bindValue(":product_quantity", $product_quantity);
            $result->execute();
            return true;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO ORDERS
        \*-----------------------------------*/

        // count total orders
        public function get_total_orders() {
            $query = "SELECT count(*) AS total_orders FROM `orders`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_orders'];
        }

        // count total order made
        public function get_user_orders() {
            $query = "SELECT * FROM `orders` ORDER BY `order_id` DESC";
            $result = $this->connection->prepare($query);
            $result->execute();
            if ($result->rowCount() < 1) {
                return false;
            }
            return $result;
        }

        // confirm order
        public function confirm_order($order_id) {
            $query = "UPDATE `orders` SET `status`='delivered' WHERE `order_id`=:order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();

            $query2 = "SELECT * FROM `order_details` WHERE `order_id`=:order_id";
            $result2 = $this->connection->prepare($query2);
            $result2->bindValue(":order_id", $order_id);
            $result2->execute();
            
            while ($product = $result2->fetch(PDO::FETCH_ASSOC)) {
                $product_id = $product['product_id'];
                $query3 = "SELECT * FROM `products` WHERE `product_id`=:product_id";
                $result3 = $this->connection->prepare($query3);
                $result3->bindValue(":product_id", $product_id);
                $result3->execute();

                $product_data = $result3->fetch(PDO::FETCH_ASSOC);
                $product_quantity = $product_data['product_quantity'] - $product['quantity'];
                
                $query4 = "UPDATE `products` SET `product_quantity`=:product_quantity WHERE `product_id`=:product_id";
                $result4 = $this->connection->prepare($query4);
                $result4->bindValue(":product_id", $product_id);
                $result4->bindValue(":product_quantity", $product_quantity);
                $result4->execute();
            }
            return true;
        }

        // Reject Order
        public function reject_order($order_id) {
            $query = "UPDATE `orders` SET `status`='rejected' WHERE `order_id`=:order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();
            return true;
        }

        // get order number
        public function get_order_no($order_id) {
            $query = "SELECT * FROM `order_details` WHERE `order_id` = :order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);
            return $record['order_no'];
        }

        // Get order number Details
        public function get_order_no_details($order_id) {
            $query = "SELECT * FROM `order_details` WHERE `order_id` = :order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount == 0) {
                return false;
            }
            return $result;
        }

        // get particular order number
        public function get_unique_order_info($order_no) {
            $query = "SELECT * FROM `order_details` WHERE order_no=:order_no";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_no", $order_no);
            $result->execute();

            $record = $result->fetch(PDO::FETCH_ASSOC);

            $order_id = $record['order_id'];

            $query2 = "SELECT * FROM `orders` WHERE order_id=:order_id";
            $result2 = $this->connection->prepare($query2);
            $result2->bindValue(":order_id", $order_id);
            $result2->execute();

            return $result2;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO RATINGS
        \*-----------------------------------*/
        
        // get user queries
        public function get_user_queries_data() {
            $query = "SELECT * FROM `queries` ORDER BY `query_id` DESC";
            $result = $this->connection->prepare($query);
            $result->execute();
            if ($result->rowCount() < 1) {
                return false;
            }
            return $result;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO QUERIES
        \*-----------------------------------*/

        // count total queries
        public function get_user_queries() {
            $query = "SELECT count(*) AS total_queries FROM `queries`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_queries'];
        }

        // get unique query data
        public function get_unique_user_query($query_id) {
            $query = "SELECT * FROM `queries` WHERE `query_id`=:query_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":query_id", $query_id);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);
            return $record;
        }
    }
?>