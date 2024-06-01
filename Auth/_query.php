<?php
    session_start();

    if (isset($_POST['reach-us'])) {
        include '../Classes/database.php';
        include '../Classes/contact.php';

        $name = $_POST['contact-username'];
        $email = $_POST['contact-email'];
        $phone_no = $_POST['contact-phoneNo'];
        $mssg = $_POST['contact-mssg'];

        $contact = new Contact($name, $email, $phone_no, $mssg);

        if ($contact->insert_data()) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "You query has been submitted successfult we will reach us soon.";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "We are having a problem. Please try again Later!";
        }

        header("location: /FashionHub/contact.php");
        exit();
    }
?>