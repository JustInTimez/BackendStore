<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "./../data/productDAO.php";

class Product {

    // ========================= FIELDS =========================

    private $id;
    private $name;
    private $image;
    private $price;
    private $description;
    private $rating;
    private $genre;
    private $is_pc;
    private $is_xbox;
    private $is_ps;


    public function __construct($id){

        // Call to DAO
        $product = productDAO::fetchProduct($id);

        $this->id = $product['id'];
        $this->name = $product['name'];
        $this->image = $product['image'];
        $this->price = $product['price'];
        $this->description = $product['description'];
        $this->rating = $product['rating'];
        $this->genre = $product['genre'];
        $this->is_pc = $product['is_pc'];
        $this->is_xbox = $product['is_xbox'];
        $this->is_ps = $product['is_ps'];
    }

    // ========================= METHODS =========================

    public static function getAllProducts($id) {
        $product = productDAO::fetchProduct($id);
        if ($product) {
            while ($row = $product) {
                $product = new Product($row['id']);

            }
            return $product;



        }






    }






















}