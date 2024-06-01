<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Shop</title>
    <!-- Favicon Link -->
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.ico" type="image/x-icon">
    <!-- External CSS link -->
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
    
    <!-- Login Signup Modal -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            include './includes/modal.php';
        } 
    ?>

    <?php include './includes/warning.php'; ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- Shop Banner -->
    <main id="shop-banner">
        <h2># NEW ARRIVALS</h2>
    </main>

    <!-- Searched Products Section -->
    <section class="products-section">
        <div class="product-container">
            <!-- Product Box -->
            <?php 
                include './Classes/database.php';
                include './Classes/fetch.php';

                $fetch = new Fetch();

                $records = $fetch->get_all_products();

                $category = $fetch->get_category_array();

                while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product-box show-all-product">
                    <a href="./product_details.php?product_id='.$row['product_id'].'">
                        <img src="./product_images/'. $row['product_image1'] .'">
                        <div class="product-desc">
                            <h4>'. $category[$row['category_id']] .'</h4>
                            <h2>'. substr($row['product_name'], 0, 20) .'...</h2>
                            <div class="product-rating">
                                <i class="fa-solid fa-star"></i>
                                <span>'. $row['product_rating'] .'</span>
                            </div>
                            <h3><i class="fa-solid fa-indian-rupee-sign"></i> '. $row['product_price'] .'</h3>
                        </div>
                    </a>';
                    
                    if (!isset($_SESSION['loggedin'])) {
                        echo '<div class="product-actions">
                            <button class="add_to_cart_warning">Add to Cart</button>
                        </div>';
                    } else {
                        if ($fetch->check_product_in_cart($row['product_id'])) {
                            echo '<div class="product-actions">
                                <a href="./cart.php">ALREADY IN CART</a>
                            </div>';
                        } else {
                            echo '<div class="product-actions">
                                <a href="./Auth/_add_to_cart.php?product_id='. $row['product_id'] .'">ADD TO CART</a>
                            </div>';
                        }
                    }
                    echo '</div>';
                }
            ?>
        </div>
        <div class="show-more">
            <span id="load-more">Load More</span>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Links -->
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/load_more.js"></script>
    <!-- Including Js Files only if necessary -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            echo '<script src="./assets/js/modal.js"></script>';
            echo '<script src="./assets/js/validate.js"></script>';
            echo '<script src="./assets/js/warning.js"></script>';
        }
    ?>
</body>

</html>