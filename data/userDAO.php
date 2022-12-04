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

    public static function createUser() {
        global $connect;
        $fname = trim($_POST['RegInputName']);
        $lname = trim($_POST['RegInputSurname']);
        $email = trim($_POST['RegInputEmail']);
        $password = trim($_POST['RegInputPassword']);

        // Begin prepare statement
        $sql = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssss", $fname, $lname, $email, $password);
        
        // Check if user was added to db and then redirect appropriately
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