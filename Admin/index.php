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

    <?php include './includes/header.php'; ?>

    <!-- Main Section -->
    <section class="website-data">
        <?php
            include './Classes/database.php';
            include './Classes/fetch.php';

            $fetch = new Fetch();

            echo '<div class="website-data-box1">
                <div class="website-status-box">
                    <div class="status-box-logo" id="status-logo1">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="status-data">
                        <span>Customer</span>
                        <h3>'. $fetch->get_total_users() .'</h3>
                    </div>
                </div>
                <div class="website-status-box">
                    <div class="status-box-logo" id="status-logo2">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                    <div class="status-data">
                        <span>Products</span>
                        <h3>'. $fetch->get_total_products() .'</h3>
                    </div>
                </div>
            </div>
            <div class="website-data-box2">
                <div class="website-status-box">
                    <div class="status-box-logo" id="status-logo3">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                    <div class="status-data">
                        <span>Orders</span>
                        <h3>'. $fetch->get_total_orders() .'</h3>
                    </div>
                </div>
                <div class="website-status-box">
                    <div class="status-box-logo" id="status-logo4">
                        <i class="fa-solid fa-clipboard-question"></i>
                    </div>
                    <div class="status-data">
                        <span>Queries</span>
                        <h3>'. $fetch->get_user_queries() .'</h3>
                    </div>
                </div>
            </div>';
        ?>
    </section>

    <!-- admin Operations Control Panel -->
    <section class="admin-actions-section">
        <!-- <h3>Control Panel</h3> -->
        <h3>Administrator Tools</h3>
        <div class="admin-actions">
            <div class="admin-actions-box">
                <button id="view-orders-btn">Manage Orders</button>
            </div>
            <div class="admin-actions-box">
                <button id="add-category-btn">Add New Category</button>
            </div>
            <div class="admin-actions-box">
                <button id="add-product-btn">Add New Product</button>
            </div>
        </div>
        <div class="admin-actions">
            <div class="admin-actions-box">
                <button id="view-queries-btn">Recent Queries</button>
            </div>
            <div class="admin-actions-box">
                <button id="manage-category-btn">Manage Categories</button>
            </div>
            <div class="admin-actions-box">
                <button id="manage-product-btn">Manage Products</button>
            </div>
        </div>
    </section>

    <!-- Admin Operations -->
    <section class="admin-operations">
        <!-- Recent Orders -->
        <div class="recent-orders-section" id="view-orders">
            <?php
                $orders = $fetch->get_user_orders();

                if ($orders == false) {
                    echo '<div class="empty-orders-div">
                    <h3>No Orders Found</h3>
                    </div>';
                } else {
                    echo '<div class="recent-orders-title">
                            <h3>Order Status</h3>
                        </div>
                        <div class="recent-orders-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Ordered Date</th>
                                    <th>Status</th>
                                    <th>More details</th>
                                </tr>
                            </thead>';
    
                        while ($row = $orders->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tbody class="show-all-orders">
                                <tr>
                                    <td>'. $row['order_user_name'] .'</td>
                                    <td>'. $row['order_email'] .'</td>
                                    <td>'. date('d-M-Y', strtotime($row['ordered_time'])) .' At '. date('H:i', strtotime($row['ordered_time']))  .'</td>
                                    <td>
                                        <span class="'. $row['status'] .'">'. $row['status'] .'</span>
                                    </td>
                                    <td>
                                        <a href="./order_details.php?order_id='. $row['order_id'] .'">Manage</a>
                                    </td>
                                </tr>
                            </tbody>';
                        }

                        if ($orders->rowCount() > 10) {
                            echo '<tfoot>
                                <tr>
                                    <td colspan="5" id="show-more">Show All</td>
                                    <td colspan="5" id="all-orders-display">
                                        <span>Showing All Orders</span>
                                    </td>
                                </tr>
                            </tfoot>';
                        } else {
                            echo '<tfoot>
                                <tr>
                                    <td colspan="5">
                                        <span>Showing All Orders</span>
                                    </td>
                                </tr>
                            </tfoot>';
                        }
                        echo '</table>
                    </div>';
                }
            ?>
        </div>

        <!-- Insert Categories -->
        <div class="insert-category-container" id="add-category">
            <h1>Add a New Category</h1>
            <div class="insert-category-form">
                <form action="./insert_category.php" method="post">
                    <div class="category-form-control">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" placeholder="Enter Category Name"
                            required autocomplete="off">
                    </div>
                    <div class="category-form-control">
                        <button type="submit" name="insert_category">Insert Category</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Manage Category -->
        <div class="category-details-section" id="manage-category">
            <h2>Manage Categories</h2>
            <div class="category-details-container">
                <table>
                    <thead>
                        <tr>
                            <th>Category Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $categories = $fetch->get_categories();

                            while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>
                                    <td>
                                        <form action="./Operations/_manage_category.php" method="POST" class="update-category-form">
                                            <input type="number" name="category_id" value="'. $row['category_id'] .'" hidden>
                                            <input type="text" name="category_name" value="'. $row['category_name'] .'" data-original-category-name='. $row['category_name'] .'>
                                            <button type="submit" name="update-category" class="edit-category">Update</button>
                                        </form>
                                    </td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Insert product -->
        <div class="insert-products-container" id="add-product">
            <h1>Add a New Product</h1>
            <!-- Form -->
            <div class="insert-products-form">
                <form action="./insert_product.php" method="post" enctype="multipart/form-data">
                    <div class="product-form-control">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name" autocomplete="off"
                            placeholder="Enter Product Name" required>
                    </div>
                    <div class="product-form-control">
                        <label for="product_desc">Product Description</label>
                        <textarea name="product_desc" id="product_desc" cols="30" rows="7" required autocomplete="off"
                            placeholder="Enter Product Description"></textarea>
                    </div>
                    <div class="product-form-control">
                        <label for="product_keywords">Product Keywords</label>
                        <textarea name="product_keywords" id="product_keywords" cols="30" rows="7" required
                            autocomplete="off" placeholder="Enter Product Keywords"></textarea>
                    </div>
                    <div class="product-form-control">
                        <label for="product_price">Product Price</label>
                        <input type="number" name="product_price" id="product_price" required autocomplete="off"
                            placeholder="Enter Product Price">
                    </div>
                    <div class="product-form-control">
                        <label for="product_category">Product Category</label>
                        <select name="product_category" id="product_category">
                            <!-- Display Category From Database -->
                            <?php
                                $category = $fetch->get_categories();

                                while($row = $category->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="'. $row['category_id'] .'" >'. $row['category_name'] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="product-form-control">
                        <label for="product_quantity">Product Quantity</label>
                        <input type="number" name="product_quantity" id="product_quantity" required autocomplete="off"
                            placeholder="Enter Product Quantity">
                    </div>
                    <div class="product-form-control">
                        <label for="product_image1">Product Image-1</label>
                        <input type="file" name="product_image1" id="product_image1" required autocomplete="off">
                    </div>
                    <div class="product-form-control">
                        <label for="product_image2">Product Image-2</label>
                        <input type="file" name="product_image2" id="product_image2" required autocomplete="off">
                    </div>
                    <div class="product-form-control">
                        <label for="product_image3">Product Image-3</label>
                        <input type="file" name="product_image3" id="product_image3" required autocomplete="off">
                    </div>
                    <div class="product-form-control">
                        <label for="product_image4">Product Image-4</label>
                        <input type="file" name="product_image4" id="product_image4" required autocomplete="off">
                    </div>
                    <div class="product-form-control">
                        <label for="product_image5">Product Image-5</label>
                        <input type="file" name="product_image5" id="product_image5" required autocomplete="off">
                    </div>
                    <div class="product-form-control">
                        <button type="submit" name="insert_products">Insert Product</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Manage Product -->
        <div class="product-details-section" id="manage-product">
            <h2>Manage Products</h2>
            <div class="product-details-container">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $products = $fetch->display_all_products();

                            while ($record = $products->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr class="show-all-products">
                                    <td>
                                        <img src="../product_images/'. $record['product_image1'] .'" alt="Product Image">
                                    </td>
                                    <td>'. $record['product_name'] .'</td>
                                    <td>'. $record['product_quantity'] .'</td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i> '. $record['product_price'] .'</td>
                                    <td>
                                        <div class="product-table-btn">
                                            <a href="./product_details.php?product_id='. $record['product_id'] .'" class="edit-product">Edit</a>
                                            <a href="./Operations/_manage_product.php?product_id='. $record['product_id'] .'&delete_product=true" class="delete-product">Delete</a>
                                        </div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <button id="show-all-product-btn">Show All</button>
                                <span id="show-all-mssg-product">Showing All Results</span>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="recent-queries-section" id="view-queries">
            <?php
                $queries = $fetch->get_user_queries_data();

                if ($queries == false) {
                    echo '<div class="empty-queries-div">
                        <h3>No Queries Found</h3>
                    </div>';
                } else {
                    echo '<div class="recent-queries-title">
                        <h3>Recent Queries</h3>
                    </div>';
                    while ($row = $queries->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="recent-queries-content">
                            <div class="user-info">
                                <div class="user-image">
                                    <img src="./assets/images/profile/profile-pic.png">
                                </div>
                                <div class="user-data">
                                    <h3>'. $row['username'] .'</h3>
                                    <span>'. date('d-M-Y', strtotime($row['timestamp'])) .' at '. date('H:i', strtotime($row['timestamp'])) .'</span>
                                </div>
                            </div>
                            <div class="user-mssg">
                                <p>'. $row['query_mssg'] .'</p>
                            </div>
                            <!-- <div class="user-more-info">
                                <a href="./query_details.php?query_id='. $row['query_id'] .'">Reply</a>
                            </div> -->
                        </div>';
                    }
                 }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Link -->
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/products.js"></script>
    <script src="./assets/js/update_category.js"></script>
    <script src="./assets/js/show_all.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
</body>

</html>