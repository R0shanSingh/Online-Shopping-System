<?php
    session_start();

    if (isset($_GET['product_id'])) {
        include '../Classes/database.php';
        include '../Classes/cart.php';

        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user']['id'];

        $quantity = 1;
        
        $cart = new Cart($product_id, $user_id, $quantity);

        if ($cart->add_to_cart()) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Product Successfully added to cart";   
            header("location: /FashionHub/cart.php");
            exit();
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please try again Later!";
            header("location: /FashionHub/index.php");
            exit();
        }
    }
?>