<?php
    session_start();

    if (isset($_GET['product_id']) && isset($_GET['delete_product'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $product_id = $_GET['product_id'];

        $fetch = new Fetch();

        if ($fetch->delete_product($product_id)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Product Updated Successfully!";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please Try Again Later!";
        }

        header("location: /FashionHub/Admin/index.php");
        exit();
    }

    if (isset($_POST['update_product_details'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_keys = $_POST['product_keywords'];
        $product_price = $_POST['product_price'];
        $category_id = $_POST['product_category'];
        $product_quantity = $_POST['product_quantity'];

        $fetch = new Fetch();

        if ($fetch->update_product_details($product_id, $product_name, $product_desc, $product_keys, $product_price, $category_id, $product_quantity)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Product Updated Successfully!";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please try Again Later!";
        }

        header("location: /FashionHub/Admin/index.php");
        exit();
    }
?>