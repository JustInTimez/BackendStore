<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "./../data/userDAO.php";

class User {

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
        $user = UserDAO::fetchUser($id);


    }

    // ========================= METHODS =========================

 













    // ==================== GETTERS & SETTERS ====================

    




}