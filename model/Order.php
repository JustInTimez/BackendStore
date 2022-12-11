<?php

include __DIR__ . "/../data/orderDAO.php";

class Order {

    // ========================= FIELDS =========================

    private $order_id;
    private $customer_id;
    private $buy_date;

    public function __construct($order_id, $customer_id, $product_id, $buy_date){

        $this->order_id = $order_id;
        $this->customer_id = $customer_id;
        $this->buy_date = $buy_date;

    }


    // ========================= METHODS =========================

    public static function addToCart() {
        $productId = $_POST['productId'];
        if (!in_array($productId, $_SESSION['Cart'])) {
            
            array_push($_SESSION['Cart'], $productId);
        }

        header("Location: ../cart.php");
        exit();

    }

    public static function displayCart() {
        if (empty($_SESSION['Cart'])) {
            echo "You have nothing in your cart yet!";
        } else {
            return ($_SESSION['Cart']);
        }
    }

    public static function removeItem() {
        $prodId = $_POST['productId'];
        $index = array_search($prodId, $_SESSION['Cart']);
        unset($_SESSION['Cart'][$index]);

        header("Location: ../cart.php");
        exit();

    }

    public static function clearCart() {
        $_SESSION['Cart'] = [];

        header("Location: ../cart.php");
        exit();

    }

    public static function payCart() {
        OrderDAO::createOrder();
        $_SESSION['Cart'] = [];
        
        header("Location: ../order-paid.php");
        exit();

    }


    // ==================== GETTERS & SETTERS ====================

    public function getOrder_id() {
        return $this->order_id;
    }

    public function setOrder_id($order_id) {
        $this->order_id = $order_id;

        return $this;
    }

    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getBuy_date() {
        return $this->buy_date;
    }

    public function setBuy_date($buy_date) {
        $this->buy_date = $buy_date;

        return $this;
    }
    
}