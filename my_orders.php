<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Product Details</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
    <!-- External CSS Link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- responsive CSS Link -->
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
    
    <?php
        if (!isset($_SESSION['loggedin'])) {
            include './includes/access_denied.php';
            exit();
        }
    ?>

    <?php include './Auth/_alert.php'; ?>

    <?php include './includes/header.php'; ?>

    <section class="my-orders-container">
        <?php
            include './Classes/database.php';
            include './Classes/fetch.php';

            $user_id = $_SESSION['user']['id'];

            $fetch = new Fetch();

            $orders = $fetch->get_order_details($user_id);

            if ($orders == false) {
                echo ' <div class="no-orders-found">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <h2>No Order Yet</h2>
                </div>';
            } else {
                echo '<div class="my-orders">
                <h1>Orders History</h1>';

                while ($order = $orders->fetch(PDO::FETCH_ASSOC)) {
                    $order_id = $order['order_id'];

                    $order_no = $fetch->get_order_no_details($order_id);

                    $order_no_data = $order_no->fetch(PDO::FETCH_ASSOC);

                    // $total_items = $order_no->rowCount();
                    $total_items = $fetch->get_all_ordered_product_quantity($order_no_data['order_no']);

                    echo '<div class="my-orders-box">
                    <div class="my-order-details">
                        <h3>Order No: '. $order_no_data['order_no'] .' ('. $total_items .' items)</h3>
                        <span>'. date('d-M-Y', strtotime($order['ordered_time'])) .' at '. date('H:i', strtotime($order['ordered_time']))  .'</span>
                    </div>
                    <div class="my-order-price">
                        <h3>Price</h3>
                        <span><i class="fa-solid fa-indian-rupee-sign"></i> '. number_format($order['amount'], 2) .'/-</span>
                    </div>';

                    if ($order['status'] == "rejected") {
                        echo '<div class="my-order-status">
                            <a href="./bill.php?order_no='.$order_no_data['order_no'].'" class="view-bill">order details</a>
                        </div>
                        <div class="my-order-other-details">
                            <span class="rejected">Rejected</span>
                        </div>';
                    } elseif ($order['status'] == "delivered") {
                        echo '<div class="my-order-status">
                            <a href="./bill.php?order_no='.$order_no_data['order_no'].'" class="view-bill">view bill</a>
                        </div>
                        <div class="my-order-other-details">
                            <span class="delivered">Delivered</span>
                        </div>';
                    } else {
                        echo '<div class="my-order-status">
                            <span class="processing">processing</span>
                            <a href="./bill.php?order_no='.$order_no_data['order_no'].'" class="view-bill">view bill</a>
                        </div>
                        <div class="my-order-other-details">
                            <a href="./Auth/_cancel_order.php?order_id='. $order_id .'" class="cancel-order">Cancel Order</a>
                        </div>';
                    }
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>
    </section>

    <?php include './includes/footer.php'; ?>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
</body>

</html>