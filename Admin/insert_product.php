<?php
    session_start();

    if (isset($_POST['insert_products'])) {
        include './Classes/database.php';
        include './Classes/product.php';

        // Accessing Datas
        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_price = $_POST['product_price'];
        $product_category_id = $_POST['product_category'];
        $product_rating = 0;
        $product_type = $_POST['product_type'];
        $product_quantity = $_POST['product_quantity'];

        // Accessing Images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];
        $product_image4 = $_FILES['product_image4']['name'];
        $product_image5 = $_FILES['product_image5']['name'];

        // Accessing Images Name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
        $temp_image4 = $_FILES['product_image4']['tmp_name'];
        $temp_image5 = $_FILES['product_image5']['tmp_name'];

        $product = new Product($product_name, $product_desc, $product_keywords, $product_price, $product_category_id, $product_quantity, $product_rating, $product_image1, $product_image2, $product_image3, $product_image4, $product_image5);

        move_uploaded_file($temp_image1, "../product_images/$product_image1");
        move_uploaded_file($temp_image2, "../product_images/$product_image2");
        move_uploaded_file($temp_image3, "../product_images/$product_image3");
        move_uploaded_file($temp_image4, "../product_images/$product_image4");
        move_uploaded_file($temp_image5, "../product_images/$product_image5");

        if ($product->insert_product()) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Product Inserted Successfully";
            header("location: /FashionHub/Admin/");
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please try Again!";
            header("location: /FashionHub/Admin/");
        }
    }
?>