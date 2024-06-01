<?php
    session_start();

    if (isset($_POST['product-quantity-update'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $product_id = $_POST['product_id'];
        $quantity = $_POST['product-quantity'];
        $user_id = $_SESSION['user']['id'];

        $fetch = new Fetch();

        if ($fetch->update_cart_quantity($product_id, $quantity, $user_id)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Quantity Updated Successfully";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "We are having a Problem. Please try again later!";
        }

        header("location: /FashionHub/cart.php");
        exit();
    }

    if (isset($_GET['remove_item'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $remove_product = $_GET['remove_item'];
        $user_id = $_SESSION['user']['id'];

        $fetch = new Fetch();

        if ($fetch->remove_cart_item($remove_product, $user_id)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Item Removed Successfully.";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "We are having a Problem. Please try again later!";    
        }

        header("location: /FashionHub/cart.php");
        exit();
    }

    if (isset($_GET['remove_all'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $user_id = $_SESSION['user']['id'];

        $fetch = new Fetch();

        if ($fetch->remove_all_cart_items($user_id)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "All Items Removed Successfully.";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "We are having a Problem. Please try again later!";
        }

        header("location: /FashionHub/cart.php");
        exit();
    }
?>