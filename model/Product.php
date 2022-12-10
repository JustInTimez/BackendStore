<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "/../data/productDAO.php";


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
    private $stock;
    private $add_date;


    public function __construct($id){

        // Call to DAO
        $product = ProductDAO::fetchProduct($id);

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
        $this->stock = $product['stock'];
        $this->add_date = $product['add_date'];
    }

    // ========================= METHODS =========================

    public static function getAllProducts() {
        return ProductDAO::fetchAllProducts();
    }

    public static function filter() {

        $products = ProductDAO::fetchAllProducts();
        $filteredProducts = [];

        foreach ($products as $id) {
            $product = new Product($id['id']);

            if (isset($_POST['PC'])) {
                if ($product->getIs_pc() == true) {
                    array_push($filteredProducts, $id);
                }

            } elseif (isset($_POST['PLAYSTATION'])) {
                if ($product->getIs_ps() == true) {
                    array_push($filteredProducts, $id);
                }

            } elseif (isset($_POST['XBOX'])) {
                if ($product->getIs_xbox() == true) {
                    array_push($filteredProducts, $id);
            }

            } else {
                return [];
            }   
        }
        return $filteredProducts;

    }

    public static function displayFeatured() {
        return ProductDAO::featuredProducts();
    }

    public static function displayLatest() {
        return ProductDAO::latestAdditions();
    }





    // ==================== GETTERS & SETTERS ====================

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    public function getIs_pc()
    {
        return $this->is_pc;
    }

    public function setIs_pc($is_pc)
    {
        $this->is_pc = $is_pc;

        return $this;
    }

    public function getIs_xbox()
    {
        return $this->is_xbox;
    }

    public function setIs_xbox($is_xbox)
    {
        $this->is_xbox = $is_xbox;

        return $this;
    }

    public function getIs_ps()
    {
        return $this->is_ps;
    }

    public function setIs_ps($is_ps)
    {
        $this->is_ps = $is_ps;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
 
    public function getAdd_date()
    {
        return $this->add_date;
    }

    public function setAdd_date($add_date)
    {
        $this->add_date = $add_date;

        return $this;
    }
}