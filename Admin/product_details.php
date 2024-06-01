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
        if (!isset($_SESSION['admin'])) {
            include './includes/access_denied.php';
            exit();
        }
    ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <section class="unique-product-details-section">
        <div class="go-back">
            <a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>
        <h1>Update Product Details</h1>
        <div class="unique-product-details-container">
            <?php
                include './Classes/database.php';
                include './Classes/fetch.php';

                $product_id = $_GET['product_id'];

                $fetch = new Fetch();

                $product_details = $fetch->get_unique_product_details($product_id);

                echo '<form action="./Operations/_manage_product.php" method="POST" enctype="multipart/form-data">
                <div class="product-form-control">
                    <label for="product_name">Product Name</label>
                    <input type="number" name="product_id" value="'. $product_id .'" hidden>
                    <input type="text" name="product_name" id="product_name" autocomplete="off"
                        placeholder="Enter Product Name" value="'. $product_details['product_name'] .'">
                </div>
                <div class="product-form-control">
                    <label for="product_desc">Product Description</label>
                    <textarea name="product_desc" id="product_desc" cols="30" rows="7" autocomplete="off"
                        placeholder="Enter Product Description">'. $product_details['product_description'] .'</textarea>
                </div>
                <div class="product-form-control">
                    <label for="product_keywords">Product Keywords</label>
                    <textarea name="product_keywords" id="product_keywords" cols="30" rows="7"
                        autocomplete="off" placeholder="Enter Product Keywords">'. $product_details['product_keywords'] .'</textarea>
                </div>
                <div class="product-form-control">
                    <label for="product_price">Product Price</label>
                    <input type="number" name="product_price" id="product_price" autocomplete="off"
                        placeholder="Enter Product Price" value="'. $product_details['product_price'] .'">
                </div>';

                $category = $fetch->get_categories();
                $category_array = $fetch->get_category_array();
                
                echo '<div class="product-form-control">
                    <label for="product_category">Product Category</label>
                    <select name="product_category" id="product_category" value="'. $category_array[$product_details['category_id']] .'">';

                while($row = $category->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="'. $row['category_id'] .'" >'. $row['category_name'] .'</option>';
                }
                    echo '</select>
                </div>';
                
                echo '<div class="product-form-control">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="number" name="product_quantity" id="product_quantity" autocomplete="off"
                        placeholder="Enter Product Quantity" value="'. $product_details['product_quantity'] .'">
                </div>
                <div class="product-form-control">
                    <button type="submit" name="update_product_details">Update Details</button>
                </div>
            </form>';
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Link -->
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
    <script src="./assets/js/products.js"></script>
</body>

</html>