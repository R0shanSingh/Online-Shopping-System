<?php
    session_start();

    unset($_SESSION['loggedin']);
    unset($_SESSION['user']);

    $_SESSION['alert'] = true;
    $_SESSION['alert_message'] = "You have been Logged out Successfully";
    
    header("location: /FashionHub/index.php");
    exit();
?>