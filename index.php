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
    <!-- <link rel="stylesheet" href="./assets/css/font-awesome.css"> -->
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

    <?php 
        include './Auth/_alert.php';
        include './includes/warning.php';
    ?>
    
    <!-- Login Signup Modal -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            include './includes/modal.php';
        }
    ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- Main Section -->
    <section id="banner">
        <div id="banner-content">
            <h3>Welcome to</h3>
            <h1>Fashion Hub</h1>
            <h1>Ultimate Destination for</h1>
            <h2>Stylish Clothing and Accessories</h2>
            <a href="./shop.php" class="btn btn-primary">Shop Now</a>
        </div>
    </section>

    <!-- Collection Section -->
    <section id="collections">
        <div id="collections-title">
            <h2>Shop By Categories</h2>
        </div>
        <div id="collections-content">
            <div id="collection-box1">
                <div class="collection-box-content">
                    <span>Men's Collection</span>
                </div>
            </div>
            <div id="collection-box2">
                <div class="collection-box-content">
                    <span>Women's Collection</span>
                </div>
            </div>
            <div id="collection-box3">
                <div class="collection-box-content">
                    <span>Accessories</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending Products Section -->
    <section class="trending-products">
        <div class="trending-product-title">
            <h2 class="trending-product-title-h2">Men's T-shirt Collection</h2>
        </div>
        <div class="product-container reveal">
            <!-- Product Box -->
            <?php 
                include './Classes/database.php';
                include './Classes/fetch.php';

                $fetch = new Fetch();

                $records = $fetch->get_specific_product(1);

                $category = $fetch->get_category_array();

                while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product-box">
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
        <div class="show-more reveal">
            <a href="./searched_products.php?search_data_query=tshirt"><i class="fa-regular fa-eye"></i> See More</a>
        </div>
    </section>

    <!-- Womens Collection Explore More Section -->
    <section class="reveal" id="explore-more">
        <div id="explore-img">
            <img src="./assets/images/banner/explore.png" alt="Explore More">
        </div>
        <div id="explore-desc">
            <h3>Best Savings on<br>new arrivals</h3>
            <p>Fashion Hub - Your Ultimate Destination for Stylish Clothing and Accessories - Discover the Latest Trends
                and Elevate Your Style</p>
            <a href="./shop.php">Shop Now</a>
        </div>
    </section>

    <!-- Womens Collection Section -->
    <section class="trending-products">
        <div class="trending-product-title">
            <h2 class="trending-product-title-h2">Women's Top Collection</h2>
        </div>
        <div class="product-container reveal">
            <!-- Product Box -->
            <?php 
                $records = $fetch->get_specific_product(2);

                while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product-box">
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
                        </div>
                    </div>';
                    } else {
                        if ($fetch->check_product_in_cart($row['product_id'])) {
                            echo '<div class="product-actions">
                                <a href="./cart.php">ALREADY IN CART</a>
                            </div>
                        </div>';
                        } else {
                            echo '<div class="product-actions">
                                <a href="./Auth/_add_to_cart.php?product_id='. $row['product_id'] .'">ADD TO CART</a>
                            </div>
                        </div>';
                        }
                    }
                }
            ?>
        </div>
        <div class="show-more reveal">
            <a href="./searched_products.php?search_data_query=top"><i class="fa-regular fa-eye"></i> See More</a>
        </div>
    </section>

    <!-- Shoes New Arrivals Banner -->
    <section class="reveal" id="shoes-new-arrivals">
        <div class="shoes-new-arrivals-img" id="shoes-new-arrivals-img1">
            <img src="./assets/images/Collection/shoe-8.jpg" alt="Shoe">
        </div>
        <div id="shoes-new-arrivals-content">
            <h4>Fashion Hub</h4>
            <h2>Shoes Collection</h2>
            <h3>New Arrivals</h3>
            <a href="./searched_products.php?search_data_query=shoes">Shop Now</a>
        </div>
        <div class="shoes-new-arrivals-img" id="shoes-new-arrivals-img2">
            <img src="./assets/images/Collection/shoe-9.jpg" alt="Shoe">
        </div>
    </section>

    <!-- Shoes Section -->
    <section id="shoes-recent-launch">
        <div id="shoes-recent-launch-title">
            <h2>Shoes Collection</h2>
        </div>
        <div class="product-container reveal">
            <!-- Product Box -->
            <?php 
                $statement = $fetch->get_specific_product(3);

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="product-box">
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
                        </div>
                    </div>';
                    } else {
                        if ($fetch->check_product_in_cart($row['product_id'])) {
                            echo '<div class="product-actions">
                                <a href="./cart.php">ALREADY IN CART</a>
                            </div>
                        </div>';
                        } else {
                            echo '<div class="product-actions">
                                <a href="./Auth/_add_to_cart.php?product_id='. $row['product_id'] .'">ADD TO CART</a>
                            </div>
                        </div>';
                        }
                    }
                }
            ?>
        </div>
        <div class="show-more reveal">
            <a href="./searched_products.php?search_data_query=shoes"><i class="fa-regular fa-eye"></i> See More</a>
        </div>
    </section>

    <!-- Why Shop with us section -->
    <section id="shop-with-us">
        <h2>Why Shop with us</h2>
        <div id="trust" class="reveal">
            <div id="trust-container1">
                <div class="trust-box">
                    <img src="./assets/images/trusts/fast-delivery.png" alt="Fast Delivery">
                    <h3>Fast Delivery</h3>
                    <span>Free Delivery on Orders over 499</span>
                </div>
                <div class="trust-box">
                    <img src="./assets/images/trusts/money-back-guarantee.png" alt="Money back">
                    <h3>Money Back Gurantee</h3>
                    <span>If goods have problem.</span>
                </div>
            </div>
            <div id="trust-container2">
                <div class="trust-box">
                    <img src="./assets/images/trusts/secure-payment.png" alt="Secure Payment">
                    <h3>Secure Payment</h3>
                    <span>100% Secure Payment</span>
                </div>
                <div class="trust-box">
                    <img src="./assets/images/trusts/badge.png" alt="Trusted">
                    <h3>Best Quality</h3>
                    <span>Trustful Company</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Links -->
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/animation.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
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