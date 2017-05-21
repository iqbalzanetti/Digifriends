<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "digi";
$base_url = "http://localhost/digi/"; 

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 