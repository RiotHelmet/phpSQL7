<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="filUppladdning.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>


<?php
if (!empty($_POST["submit"])) {


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "databas";
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $filename = $_FILES["fileToUpload"]["name"];
    session_start();
    $sql = "INSERT INTO uploads (filename, user, uploadtime) VALUES ('$filename', '" . $_SESSION["username"] . "', NOW())";
    $result = $conn->query($sql);
    echo "You successfully uploaded  :  " . $filename;
    $conn->close();
}
