<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "/../data/orderDAO.php";

class Order {

    // ========================= FIELDS =========================

    private $order_id;
    private $customer_id;
    private $product_id;
    private $buy_date;

    public function __construct($order_id, $customer_id, $product_id, $buy_date){

        $this->order_id = $order_id;
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->buy_date = $buy_date;

    }




    // ========================= METHODS =========================

    public static function addToCart() {
        $productId = $_POST['productId'];
        $_SESSION['Cart'][] = $productId;

        header("Location: ../cart.php");
        exit();
    }

    // public static function displayCart() {
    //     return ($_SESSION['Cart']);
    // }















    // ==================== GETTERS & SETTERS ====================

    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getBuy_date()
    {
        return $this->buy_date;
    }

    public function setBuy_date($buy_date)
    {
        $this->buy_date = $buy_date;

        return $this;
    }
}