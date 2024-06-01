<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Checkout</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
    <!-- External CSS Link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="body">
    <!-- Server Error -->
    <?php
        include './includes/check_connection.php';

        if (!isConnected()) {
            include './includes/server_error.php';
            exit();
        }
    ?>

    <!-- Unauthorized User View -->
    <?php
        if (!isset($_GET['product_id']) && !isset($_GET['cart_items'])) {
            include './includes/page_not_found.php';
            exit();
        }
    ?>

    <header id="checkout-header">
        <div id="checkout-logo">
            <a href="./index.php">
                <img src="./assets/images/logo/logo.png" alt="Website Logo">
            </a>
        </div>
        <i class="fa-solid fa-lock"></i>
    </header>

    <div id="checkout-title">
        <h1>Checkout</h1>
    </div>

    <section id="checkout-section">
        <div id="checkout-body">
            <!-- Left Side -->
            <div id="checkout-form">
                <h2>Billing Details</h2>
                <?php
                    include './Classes/database.php';
                    include './Classes/fetch.php';

                    $fetch = new Fetch();

                    $user_info = $fetch->get_user_details($_SESSION['user']['id']);

                    $user_details = $user_info->fetch(PDO::FETCH_ASSOC);
                    
                    if (isset($_GET['product_id'])) {
                        $product_id = $_GET['product_id'];
                    }
                    echo '<form action="./Auth/_checkout.php" method="POST" id="checkout-main-form">
                        <div class="checkout-form-box">
                            <label for="checkout-name">Name</label>
                            <input type="text" name="checkout-name" id="checkout-name" value="'. $user_details['username'] .'" placeholder="Enter Full Name" required autocomplete="off">
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-email">Email</label>
                            <input type="text" name="checkout-email" id="checkout-email" value="'. $user_details['user_email'] .'" placeholder="Email" readonly>
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-phone-no">Contact Number</label>
                            <input type="text" id="checkout-phone-no" name="checkout-phone-no" value="'. $user_details['user_phone_no'] .'" maxlength="10" placeholder="Phone number" required autocomplete="off">
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-address">Address</label>
                            <textarea name="checkout-address" id="checkout-address" cols="30" rows="5" placeholder="Full Address" required autocomplete="off"></textarea>
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-city">City</label>
                            <input type="text" name="checkout-city" id="checkout-city" value="'. $user_details['city'] .'" placeholder="City" required autocomplete="off">
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-zipcode">Zip Code</label>
                            <input type="text" name="checkout-zipcode" id="checkout-zipcode" value="'. $user_details['zip_code'] .'" placeholder="Zip Code" required autocomplete="off">
                        </div>
                        <div class="checkout-form-box">
                            <label for="checkout-state">State</label>
                            <input type="text" name="checkout-state" id="checkout-state" value="'. $user_details['state'] .'" placeholder="State" required autocomplete="off">
                        </div>
                        <div class="checkout-form-box">
                            <span><b>Payment :</b> Cash on Delivery (COD)</span>
                        </div>';
                        if (isset($_GET['product_id'])) {
                            echo '<div class="checkout-form-box">
                                <input type="number" name="checkout-product_id" value="'. $product_id .'" hidden>
                                <button type="submit" name="confirm-order">Confirm Order</button>
                            </div>'; 
                        }
                        if (isset($_GET['cart_items'])) {
                            echo '<div class="checkout-form-box">
                            <button type="submit" name="confirm-order-cart-items">Confirm Order</button>
                            </div>';
                        }
                    echo '</form>';
                ?>
            </div>
            <!-- Right Side -->
            <div id="checkout-total">
                <div id="checkout-total-container">
                    <h2>Checkout Information</h2>
                    <?php
                        if (isset($_GET['product_id'])) {
                            $record = $fetch->get_unique_product($product_id);
                            
                            $total_products = 1;

                            $total_items = 1;

                            $sub_total = $record['product_price'];

                            $tax = $record['product_price'] * 0.05;

                            $grand_total = $sub_total + $tax;
                        }
                        if (isset($_GET['cart_items'])) {
                            $records = $fetch->get_cart_items($_SESSION['user']['id']);

                            $total_products = $records->rowCount();
                            $total_items = $fetch->get_cart_product_total_quantity($_SESSION['user']['id']);

                            $sub_total = 0;

                            while ($record = $records->fetch(PDO::FETCH_ASSOC)) {
                                $row = $fetch->get_unique_product($record['product_id']);
                                $quantity = $fetch->get_cart_product_quantity($record['product_id'], $_SESSION['user']['id']);
                                $sub_total += $row['product_price'] * $record['quantity'];
                            }

                            $tax = $sub_total * 0.05;

                            $grand_total = $sub_total + $tax;
                        }
                        echo '<div class="checkout-total-box">
                            <h3>Total Products</h3>
                            <span>'. $total_products .'</span>
                            </div>
                            <div class="checkout-total-box">
                                <h3>Total Items</h3>
                                <span>'. $total_items .'</span>
                            </div>
                            <div class="checkout-total-box">
                                <h3>Subtotal</h3>
                                <span>'. number_format($sub_total, 2) .'</span>
                            </div>
                            <div class="checkout-total-box">
                                <h3>Tax(5%)</h3>
                                <span>'. number_format($tax, 2) .'</span>
                            </div>
                            <hr>
                            <div class="checkout-total-box">
                                <h3>Grand Total</h3>
                                <span>'. number_format($grand_total, 2) .'</span>
                            </div>
                            <hr>
                            <div id="checkout-total-btn1">
                                <a href="./shop.php">Continue Shopping</a>
                            </div>
                            <div id="checkout-total-btn2">
                                <a href="./index.php">Go back to Home</a>
                            </div>';
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="order-info">
        <h3>Need help? Check our Contact Page and Reach us</h3>
        <p>When your order is placed, we'll send you an e-mail message acknowledging receipt of your order. If you choose to pay using an electronic payment method (credit card, debit card or net banking), you will be directed to your bank's website to complete your payment. Your contract to purchase an item will not be complete until we receive your electronic payment and dispatch your item. If you choose to pay using Pay on Delivery (POD), you can pay when you receive your item.</p>
    </section>

    <footer id="checkout-footer">
        <span>Copyright &copy; Fashion Hub 2023</span>
        <span>Need help? Visit <a href="./contact.php">Contact us</a></span>
    </footer>

    <script src="./assets/js/checkout.js"></script>
</body>

</html>