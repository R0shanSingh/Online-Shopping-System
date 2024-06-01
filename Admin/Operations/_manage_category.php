<?php
    session_start();

    // if (isset($_GET['category_id']) && isset($_GET['delete_category'])) {
    //     include '../Classes/database.php';
    //     include '../Classes/fetch.php';

    //     $category_id = $_GET['category_id'];

    //     $fetch = new Fetch();

    //     if($fetch->delete_Category($category_id)) {
    //         $_SESSION['alert'] = false;
    //         $_SESSION['alert_message'] = "Category Deleted Successfully!";
    //     } else {
    //         $_SESSION['alert'] = false;
    //         $_SESSION['alert_message'] = "Some Error Occured. Please try again Later!";
    //     }

    //     header("location: /FashionHub/Admin/index.php");
    //     exit();
    // }

    if (isset($_POST['update-category'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];

        $fetch = new Fetch();

        if ($fetch->update_category($category_id, $category_name)) {
            $_SESSION['alert'] = true;
            $_SESSION['alert_message'] = "Category Updated Successfully!";
        } else {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Some Error Occured. Please try again Later!";
        }

        header("location: /FashionHub/Admin/index.php");
        exit();
    }
?>