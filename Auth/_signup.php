<?php
    session_start();

    if (isset($_POST['signup'])) {
        include '../Classes/database.php';
        include '../Classes/user.php';
        include '../Classes/fetch.php';
        
        $username = $_POST['signup_username'];
        $email = $_POST['signup_email'];
        $password = $_POST['signup_password'];
        $user_pic = "default-user-pic.png";

        $fetch = new Fetch();
        
        if ($fetch->check_email($email)) {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Account Already Exixts with the provided Email";
        } else {
            $user = new User($username, $email, $password, $user_pic);
            $user->push();
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Your Account is created Successfully.";
        } 

        header("location: /FashionHub/index.php");
        exit();
    }
?>