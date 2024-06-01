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
        if (!isset($_GET['product_id'])) {
            include './includes/page_not_found.php';
            exit();
        }
    ?>

    <!-- Alert include -->
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

    <!-- Product Details -->
    <section id="product">
        <?php 
            include './Classes/database.php';
            include './Classes/fetch.php';

            $product_id = $_GET['product_id'];

            $fetch = new Fetch();

            $record = $fetch->get_unique_product($product_id);

            $category = $fetch->get_category_array();

            echo '<div id="product-images">
                <img src="./product_images/'. $record['product_image1'] .'" id="mainImage">
                <div id="product-bottom-images">
                    <div class="pro-small-img">
                        <img src="./product_images/'. $record['product_image2'] .'" class="smallImage">
                    </div>
                    <div class="pro-small-img">
                        <img src="./product_images/'. $record['product_image3'] .'" class="smallImage">
                    </div>
                    <div class="pro-small-img">
                        <img src="./product_images/'. $record['product_image4'] .'" class="smallImage">
                    </div>
                    <div class="pro-small-img">
                        <img src="./product_images/'. $record['product_image5'] .'" class="smallImage">
                    </div>
                </div>
            </div>';

            echo '<div id="product-details">
            <div id="product-title">
                <h3>'. $record['product_name'] .'</h3>
            </div>
            <div class="product-rating-box">
                <span><i class="fa-solid fa-star"></i> '. $record['product_rating'] .'</span>
            </div>
            <div id="product-price">
                <span><i class="fa-solid fa-indian-rupee-sign"></i> '. $record['product_price'] .' /-</span>
            </div>
            <div id="product-desc">
                <h2>Product Details</h2>
                <p>'. $record['product_description'] .'</p>
            </div>';
            if (isset($_SESSION['loggedin'])) {
                echo '<div id="product-actions">';

                    if ($fetch->check_product_in_cart($product_id)) {
                        echo '<a href="./cart.php" id="added-to-cart"><i class="fa-solid fa-circle-check" id="added-to-cart-icon"></i> Added to Cart</a>';
                    } else {
                        echo '<a href="./Auth/_add_to_cart.php?product_id='. $product_id .'">Add to Cart</a>';
                    }
                    echo '<a href="./checkout.php?product_id='.$product_id.'">Buy Now</a>
                    </div>';
            } else {
                echo '<div id="product-actions">
                    <button class="add_to_cart_warning">Add to Cart</button>
                    <button class="add_to_cart_warning">Buy Now</button>
                </div>';
            }
            echo '</div>';
        ?>
    </section>

    <!-- Product Review -->
    <section id="product-review">
        <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<h3>Review this Product</h3>';

                $user_id = $_SESSION['user']['id'];

                if ($fetch-> get_unique_user_review($user_id, $product_id)) {
                    echo '<div class="login-to-review-box">
                        <h2>You have already rated this product</h2>
                    </div>';
                } else {
                    echo '<form action="./Auth/_review.php?product_id='. $product_id .'" id="review-form" method="post">
                        <div id="product-star-rating">
                            <input type="number" name="rating" id="user-rating" hidden required>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                            <textarea name="product-review" placeholder="Write your Review...." id="product-review-comment" cols="30"
                                rows="10"></textarea>
                            <input type="submit" value="Submit" name="review" id="submit-review" class="btn btn-primary">
                        </form>';
                }
            } else {
                echo '<div class="login-to-review-box">
                    <h2>You are not Logged in</h2>
                    <span>Please Login to review this Product</span>
                </div>';
            }        
        ?>
    </section>

    <!-- User Reviews -->
    <section id="user-reviews">
        <h2>Ratings & Reviews</h2>
        <?php
            $product_reviews = $fetch->get_product_reviews($product_id);

            if ($product_reviews == false) {
                echo '<div id="no-review-yet-box">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>No Review Found for this Product</span>
                </div>';
            } else {
                while ($row = $product_reviews->fetch(PDO::FETCH_ASSOC)) {
                    $user_id = $row['user_id'];
                    $user_reviews = $fetch->get_user_reviews($user_id);

                    // $user_reviews will be equal to false if a user who has given review but deleted his account later.
                    if ($user_reviews == false) {
                        echo '<div class="user-review-and-comments">
                        <div class="user-info">
                            <div class="user-image">
                                <img src="./assets/images/profile/profile-pic.png">
                            </div>
                        <div class="user-data">
                        <h3>Deleted Account</h3>';
                    } else {
                        echo '<div class="user-review-and-comments">
                        <div class="user-info">
                            <div class="user-image">
                                <img src="./product_images/profile_pic/'. $user_reviews['user_pic'] .'">
                            </div>
                        <div class="user-data">
                        <h3>'. $user_reviews['username'] .'</h3>';
                    }

                    echo '<span>'. date('d-M-Y', strtotime($row['timestamp'])) .' at '. date('H:i', strtotime($row['timestamp'])) .'</span>
                        </div>
                    </div>
                    <div class="user-comment">
                        <span> '. $row['rating'] .' <i class="fa-solid fa-star"></i></span>
                        <p>'. $row['review'] .'</p>
                    </div>
                    </div>';
                }

                if ($product_reviews->rowCount() > 3) {
                    echo '<div class="more-comments">
                            <button id="view-all-reviews">View More</button>
                            <span id="viewing-all-reviews">Showing All Reviews</span>
                    </div>';
                } else {
                    echo '<div class="more-comments">
                            <span>Showing All Reviews</span>
                    </div>';
                }
            }
        ?>
        
    </section>

    <!-- Related Products -->
    <section id="related-products">
        <h1>Related Products</h1>
        <div class="product-container">
            <!-- Link -->
            <?php
                $releated_products = $fetch->related_products($product_id);

                if ($releated_products == false) {
                    echo '<div class="login-to-review-box">
                        <h2>No Related Products Available</h2>
                    </div>';
                } else {
                    while ($row = $releated_products->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="product-box">
                            <a href="./product_details.php?product_id='. $row['product_id'] .'">    
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
                }
            ?>
        </div>
        <div class="show-more">
            <a href="./shop.php"><i class="fa-regular fa-eye"></i> SEE MORE</a>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Link -->
    <script src="./assets/js/product.js"></script>
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/rating.js"></script>
    <script src="./assets/js/show_all_reviews.js"></script>
    <!-- Including Js Files only if necessary -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            echo '<script src="./assets/js/warning.js"></script>';
            echo '<script src="./assets/js/modal.js"></script>';
            echo '<script src="./assets/js/validate.js"></script>';
        } else {
            echo '<script src="./assets/js/success.js"></script>';
            echo '<script src="./assets/js/danger.js"></script>';
        }
    ?>
</body>

</html>