<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
    <!-- External CSS Link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- responsive CSS Link -->
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Font Awesome CSS Link -->
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

        if (!isset($_GET['order_no'])) {
            include './includes/page_not_found.php';
            exit();
        }
    ?>

    <!-- Bill Container -->
    <div class="bill-container">
        <div class="bill-header">
            <div class="bill-header-box">
                <a href="./index.php">
                    <img src="./assets/images/logo/logo.png" alt="Website Logo">
                </a>
            </div>
            <div class="bill-header-box">
                <h2>INVOICE</h2>
            </div>
        </div>
        <div class="bill-info">
            <?php
                include './Classes/database.php';
                include './Classes/fetch.php';

                $order_no = $_GET['order_no'];

                $fetch = new Fetch();

                $order_info = $fetch->get_unique_order_info($order_no);

                $row = $order_info->fetch(PDO::FETCH_ASSOC);

                echo '<div class="bill-info-desc">
                    <h3>Billed to :</h3>
                    <h2>'. $row['order_user_name'] .'</h2>
                    <span>Phone : '. $row['order_phone_no'] .'</span>
                    <span>Email : '. $row['order_email'] .'</span>
                    <span>Address : '. $row['order_address'] .'</span>
                </div>
                <div class="bill-info-date">
                    <h3>Order No : '. $order_no .'</h3>
                    <span>'. date('d-M-Y', strtotime($row['ordered_time'])) .' at '. date('H:i', strtotime($row['ordered_time']))  .'</span>
                </div>';
            ?>
        </div>
        <div class="bill-product-details">
            <table>
                <thead>
                    <tr>
                        <th>Product Description</th>
                        <th>Cost</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <?php
                    $product_details = $fetch->get_ordered_products($order_no);

                    while ($record = $product_details->fetch(PDO::FETCH_ASSOC)) {
                        $product = $fetch->get_unique_product($record['product_id']);

                        $product_quantity = $fetch->get_ordered_product_quantity($order_no, $record['product_id']);

                        $subtotal = $product['product_price'];

                        echo '<tbody>
                        <tr>
                            <td>'. $product['product_name'] .'</td>
                            <td>'. $product['product_price'] .'</td>
                            <td>'. $product_quantity .'</td>
                            <td>'. $product['product_price'] * $product_quantity .'</td>
                        </tr>
                        </tbody>';
                    }

                    echo '<tfoot>
                            <tr>
                                <th colspan="2"></th>
                                <td>
                                    <span>Subtotal</span>
                                </td>
                                <td>'. number_format($row['amount'] - ($row['amount'] * 0.05), 2) .'</td>
                            </tr>
                            <tr>
                                <th colspan="2">Payemnt Method : </th>
                                <td>
                                    <span>Tax</span>
                                </td>
                                <td>5%</td>
                            </tr>
                            <tr>
                                <th colspan="2">Cash On Delivery (COD)</th>
                                <td>
                                    <span>Total</span>
                                </td>
                                <td>'. number_format($row['amount'], 2) .'</td>
                            </tr>
                        </tfoot>';
                ?>
            </table>
        </div>
    </div>

    <!-- Bill Footer -->
    <div class="bill-footer">
        <div class="bill-footer-box1">
            <h3>Thank You for your Purchase</h3>
        </div>
        <div class="bill-footer-box2">
            <span>Copyright &copy; FashionHub 2023</span>
        </div>
    </div>
</body>

</html>