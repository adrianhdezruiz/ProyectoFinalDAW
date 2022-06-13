<?php
session_start();
$servername = "localhost";
$username = "debianDB";
$password = "debianDB";
$bbdd = $_SESSION['bbddname'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $bbdd, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}
