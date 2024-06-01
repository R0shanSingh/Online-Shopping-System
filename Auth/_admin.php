<?php
    session_start();

    if (isset($_POST['admin-signup'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';
        
        $username = $_POST['admin-username'];
        $password = $_POST['admin-password'];

        $fetch = new Fetch();

        if ($fetch->verify_admin($username, $password)) {
            $_SESSION['admin'] = true;
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Welcome Admin !";
            header("location: /FashionHub/Admin/index.php");
            exit();
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Invalid Credentials";
            header("location: /FashionHub/index.php");
            exit();
        }
    }
?>