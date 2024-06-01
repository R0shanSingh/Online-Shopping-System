<!-- Starting the session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Profile</title>
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

    <!-- Alert Include -->
    <?php include './Auth/_alert.php'; ?>

    <?php include './includes/popup.php'; ?>

    <!-- Header -->
    <?php include './includes/header.php'; ?>

    <!-- User Profile Details -->
    <section id="profile-details">
        <div id="profile-container">
                <?php
                    include './Classes/database.php';
                    include './Classes/fetch.php';

                    $fetch = new Fetch();

                    $user_info = $fetch->get_user_details($_SESSION['user']['id']);

                    $row = $user_info->fetch(PDO::FETCH_ASSOC);

                    echo '<div id="profile-box1">
                        <img src="./product_images/profile_pic/'. $row['user_pic'] .'" alt="Profile pic">
                        <i class="fa-solid fa-arrow-up-from-bracket" id="profile-change-icon"></i>
                        <h3 id="profile-change-text">Change Profile Picture</h3>
                        <form action="./Auth/_profile.php" method="POST" enctype="multipart/form-data" id="profile-pic-form">
                            <input type="file" name="profile-pic" id="profile-pic" hidden>
                        </form>
                    </div>
                    <div id="profile-box2">
                        <h2>Personal Information</h2>
                    <div id="user-details">
                    <form action="./Auth/_profile.php" method="POST" id="update-profile-form">
                        <div class="info-box delete-account">
                            <div class="info-box-child">
                                <h3>Delete your Account :</h3>
                            </div>
                            <div class="info-box-child">
                                <a class="delete-account-btn" id="delete-account-btn">Delete</a>
                            </div>
                        </div>
                        <div class="info-box">
                            <h3>Profile Name : </h3>
                            <input type="text" name="profile_user_name" id="profile_user_name" value="'. $row['username'] .'">
                        </div>
                        <div class="info-box">
                            <div class="info-box-child">
                                <h3>Email :</h3>
                                <span>'. $row['user_email'] .'</span>
                            </div>
                            <div class="info-box-child">
                                <h3>Phone no :</h3>
                                <input type="text" name="profile_user_phone_no" id="profile_user_phone_no" value="'. $row['user_phone_no'] .'">
                            </div>
                        </div>
                        <div class="info-box">
                            <a id="change-password" title="Change password">Change Password</a>
                        </div>
                        <div class="info-box">
                            <div class="info-box-child">
                                <h3>City :</h3>
                                <input type="text" name="profile_user_city" id="profile_user_city" value="'. $row['city'] .'">
                            </div>
                            <div class="info-box-child">
                                <h3>Zip Code :</h3>
                                <input type="number" name="profile_user_zipcode" id="profile_user_zipcode" value="'. $row['zip_code'] .'">
                            </div>
                            <div class="info-box-child">
                                <h3>State :</h3>
                                <input type="text" name="profile_user_state" id="profile_user_state" value="'. $row['state'] .'">
                            </div>
                        </div>
                        <div class="info-box">
                            <button type="submit" name="profile_update" id="user-profile-cancel-btn1">Update Profile</button>
                        </div>
                    </form>
                </div>
                <div id="change-password-container">
                    <div class="info-pass-box">
                        <a id="go-back-to-profile"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
                    </div>
                    <form action="./Auth/_profile.php" method="POST" id="change_pass_form">
                        <div class="info-pass-box">
                            <label for="confirm-password">Old Password</label>
                            <input type="password" name="confirm-password" id="old-pass-input" placeholder="Enter your Password" minlength="8">
                            <i class="fa-regular fa-eye-slash eye-icon" id="old-pass-eye-icon"></i>
                        </div>
                        <div class="info-pass-box">
                            <label for="confirm-password">New Password</label>
                            <input type="password" name="new-password" id="new-password" placeholder="Enter your Password" minlength="8">
                            <i class="fa-regular fa-eye-slash eye-icon" id="new-pass-eye-icon"></i>
                        </div>
                        <div class="info-pass-box" id="alert" style="display:none">
                            <h3 >Note: New password should not same as old password</h3>
                        </div>
                        <div class="info-pass-box">
                            <label for="confirm-password">Re-enter Password</label>
                            <input type="password" name="reenter-password" id="reenter-password" placeholder="Enter your Password" minlength="8">
                            <i class="fa-regular fa-eye-slash eye-icon" id="confirm-pass-eye-icon"></i>
                        </div>
                        <div class="info-pass-box">
                            <button type="submit" name="confirm-password-btn">Change Password</button>
                        </div>
                    </form>            
                </div>';
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <!-- External Js Links -->
    <script src="./assets/js/bars.js"></script>
    <script src="./assets/js/profile.js"></script>
    <script src="./assets/js/success.js"></script>
    <script src="./assets/js/danger.js"></script>
    <script src="./assets/js/popup.js"></script>
    <script src="./assets/js/profile_password_change.js"></script>
    <script src="./assets/js/profile_pic_change.js"></script>
</body>

</html>