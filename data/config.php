<?php
$serverhost = "localhost";
$username = "root";
$password = "root";
$dbname = "backend_store";

// Create connection
$connect = new mysqli($serverhost, $username, $password, $dbname);

// Check connection
if ($connect -> connect_error) {
  die("Connection failed: " . mysqli_connect_error());
  
} else {

  return $connect;
  
}