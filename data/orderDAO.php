<?php

include __DIR__ . "/config.php"; 

class orderDAO {

    // ========================= DB CRUD METHODS =========================


    public function createOrder() {
        global $connect;

        // Grab hidden field from form POST (product's ID), as well as grab user SESSION ID
        $userId = $_SESSION['LoggedInUser']['id'];
        $productId = $_POST['productId'];





    }




























}