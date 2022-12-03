<?php

include __DIR__ . "/config.php"; 

class ProductDAO {



    // ========================= DB CRUD METHODS =========================


    public static function fetchProduct($id) {
        global $connect;

        // Begin prepare statement
        $sql = $connect->prepare("SELECT * FROM products WHERE id = ?");

        // Bind passed variable to prepare statement
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        $product = $result->fetch_assoc();
        return $product;
    }














}