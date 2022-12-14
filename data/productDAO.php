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

        $sql = "SELECT id FROM products";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        return $products;
    }

    public static function featuredProducts() {
        global $connect;

        $sql = "SELECT id FROM products ORDER BY RAND() LIMIT 2";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $featProducts = $result->fetch_all(MYSQLI_ASSOC);
        return $featProducts;
    }

    public static function latestAdditions() {
        global $connect;

        $sql = "SELECT id FROM products WHERE add_date >= 3 LIMIT 3";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $latestProducts = $result->fetch_all(MYSQLI_ASSOC);
        return $latestProducts;
    }

}
