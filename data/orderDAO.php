<?php

include __DIR__ . "/config.php";

class orderDAO {

    // ========================= DB CRUD METHODS =========================


    public static function createOrder() {
        global $connect;

        // Grab SESSION data
        $userId = $_SESSION['LoggedInUser']['id'];
        $userCart = $_SESSION['Cart'];
        $buyDate = date('Y/m/d');

        // Begin prepare statement
        $sql = "INSERT INTO orders (customer_id, buy_date) VALUES (?, ?)";
        $stmt = $connect->prepare($sql);

        // Bind passed variable to prepare statement
        $stmt->bind_param("is", $userCart, $buyDate);
        $stmt->execute();

        // Begin prepare statement
        $sql2 = "INSERT INTO order_product (order_id, product_id) VALUES (?, ?)";
        $stmt2 = $connect->prepare($sql2);
        $order_id = $connect->insert_id;

        // Bind passed variable to prepare statement
        foreach ($_SESSION['Cart'] as $product_id) {
            $stmt2->bind_param("ii", $order_id, $product_id);
            $stmt2->execute();

        }
        
        return true;
    }




























}