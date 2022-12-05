<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include __DIR__ . "/../data/userDAO.php";

class User {

    // ========================= FIELDS =========================

    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $contact_no;
    private $dob;


    public function __construct($id, $fname, $lname, $email, $password, $contact_no, $dob){

        // Call to DAO
        // $stmt = UserDAO::fetchUser($id);

        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->contact_no = $contact_no;
        $this->dob = $dob;

    }

    // ========================= METHODS =========================

    public static function userRegister() {
        $result = UserDAO::createUser();
        
        if ($result == true) {
            
        echo "New user created successfully";

        header("Location: ../shop.php");
        exit();

        }
    }

    public static function userLogin() {





        
    }











    // ==================== GETTERS & SETTERS ====================

    




}