<?php
    class Product extends Database {
        private $product_name;
        private $product_description;
        private $product_keywords;
        private $product_price;
        private $category_id;
        private $product_quantity;
        private $product_rating;
        private $product_image1;
        private $product_image2;
        private $product_image3;
        private $product_image4;
        private $product_image5;

        function __construct($product_name, $product_description, $product_keywords, $product_price , $category_id, $product_quantity, $product_rating, $product_image1, $product_image2, $product_image3, $product_image4, $product_image5) {
            $this->product_name = $product_name;
            $this->product_description = $product_description;
            $this->product_keywords = $product_keywords;
            $this->product_price = $product_price;
            $this->category_id = $category_id;
            $this->product_quantity = $product_quantity;
            $this->product_rating = $product_rating;
            $this->product_image1 = $product_image1;
            $this->product_image2 = $product_image2;
            $this->product_image3 = $product_image3;
            $this->product_image4 = $product_image4;
            $this->product_image5 = $product_image5;
            parent::__construct();
        }

        function insert_product() {
            $query = "INSERT INTO `products` (`product_name`, `product_description`, `product_keywords`, `product_price`, `category_id`, `product_quantity`, `product_rating`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_image5`) VALUES (:product_name, :product_description, :keywords, :price, :category_id, :quantity, :product_rating, :image1, :image2, :image3, :image4, :image5)";

            $result = $this->connection->prepare($query);

            $result->bindValue(":product_name", $this->product_name);
            $result->bindValue(":product_description", $this->product_description);
            $result->bindValue(":keywords", $this->product_keywords);
            $result->bindValue(":price", $this->product_price);
            $result->bindValue(":category_id", $this->category_id);
            $result->bindValue(":quantity", $this->product_quantity);
            $result->bindValue(":product_rating", $this->product_rating);
            $result->bindValue(":image1", $this->product_image1);
            $result->bindValue(":image2", $this->product_image2);
            $result->bindValue(":image3", $this->product_image3);
            $result->bindValue(":image4", $this->product_image4);
            $result->bindValue(":image5", $this->product_image5);

            // Executiong the Insert Query
            $result->execute();
            return true;
        }
    }
?>