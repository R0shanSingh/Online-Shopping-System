<?php
    class Fetch extends Database{
        function __construct() {
            parent::__construct();
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO USER
        \*-----------------------------------*/

        // Verify user email
        public function check_email($email) {
            $query = "SELECT * FROM `users` WHERE user_email=:check_email";
            $result = $this->connection->prepare($query);
            $result->bindValue(":check_email", $email);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount == 1) {
                return true;
            }
            return false;
        }

        // Verify user
        public function authenticate($email, $password) {
            $query = "SELECT * FROM `users` WHERE user_email=:check_email AND user_password = :check_password";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(":check_email", $email);
            $statement->bindValue(":check_password", $password);
            $statement->execute();
            $rowCount = $statement->rowCount();
            if ($rowCount == 1) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $result = array();
                $result['user_id'] = $row['user_id'];
                $result['username'] = $row['username'];
                $result['user_email'] = $row['user_email'];
                return $result;
            }
            return false;
        }  

        // Get User Info
        public function get_user_details($user_id) {
            $query = "SELECT * FROM `users` WHERE user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            return $result;
        }

        // Update User Profile
        public function update_profile($user_id, $username, $user_phone_no, $city, $zip_code, $state) {
            $query = "UPDATE `users` SET `username`=:username , `user_phone_no`=:user_phone_no , `city`=:city , `zip_code`=:zip_code , `state`=:user_state WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->bindValue(":username", $username);
            $result->bindValue(":user_phone_no", $user_phone_no);
            $result->bindValue(":city", $city);
            $result->bindValue(":zip_code", $zip_code);
            $result->bindValue(":user_state", $state);
            $result->execute();
            return true;
        }

        // Confirm User Password
        public function confirm_password($user_id, $password) {
            $query = "SELECT * FROM `users` WHERE `user_id`=:user_id AND `user_password`=:user_password";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->bindValue(":user_password", $password);
            $result->execute();
            $no_of_items = $result->rowCount();
            if ($no_of_items == 1) {
                return true;
            }
            return false;
        }

        // Update Password
        public function update_user_password($user_id, $password) {
            $query = "UPDATE `users` SET `user_password`=:new_password WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->bindValue(":new_password", $password);
            $result->execute();
            return true;  
        }

        // Update Profile Picture
        public function update_profile_pic($user_id, $user_pic) {
            $query = "UPDATE `users` SET `user_pic`=:user_pic WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_pic", $user_pic);
            $result->bindVAlue(":user_id", $user_id);
            $result->execute();
            return true;
        }

        // Delete User Account
        public function remove_user($user_id) {
            // Deleting user details from users table
            $query_1 = "DELETE FROM `users` WHERE `user_id`=:user_id";
            $result_1 = $this->connection->prepare($query_1);
            $result_1->bindValue(":user_id", $user_id);
            $result_1->execute();

            // Deleting user details from cart table
            $query_2 = "DELETE FROM `cart` WHERE `user_id`=:user_id";
            $result_2 = $this->connection->prepare($query_2);
            $result_2->bindValue(":user_id", $user_id);
            $result_2->execute();

            // Updating user data from reviews table
            $query_3 = "UPDATE `reviews` SET `user_id`= 0 WHERE `user_id`=:user_id";
            $result_3 = $this->connection->prepare($query_3);
            $result_3->bindValue(":user_id", $user_id);
            $result_3->execute();

            // Updating users data from order_details table
            $query_4 = "UPDATE `orders` SET `user_id`= 0  WHERE `user_id`=:user_id";
            $result_4 = $this->connection->prepare($query_4);
            $result_4->bindValue(":user_id", $user_id);
            $result_4->execute();

            return true;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO CATEGORIES
        \*-----------------------------------*/

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

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO PRODUCTS
        \*-----------------------------------*/

        // display products according to required category
        public function get_specific_product($category_id) {
            $query = "SELECT * FROM `products` WHERE `category_id`=:category_id ORDER BY rand() LIMIT 8";
            $result = $this->connection->prepare($query);
            $result->bindValue(":category_id", $category_id);
            $result->execute();
            return $result;
        }

        // Display all Products according to Newly added
        public function get_all_products() {
            $query = "SELECT * FROM `products` ORDER BY `product_id` DESC";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result;
        }

        // display searched products
        public function searched_products($search) {
            // $query = "SELECT * FROM `products` WHERE `product_keywords` LIKE '%:search%'";
            $query = "SELECT * FROM `products` WHERE `product_keywords` LIKE CONCAT('%', :search, '%') ORDER BY `product_rating` DESC";
            // $query = "SELECT * FROM `products` WHERE `product_keywords` REGEXP '[[:<:]]:search[[:>:]]'";
            $result = $this->connection->prepare($query);
            $result->bindValue(":search", $search);
            $result->execute();
            return $result;
        }

        // display all products
        public function display_all_products() {
            $query = "SELECT * FROM `products`";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result;
        }

        // diaplay unique product
        public function get_unique_product($product_id) {
            $query = "SELECT * FROM `products` WHERE `product_id`= :product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // display reletad products
        public function related_products($product_id) {
            $query = "SELECT `category_id` FROM `products` WHERE `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);

            $query2 = "SELECT * FROM `products` WHERE category_id=:category_id AND product_id!=:product_id ORDER BY rand() LIMIT 4";
            $result2 = $this->connection->prepare($query2);
            $result2->bindValue(":category_id", $record['category_id']);
            $result2->bindValue(":product_id", $product_id);
            $result2->execute();

            $rowCount = $result2->rowCount();

            if ($rowCount == 0) {
                return false;
            }
            return $result2;
        }

        // Get Product Price
        public function get_product_price($product_id) {
            $query = "SELECT `product_price` FROM `products` WHERE `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);
            return $record['product_price'];
        }

        // Top Rated Products
        public function top_rated_products() {
            $query = "SELECT * FROM `products` ORDER BY `product_rating` DESC";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO CART
        \*-----------------------------------*/

        // check product in cart
        public function check_product_in_cart($product_id) {
            $query = "SELECT * FROM `cart` WHERE product_id=:product_id AND user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":user_id", $_SESSION['user']['id']);
            $result->execute();
            $rowCount = $result->rowCount();

            if ($rowCount == 1) {
                return true;
            }
            return false;
        }

        // Get Cart Products total price
        public function get_cart_total_price($user_id) {
            $query = "SELECT * FROM `cart` WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $amount = 0;
            while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
                $product_price = $this->get_product_price($record['product_id']);
                $amount += ($product_price * $record['quantity']);
            }
            return $amount;
        }

        // display cart items
        public function get_cart_items($user_id) {
            $query = "SELECT * FROM `cart` WHERE user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            return $result;
        }

        // remove cart items
        public function remove_cart_item($product_id, $user_id) {
            $query = "DELETE FROM `cart` WHERE product_id=:product_id AND user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            return true;
        }

        // remove all cart items
        public function remove_all_cart_items($user_id) {
            $query = "DELETE FROM `cart` WHERE user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            return true;
        }

        // check cart item
        public function check_cart_items($user_id) {
            $query = "SELECT * FROM `cart` WHERE user_id=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount >= 1) {
                return $result;
            }
            return false;
        }

        // display cart item according to product
        public function display_cart_item($product_id) {
            $query = "SELECT * FROM `products` WHERE `product_id` = :product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return $result;
        }

        // Update Cart Quantity
        public function update_cart_quantity($product_id, $quantity, $user_id) {
            $query = "UPDATE `cart` SET `quantity`=:quantity WHERE `user_id`=:user_id AND `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":quantity", $quantity);
            $result->bindValue(":user_id", $user_id);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            return true;
        }

        // Get Product Quantity
        public function get_cart_product_quantity($product_id, $user_id) {
            $query = "SELECT * FROM `cart` WHERE `product_id`=:product_id AND `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);
            return $record['quantity'];
        }

        // Get Cart Products Total Quantity
        public function get_cart_product_total_quantity($user_id) {
            $query = "SELECT * FROM `cart` WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $total_quantity = 0;
            while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
                $total_quantity += $record['quantity'];
            }
            return $total_quantity;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO RATINGS
        \*-----------------------------------*/

        // Rating
        public function get_total_rating($product_id) {
            $query = "SELECT * FROM `reviews` WHERE `product_id` = :product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            $number_of_users = $result->rowCount();
            $rating = 0;
            if ($number_of_users >= 1) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $rating += $row['rating'];
                }
                return number_format(($rating / $number_of_users), 1);
            }
            return "Not Rated";
        }

        // Fetch product review
        public function get_product_reviews($product_id) {
            $query = "SELECT * FROM `reviews` WHERE `product_id`=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount > 0) {
                return $result;
            }
            return false;
        }

        // Fetch user reviews
        public function get_user_reviews($user_id) {
            $query = "SELECT * FROM `users` WHERE `user_id`=:user_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount >= 1) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
            return false;
        }

        // get particular user review
        public function get_unique_user_review($user_id, $product_id) {
            $query = "SELECT * FROM `reviews` WHERE user_id=:user_id AND product_id=:product_id";
            $result = $this->connection->prepare($query);
            $result->bindValue("user_id", $user_id);
            $result->bindValue("product_id", $product_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount >= 1) {
                return true;
            } 
            return false;
        }

        /*-----------------------------------*\
            # FUNCTIONS RELATED TO ORDERS
        \*-----------------------------------*/

        // get ordered product quantity
        public function get_ordered_product_quantity($order_no, $product_id) {
            $query = "SELECT * FROM `order_details` WHERE `product_id`=:product_id AND `order_no`=:order_no";
            $result = $this->connection->prepare($query);
            $result->bindValue(":product_id", $product_id);
            $result->bindValue(":order_no", $order_no);
            $result->execute();
            $record = $result->fetch(PDO::FETCH_ASSOC);
            return $record['quantity'];
        }

        // Order Details
        public function get_order_details($user_id) {
            $query = "SELECT * FROM `orders` WHERE `user_id` = :user_id ORDER BY `order_id` DESC";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            $rowCount = $result->rowCount();
            if ($rowCount == 0) {
                return false;
            }
            return $result;
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

        // get particular order detail
        public function get_unique_order_details($user_id) {
            $query = "SELECT * FROM `orders` WHERE `user_id`=:user_id ORDER BY `order_id` DESC";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_id", $user_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
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

        // get ordered products
        public function get_ordered_products($order_no) {
            $query = "SELECT * FROM `order_details` WHERE `order_no` = :order_no";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_no", $order_no);
            $result->execute();
            return $result;
        }

        public function get_all_ordered_product_quantity($order_no) {
            $query = "SELECT * FROM `order_details` WHERE `order_no`=:order_no";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_no", $order_no);
            $result->execute();
            $quantity = 0;
            while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
                $quantity += $record['quantity'];
            }
            return $quantity;
        }

        // Cancel Particular Order
        public function cancel_order($order_id) {
            $query = "DELETE FROM `order_details` WHERE `order_id`=:order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();
            $query2 = "DELETE FROM `orders` WHERE `order_id`=:order_id";
            $result2 = $this->connection->prepare($query2);
            $result2->bindValue(":order_id", $order_id);
            $result2->execute();
            return true;
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

        // count total user
        public function get_total_users() {
            $query = "SELECT count(*) AS total_users FROM `users`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_users'];
        }

        // count total products
        public function get_total_products() {
            $query = "SELECT count(*) AS total_products FROM `products`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_products'];
        }

        // count total orders
        public function get_total_orders() {
            $query = "SELECT count(*) AS total_orders FROM `orders`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_orders'];
        }

        // count total queries
        public function get_user_queries() {
            $query = "SELECT count(*) AS total_queries FROM `queries`";
            $result = $this->connection->prepare($query);
            $result->execute();
            $result_data = $result->fetch(PDO::FETCH_ASSOC);
            return $result_data['total_queries'];
        }

        // count total order made
        public function get_user_orders() {
            $query = "SELECT * FROM `orders`";
            $result = $this->connection->prepare($query);
            $result->execute();
            if ($result->rowCount() < 1) {
                return false;
            }
            return $result;
        }
        
        // get user queries
        public function get_user_queries_data() {
            $query = "SELECT * FROM `queries`";
            $result = $this->connection->prepare($query);
            $result->execute();
            if ($result->rowCount() < 1) {
                return false;
            }
            return $result;
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

        // confirm order
        public function confirm_order($order_id) {
            $query = "UPDATE `orders` SET `status`='delivered' WHERE `order_id`=:order_id";
            $result = $this->connection->prepare($query);
            $result->bindValue(":order_id", $order_id);
            $result->execute();
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
    }
?>