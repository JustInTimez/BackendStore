<?php

include __DIR__ . "/config.php"; 

class UserDAO {



    // ========================= DB CRUD METHODS =========================


    public static function fetchUser($id) {
        global $connect;

        // Begin prepare statement
        $sql = $connect->prepare("SELECT * FROM users WHERE id = ?");

        // Bind passed variable to prepare statement
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }

    public static function fetchLogin() {
        global $connect;

        // Grab login form POST inputs
        $email = trim($_POST['LoginEmail']);
        $password = trim($_POST['LoginPassword']);

        // Begin prepare statement
        $sql = "SELECT * FROM users WHERE password = ?";
        $stmt = $connect->prepare($sql);

        // Bind passed variable to prepare statement
        $stmt->bind_param("s", $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $userLogin = $result->fetch_assoc();
        return $userLogin;
    }

    public static function createUser() {
        global $connect;

        // Grab register form POST inputs
        $fname = trim($_POST['RegInputName']);
        $lname = trim($_POST['RegInputSurname']);
        $email = trim($_POST['RegInputEmail']);
        $password = trim($_POST['RegInputPassword']);

        // Begin prepare statement
        $sql = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);

        // Bind passed variable to prepare statement
        $stmt->bind_param("ssss", $fname, $lname, $email, $password);
        
        // Check if user was added to table and then redirect appropriately
        if ($stmt->execute() === TRUE){

            $sql = "SELECT * FROM users WHERE password = '" . $password . "'";
            $result = $connect->query($sql);

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                $_SESSION['LoggedInUser'] = $user;

                // Close connection
                mysqli_close($connect);
                
                return true;
            } else {
                return false;
            }

        } else {

            echo "Error: " . $sql . "<br>" . $connect->error;

            // Close connection
            mysqli_close($connect);

            header("Location: ../login.php");
            exit();
        }
        
    }









}