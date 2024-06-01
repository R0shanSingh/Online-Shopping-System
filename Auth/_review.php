<?php
    session_start();

    if (isset($_SESSION['loggedin'])) {
        $user_id = $_SESSION['user']['id'];

        if (isset($_POST['review'])) {
            include '../Classes/database.php';
            include '../Classes/rating.php';

            $product_id = $_GET['product_id'];
            $rating = $_POST['rating'];
            $product_review = $_POST['product-review'];
            $product_review = str_replace("<", "&lt;", $product_review);
            $product_review = str_replace(">", "&gt;", $product_review);

            $review = new Rating($user_id, $product_id, $rating, $product_review);

            if ($review->insert_rating()) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Your review has been submitted successfully.";
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "We are having some issue with the server. Please try again later.";
            }

            header("location: /FashionHub/product_details.php?product_id=$product_id#product-review");
            exit();
        }
    } 
?>