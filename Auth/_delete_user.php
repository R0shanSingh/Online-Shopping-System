<?php
    session_start();

    if (isset($_SESSION['loggedin'])) {
        if (isset($_GET['delete_account'])) {
            include '../Classes/database.php';
            include '../Classes/Fetch.php';
    
            $user_id = $_SESSION['user']['id'];
    
            $fetch = new Fetch();
    
            if ($fetch->remove_user($user_id)) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Account Deleted Successfully!";
                unset($_SESSION['loggedin']);
                unset($_SESSION['user']);
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "Some Error Occured. Please try agian Later.";
            }
    
            header("location: /FashionHub/index.php");
            exit();
        }
    }
?>