<?php
    function isConnected() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=fashionhub", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
?>