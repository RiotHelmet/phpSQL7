<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databas";
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$uName = $_POST["username"];
$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (userID, firstName, lastName, uname, pword) 
        VALUES ('0', '$firstName', '$lastName', '$uName', '$hash')";
$conn->query($sql);

$conn->close();

header('Location: index.php');
exit;
