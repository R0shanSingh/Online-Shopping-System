<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Contact us</title>
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

    <?php include './Auth/_alert.php'; ?>
    <!-- Login Signup Modal -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            include './includes/modal.php';
        } 
    ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- Contact Section -->
    <section id="contact-section">
        <!-- Contact Top -->
        <div id="contact-top">
            <h3>Get in Touch with Us</h3>
            <h2>Contact Us</h2>
            <div id="under-line">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p class="contact-text">The company itself is a very successful company. It is easy to assume that those who are hindered by the way of escape must laboriously want to reject any other body, for especially, the option of following those who are suffering.</p>
        </div>
        <!-- Contact Body -->
        <div id="contact-body">
            <!-- Contact Info -->
            <div id="contact-info">
                <div class="contact-info-box">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <h3>Phone no.</h3>
                    <p>1-2345-6789-2</p>
                </div>
                <div class="contact-info-box">
                    <i class="fa-solid fa-envelope"></i>
                    <h3>Email</h3>
                    <p>fashionhub@gmail.com</p>
                </div>
                <div class="contact-info-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h3>Address</h3>
                    <p>Project, Techno College Hooghly</p>
                </div>
            </div>
            <div id="contact-form">
                <!-- Contact Form -->
                <div id="contact-form-content">
                    <form action="./Auth/_query.php" id="contact-submit-form" method="post">
                        <div class="contact-form-control">
                            <input type="text" name="contact-username" id="contact-username" placeholder="Full Name" autocomplete="off" required>
                        </div>
                        <div class="contact-form-control">
                            <input type="text" name="contact-email" id="contact-email" placeholder="Email" autocomplete="off" required>
                            <input type="text" maxlength="10" name="contact-phoneNo" id="contact-phoneNo" placeholder="Phone Number" required autocomplete="off">
                        </div>
                        <div class="contact-form-control">
                            <textarea name="contact-mssg" id="contact-mssg" cols="30" rows="10" placeholder="Message" required minlength="30"></textarea>
                        </div>
                        <button type="submit" name="reach-us" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <!-- Contact Image -->
                <div id="contact-img">
                    <img src="./assets/images/contact/contact-png.png" alt="contact us">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Links -->
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/contactus.js"></script>
    <script src="./assets/js/success.js"></script>
    <!-- Including Js Files only if necessary -->
    <?php
        if (!isset($_SESSION['loggedin'])) {
            echo '<script src="./assets/js/modal.js"></script>';
            echo '<script src="./assets/js/validate.js"></script>';
        }
    ?>
</body>

</html>