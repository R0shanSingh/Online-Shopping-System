<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - About us</title>
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
    <!-- Login Signup Modal -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            include './includes/modal.php';
        }
    ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- About Banner -->
    <section id="about-banner">
        <h2># know us</h2>
        <p>Fashion Hub - Your Ultimate Destination for Stylish Clothing and Accessories!</p>
    </section>

    <!-- About Content Section -->
    <section id="about-body">
        <div id="about-body-img">
            <img src="./assets/images/banner/b19.jpg" alt="">
        </div>
        <div id="about-body-content">
            <h3>Who we are ?</h3>
            <p>At Fashion Hub, we're more than just an online store. We're a passionate team of fashion enthusiasts
                dedicated to bringing you the latest trends and timeless classics in men's and women's clothing, shoes,
                and bags. Our mission is to help you express your unique style and personality through the art of
                fashion.</p>
            <p>Fashion Hub was founded by a group of fashion lovers who saw a need for a curated and customer-focused
                fashion destination. Our journey began with a vision to create an online space where fashion meets
                quality, style meets affordability, and customers are treated like family.</p>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Links -->
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/animation.js"></script>
    <!-- Including Js Files only if necessary -->
    <?php
    if (!isset($_SESSION['loggedin'])) {
        echo '<script src="./assets/js/modal.js"></script>';
        echo '<script src="./assets/js/validate.js"></script>';
    }
    ?>
</body>

</html>