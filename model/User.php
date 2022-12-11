<?php

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
        
        if ($result) {
            $_SESSION['LoggedInUser'] = $result;
            $_SESSION['Cart'] = [];

            header("Location: ../shop.php");
            exit();
        }
    }

    public static function userLogin() {
        $userLogin = UserDAO::fetchLogin();
        
        if ($userLogin == true) {
            $_SESSION['LoggedInUser'] = $userLogin;
            $_SESSION['Cart'] = [];

            echo "Matched password, logging in...";

            header("Location: ../shop.php");
            exit();

        } else {
            
            // Auth failed so user gets taken back to login page
            echo "Invalid password or email. Taking you back...";

            header("Location: ../login.php");
            exit();


        }
    }

    public static function userLogout() {
        if(session_destroy()) {
            header("Location: ./index.php");
         }
    }

}