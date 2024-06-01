<?php
    class Contact extends Database {
        private $user_name;
        private $user_email;
        private $user_phone_no;
        private $user_mssg;

        function __construct($user_name, $user_email, $user_phone_no, $user_mssg) {
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_phone_no = $user_phone_no;
            $this->user_mssg = $user_mssg;

            parent::__construct();
        }

        function insert_data() {
            $query = "INSERT INTO `queries` (`username`, `email`, `phone_no`, `query_mssg`, `timestamp`) VALUES (:user_name, :email, :phone_no, :mssg, NOW())";
            $result = $this->connection->prepare($query);
            $result->bindValue(":user_name", $this->user_name);
            $result->bindValue(":email", $this->user_email);
            $result->bindValue(":phone_no", $this->user_phone_no);
            $result->bindValue(":mssg", $this->user_mssg);
            $result->execute();
            return true;
        }
    }
?>