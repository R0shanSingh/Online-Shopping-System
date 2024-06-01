<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - My Cart</title>
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
        if (!isset($_SESSION['loggedin'])) {
            include './includes/access_denied.php';
            exit();
        }
    ?>
    <!-- Alert include -->
    <?php include './Auth/_alert.php'; ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- Cart Section -->
    <section id="cart">
        <?php
            include './Classes/database.php';
            include './Classes/fetch.php';

            $user_id = $_SESSION['user']['id'];

            $fetch = new Fetch();

            $result = $fetch->check_cart_items($user_id);

            $category = $fetch->get_category_array();

            if ($result != false) {
                echo '<div id="cart-details">
                    <div id="cart-title">
                        <h2>Your Shopping Cart</h2>
                    </div>
                    <div class="cart-items">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Remove</th>
                            </tr>
                        </thead>';

                $num_of_products = $result->rowCount();

                $num_of_items = 0;

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $product_id = $row['product_id'];

                    $result2 = $fetch->display_cart_item($product_id);

                    $num_of_items += $row['quantity'];

                    $products = $result2->fetch(PDO::FETCH_ASSOC);
                
                    echo '<tbody>
                            <tr>
                                <td>
                                    <img src="./product_images/'. $products['product_image1'] .'" alt="Product Image">
                                </td>
                                <td>'. $products['product_name'] .'</td>
                                <td>'. $products['product_price'] * $row['quantity'] .'</td>
                                <td>
                                <form action="./Auth/_cart.php" method="POST" class="update-quantity-form">
                                    <input type="number" name="product_id" value="'. $product_id .'" hidden>
                                    <input type="number" name="product-quantity" value="'. $row['quantity'] .'" min="1" max="10" class="product-quantity" data-original-quantity="'. $row['quantity'] .'">
                                    <button type="submit" name="product-quantity-update">Update</button>
                                </form>
                                </td>
                                <td>
                                    <a href="./Auth/_cart.php?remove_item='. $product_id .'" >Remove</a>
                                </td>
                            </tr>
                        </tbody>';
                }

                echo '</table>
                    </div>
                </div>';

                $cart_total = $fetch->get_cart_total_price($user_id);

                echo '<div id="cart-price">
                    <div id="price-container">
                    <div class="total-price-box">
                        <h4>Total Price : </h4>
                        <div>
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <span id="cart-total-price-js">'. number_format($cart_total, 2) .'</span>
                        </div>
                    </div>
                    <div class="total-price-box">
                        <h4>Total Products : </h4>
                        <span>'. $num_of_products .'</span>
                    </div>
                    <div class="total-price-box">
                        <h4>Total Items : </h4>
                        <span>'. $num_of_items .'</span>
                    </div>
                    <div class="total-price-box">
                        <h4>Tax (5%) : </h4>
                        <div>
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <span id="tax">'. number_format(($cart_total * 0.05), 2) .'</span>
                        </div>
                    </div>
                    <hr />
                    <div class="total-price-box">
                        <h4>Total Price : </h4>
                        <div>
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <span id="cart-grand-total-price-js">'. number_format(($cart_total + ($cart_total * 0.05)), 2) .'</span>
                        </div>
                    </div>
                    <div id="checkout-btn">
                        <a href="./checkout.php?cart_items" id="btn1">Checkout</a>
                        <a href="./Auth/_cart.php?remove_all=true" id="btn2">Remove all</a>
                    </div>
                </div>';
            } else {
                echo '<div id="no-products-cart">
                    <img src="./assets/images/cart/cart-1.png" />
                </div>';
            }       
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/cart_quantity_update.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
</body>

</html>