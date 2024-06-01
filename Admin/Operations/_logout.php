<?php
    session_start();

    unset($_SESSION['admin']);
    $_SESSION['alert'] = true;
    $_SESSION['alert_message'] = "Logged out Successfully!";
    header("location: /FashionHub/index.php");
?>