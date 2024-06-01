<?php
    class User extends Database {
        private $username;
        private $email;
        private $user_password;
        private $user_pic;
        private $phone_number;
        private $city;
        private $zip_code;
        private $state;

        function __construct($username, $email, $user_password, $user_pic, $phone_number = null, $city = null, $zip_code = null, $state = null) {
            $this->username = $username;
            $this->email = $email;
            $this->user_password = $user_password;
            $this->user_pic = $user_pic;
            $this->phone_number = $phone_number;
            $this->city = $city;
            $this->zip_code = $zip_code;
            $this->state = $state;

            parent::__construct();
        }

        function push() {
            $insert_query = "INSERT INTO `users` (`username`, `user_email`, `user_password`, `user_pic`, `created`)  VALUES (:username, :email, :user_password, :user_pic, NOW())";

            $statement = $this->connection->prepare($insert_query);

            $statement->bindValue(":username", $this->username);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":user_password", $this->user_password);
            $statement->bindValue(":user_pic", $this->user_pic);

            $statement->execute();
        }
    }
?>