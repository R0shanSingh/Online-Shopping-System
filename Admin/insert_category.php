<?php
    session_start();

    if (isset($_POST['insert_category'])) {
        include './Classes/database.php';
        include './Classes/category.php';
        include './Classes/fetch.php';

        $category_name = $_POST['category_name'];

        $new_category = new Category($category_name);

        $fetch = new Fetch();

        if ($fetch->check_existing_category($category_name)) {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Category Already Exists";
        } else {
            if ($new_category->insert_category()) {
                $_SESSION['alert'] = true;
                $_SESSION['alert_message'] = "Category Inserted Successfully";
                
            } else {
                $_SESSION['alert'] = false;
                $_SESSION['alert_message'] = "Some Error Occured. Please try again!";
            }
        }    

        header("location: /FashionHub/Admin/index.php");
        exit();
    }   
?>
