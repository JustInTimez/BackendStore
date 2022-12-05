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

    public static function userOrder() {





        
    }

















    // ==================== GETTERS & SETTERS ====================




}