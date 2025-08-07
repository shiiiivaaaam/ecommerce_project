<?php
    $host= 'localhost';
    $username= 'root';
    $password= null;
    $dbname= 'ecommerce';

    $conn = new mysqli($host,$username,$password,$dbname);
    if ($conn->connect_error) {
        die('database connection error'. $conn->connect_error);
    }
?>