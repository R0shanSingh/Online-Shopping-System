<?php
    class Rating extends Database{
        private $rating_user_id;
        private $rating_product_id;
        private $rating;
        private $review;

        function __construct($rating_user_id, $rating_product_id, $rating, $review) {
            $this->rating_user_id = $rating_user_id;
            $this->rating_product_id = $rating_product_id;
            $this->rating = $rating;
            $this->review = $review;

            parent::__construct();
        }

        function insert_rating() {
            // Input user ratings in reviews table
            $insert_query = "INSERT INTO `reviews` (`user_id`, `product_id`, `rating`, `review`, `timestamp`)  VALUES (:user_id, :product_id, :rating, :review, NOW())";
            $result = $this->connection->prepare($insert_query);
            $result->bindValue(":user_id", $this->rating_user_id);
            $result->bindValue(":product_id", $this->rating_product_id);
            $result->bindValue(":rating", $this->rating);
            $result->bindValue(":review", $this->review);
            $result->execute();

            // Select product Rating
            $select_rating = "SELECT * FROM `reviews` WHERE `product_id`=:product_id";
            $result2 = $this->connection->prepare($select_rating);
            $result2->bindValue(":product_id", $this->rating_product_id);
            $result2->execute();
            $no_of_ratings = $result2->rowCount();

            // Calucalte total ratings given to the product
            if ($no_of_ratings >= 1) {
                $product_rating = "SELECT SUM(rating) as total_rating FROM `reviews` WHERE `product_id`=:product_id";
                $result3 = $this->connection->prepare($product_rating);
                $result3->bindValue(":product_id", $this->rating_product_id);
                $result3->execute();
                $total_rating_record = $result3->fetch(PDO::FETCH_ASSOC);
                $total_rating = number_format(($total_rating_record['total_rating'] / $no_of_ratings), 1);
            } else {
                $total_rating = 0;
            }

            // Update the total rating in the products table
            $update_product_rating = "UPDATE `products` SET product_rating=:rating WHERE product_id=:product_id";
            $result4 = $this->connection->prepare($update_product_rating);
            $result4->bindValue(":rating", $total_rating);
            $result4->bindValue(":product_id", $this->rating_product_id);
            $result4->execute();
            return true;
        }
    }
?>