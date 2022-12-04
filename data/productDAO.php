<?php

include __DIR__ . "/config.php"; 

class ProductDAO {



    // ========================= DB CRUD METHODS =========================


    public static function fetchProduct($id) {
        global $connect;

        // Begin prepare statement
        $sql = "SELECT * FROM products WHERE id =?";
        $stmt = $connect->prepare($sql);

        // Bind passed variable to prepare statement
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        return $product;
    }

    public static function fetchAllProducts() {
        global $connect;

        // Begin prepare statement
        $sql = "SELECT id FROM products";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        return $products;
    }









}