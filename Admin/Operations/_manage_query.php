<?php
    session_start();

    if (isset($_SESSION['admin'])) {
        if (isset($_POST['query-reply'])) {
            // // $to = $_POST['query-email'];
            // $to = "vis.shubham2002@gmail.com";
            // $subject = "Your Inquiry At Fashion Hub";
            // $message = $_POST['query-mssg'];
            // $from = "fashion.hui3@gmail.com";

            // $headers = "From : $from";
            // $headers = "From: $from\r\n";
            // $headers .= "Reply-To: $from\r\n";
            // $headers .= "Content-type: text/plain; charset=utf-8\r\n";

            // mail($to, $subject, $message, $headers);
            
            // echo 'Mail Sent';

            
        }
    }
?>