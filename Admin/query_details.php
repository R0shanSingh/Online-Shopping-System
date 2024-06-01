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

        if (!isset($_GET['query_id'])) {
            include './includes/page_not_found.php';
            exit();
        }
    ?>

    <?php include './includes/header.php'; ?>

    <section class="query-details-section">
        <div class="go-back">
            <a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>
        <?php
            include './Classes/database.php';
            include './Classes/fetch.php';

            $query_id = $_GET['query_id'];

            $fetch = new Fetch();

            $query_details = $fetch->get_unique_user_query($query_id);

            echo '<div class="query-user-info">
                    <h3>From :</h3>
                    <h2>'. $query_details['username'] .'</h2>
                    <span><b>Email : </b>'. $query_details['email'] .'</span>
                    <span><b>Phone : </b>+91 '. $query_details['phone_no'] .'</span>
                    <span><b>Message : </b>'. $query_details['query_mssg'] .'.</span>
                    <span><b>Date : </b>'. $query_details['timestamp'] .'</span>
                </div>';
        ?>
        <div class="query-reply">
            <form action="./manage_query.php" method="POST">
                <div class="query-reply-box">
                    <input type="text" name="query-email" value="<?php echo $query_details['email']; ?>" hidden>
                    <textarea name="query-mssg" cols="30" rows="8" placeholder="Reply Message"></textarea>
                </div>
                <div class="query-reply-box">
                    <button type="submit" name="query-reply">Send Reply</button>
                </div>
            </form>
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