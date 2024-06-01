<?php
    if (isset($_SESSION['alert']) && $_SESSION['alert'] == true) {
        include './includes/success.php';
    } elseif (isset($_SESSION['alert']) && $_SESSION['alert'] == false) {
        include './includes/danger.php';
    }

    unset($_SESSION['alert']);
    unset($_SESSION['alert_message']);
?>