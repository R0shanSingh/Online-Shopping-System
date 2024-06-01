<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Admin</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
    <!-- CSS Link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Server Error -->
    <?php
        include './includes/check_connection.php';

        if (!isConnected()) {
            include './includes/server_error.php';
            exit();
        }
    ?>

    <!-- Alert Include -->
    <?php include './Operations/_alert.php'; ?>

    <?php
        if (!isset($_SESSION['admin']) || !isset($_GET['order_id'])) {
            include './includes/access_denied.php';
            exit();
        }
    ?>
    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- Manage Order -->
    <section class="manage-order-section">
        <div class="manage-order-container">
            <div class="go-back">
                <a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
            </div>
            <?php
                include './Classes/database.php';
                include './Classes/fetch.php';

                $order_id = $_GET['order_id'];

                $fetch = new Fetch();

                $order_no = $fetch->get_order_no($order_id);
                $order_no_details = $fetch->get_order_no_details($order_id);

                $order_details = $fetch->get_unique_order_info($order_no)->fetch(PDO::FETCH_ASSOC);

                echo '<div class="manage-order-no">
                    <div class="manage-order-no-info">
                        <h2>Order No : '. $order_no .' ('. $order_details['ordered_time'] .')</h1>
                        <h4>Total : '. $order_details['amount'] .'/-</h4>
                    </div>';
                    
                if ($order_details['status'] == "processing") {
                    echo '<a href="./Operations/_manage_order.php?confirm_order=true&order_id='.$order_id.'">Confirm Order</a>';
                } elseif ($order_details['status'] == "rejected") {
                    echo '<span class="rejected-mssg">Rejected</span>';
                } else {
                    echo '<span class="delivered-mssg">Delivered</span>';
                }

                echo '</div>';

                echo '<div class="manage-order-user-details">
                    <h3>Billed to :</h3>
                    <h1>'. $order_details['order_user_name'] .'</h1>
                    <span>Email : '. $order_details['order_email'] .'</span>
                    <span>Phone : +91 '. $order_details['order_phone_no'] .'</span>
                    <span>Address : '. $order_details['order_address'] .'</span>
                </div>
                <div class="manage-order-product-container">';

                while ($row = $order_no_details->fetch(PDO::FETCH_ASSOC)) {
                    $product = $fetch->get_unique_product($row['product_id']);

                    echo '<div class="manage-order-product">
                        <div class="manage-order-product-img">
                            <img src="../product_images/'. $product['product_image1'] .'" alt="Product Image">
                        </div>
                        <div class="manage-order-product-details">
                            <ul>
                                <li>'. $product['product_name'] .'</li>
                                <li>Quantity : 5</li>
                                <li>Price : '. $product['product_price'] .'</li>
                            </ul>
                        </div>
                    </div>';
                }

                if ($order_details['status'] == "processing") {
                    echo '<div class="cancel-all-order">
                        <a href="./Operations/_manage_order.php?cancel_order=true&order_id='.$order_id.'">Cancel Order</a>
                    </div>';
                } else {
                    echo '<div class="cancel-all-order">
                        <span class="'. $order_details['status'] .'-mssg">Order '. $order_details['status'] .'</span>
                    </div>';
                }

                echo '</div>';
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>


    <!-- External Js Link -->
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
</body>

</html>