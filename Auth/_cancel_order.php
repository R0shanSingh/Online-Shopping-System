<?php
    session_start();

    if (isset($_GET['order_id'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $order_id = $_GET['order_id'];

        $fetch = new Fetch();

        if ($fetch->cancel_order($order_id)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Order Canceled!";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please try Again Later!";
        }

        header("location: /FashionHub/my_orders.php");
        exit();
    }
?>