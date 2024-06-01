<?php 
    session_start();

    if (isset($_POST['confirm-order'])) {
        include '../Classes/database.php';
        include '../Classes/order.php';
        include '../Classes/fetch.php';
        $user_id = $_SESSION['user']['id'];
        $product_id = $_POST['checkout-product_id'];
        $name = $_POST['checkout-name'];
        $email = $_POST['checkout-email'];
        $phone_no = $_POST['checkout-phone-no'];
        $address = $_POST['checkout-address'];
        $city = $_POST['checkout-city'];
        $zipcode = $_POST['checkout-zipcode'];
        $state = $_POST['checkout-state'];

        $fetch = new Fetch();

        $order_amount = $fetch->get_product_price($product_id);

        $order_amount = $order_amount + ($order_amount * 0.05);

        $order = new Order($user_id, $name, $email, $phone_no, $address, $order_amount, $city, $zipcode, $state);
        if ($order->push()) {

            $result = $fetch->get_unique_order_details($user_id);

            $order_id = $result['order_id'];

            $order_no = "FASHION" . strval($order_id);

            $product_quantity = 1;
            
            if ($order->inser_order_no($order_id, $order_no, $product_id, $product_quantity)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Order Confirmed";
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "Retry the Action!";
            }
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Retry the Action!";
        }
        
        header("location: /FashionHub/my_orders.php");
        exit();
    }

    if (isset($_POST['confirm-order-cart-items'])) {
        include '../Classes/database.php';
        include '../Classes/order.php';
        include '../Classes/fetch.php';

        $user_id = $_SESSION['user']['id'];
        $name = $_POST['checkout-name'];
        $email = $_POST['checkout-email'];
        $phone_no = $_POST['checkout-phone-no'];
        $address = $_POST['checkout-address'];
        $city = $_POST['checkout-city'];
        $zipcode = $_POST['checkout-zipcode'];
        $state = $_POST['checkout-state'];

        $fetch = new Fetch();

        $records = $fetch->get_cart_items($user_id);

        $order_amount = $fetch->get_cart_total_price($user_id);

        $order_amount = $order_amount + ($order_amount * 0.05);

        $order = new Order($user_id, $name, $email, $phone_no, $address, $order_amount, $city, $zipcode, $state);

        $order_confirmation = false;

        if ($order->push()) {
            while ($record = $records->fetch(PDO::FETCH_ASSOC)) {
                $product_id = $record['product_id'];
                $result = $fetch->get_unique_order_details($user_id);
                $order_id = $result['order_id'];
                $product_quantity = $fetch->get_cart_product_quantity($record['product_id'], $user_id);
                $order_no = "FASHION" . strval($order_id);
                if ($order->inser_order_no($order_id, $order_no, $product_id, $product_quantity)) {
                    $_SESSION['alert'] = true;
                    $_SESSION['alert_message'] = "Order Confirmed";
                    $order_confirmation = true;
                } else {
                    $_SESSION['alert'] = false;
                    $_SESSION['alert_message'] = "Retry the action";
                }
            }   
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Retry the action";
        }

        if ($order_confirmation) {
            $fetch->remove_all_cart_items($user_id);
        }

        header("location: /FashionHub/my_orders.php");
        exit();
    }
?>