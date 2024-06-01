<?php
    session_start();

    if (isset($_SESSION['admin'])) {
        if (isset($_GET['confirm_order'])) {
            include '../Classes/database.php';
            include '../Classes/fetch.php';

            $order_id = $_GET['order_id'];

            $fetch = new Fetch();
            if ($fetch->confirm_order($order_id)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Order Confirmed!";
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "We are having some problem. Please try again later!";
            }

            header("location: /FashionHub/Admin/order_details.php?order_id=$order_id");
            exit();
        }

        if (isset($_GET['cancel_order'])) {
            include '../Classes/database.php';
            include '../Classes/fetch.php';

            $order_id = $_GET['order_id'];
            
            $fetch = new Fetch();

            if ($fetch->reject_order($order_id)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Order Canceled!";
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "We are having some problem. Please try again later!";
            }

            header("location: /FashionHub/Admin/order_details.php?order_id=$order_id");
            exit();
        }
    }

?>