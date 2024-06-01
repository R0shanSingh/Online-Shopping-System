<?php 
    session_start();

    if (isset($_POST['login'])) {
        include '../Classes/database.php';
        include '../Classes/fetch.php';

        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        $fetch = new Fetch();

        $result = $fetch->authenticate($email, $password);
        
        if ($result == false) {
            $_SESSION['alert'] = false;
            $_SESSION['alert_message'] = "Invalid Credentials";
        } else {
            $user_id = $result['user_id'];
            $user_name = $result['username'];
            $user_email = $result['user_email'];
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = [
                'id' => $user_id,
                'name' => $user_name,
                'email' => $user_email
            ];
            $_SESSION['alert'] = true;            
            $_SESSION['alert_message'] = "Logged in Successfully";
        }

        header("location: /FashionHub/index.php");
        exit();
    }
?>