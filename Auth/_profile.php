<?php
    session_start();

    if (isset($_SESSION['loggedin'])) {
        if (isset($_POST['profile_update'])) {
            include '../Classes/database.php';
            include '../Classes/fetch.php';
            
            $user_id = $_SESSION['user']['id'];
            $username = $_POST['profile_user_name'];
            $user_phone_no = $_POST['profile_user_phone_no'];
            $user_city = $_POST['profile_user_city'];
            $user_zipcode = $_POST['profile_user_zipcode'];
            $user_state = $_POST['profile_user_state'];

            $fetch = new Fetch();

            if ($fetch->update_profile($user_id, $username, $user_phone_no, $user_city, $user_zipcode, $user_state)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Profile Updated Successfully";
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "Some Error Occured. Please try again later!";
            }

            header("location: /FashionHub/profile.php");
            exit();
        }

        if (isset($_POST['confirm-password-btn'])) {
            include '../Classes/database.php';
            include '../Classes/fetch.php';

            $user_id = $_SESSION['user']['id'];
            $confirm_passwrod = $_POST['confirm-password'];
            $new_passwrod = $_POST['new-password'];
            $reenter_passwrod = $_POST['reenter-password'];

            $fetch = new Fetch();

            if ($fetch->confirm_password($user_id, $confirm_passwrod)) {
                if ($fetch->update_user_password($user_id, $new_passwrod)) {
                    $_SESSION['alert'] = true;
                    $_SESSION['alert_message'] = "Password Changed Successfully!";
                } else {
                    $_SESSION['alert'] = false;
                    $_SESSION['alert_message'] = "We are having a problem. Please try again later!";
                }
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "Password didn't Match"; 
            }

            header("location: /FashionHub/profile.php");
            exit();
        }

        if (isset($_FILES["profile-pic"])) {
            include '../Classes/database.php';
            include '../Classes/fetch.php';

            $user_id = $_SESSION['user']['id'];
            $profile_pic = $_FILES['profile-pic']['name'];
            $temp_profile_pic = $_FILES['profile-pic']['tmp_name'];

            $fetch = new Fetch();

            if ($fetch->update_profile_pic($user_id, $profile_pic)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Profile Picture Updated Successfully!";
                move_uploaded_file($temp_profile_pic, "../product_images/profile_pic/$profile_pic");
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "We are having a problem. Please try again later!";
            }

            header("location: /FashionHub/profile.php");
            exit();
        }
    }
?>