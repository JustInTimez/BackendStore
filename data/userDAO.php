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














}