<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ars_cartrade";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];
$ads = $_POST['ads'];
$adno = $_POST['adno'];

// SQL query to insert data into the database
$sql = "INSERT INTO user 
        VALUES ('$name', '$pwd', '$email', '$phone', '$id', '$ads', '$adno')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
    echo "<script>setTimeout(function(){ window.location='first.html'; }, 1000);</script>";
    exit();
} else {
    echo "<P>Some issue occured Please try Later </P>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Search Results</title>
    <style>
        body{
            background: linear-gradient(to right , #314755 , #26a0da);
        }
        p{
            margin-top: 115PX;
            font-size: 50px;
            text-align: center;
            box-shadow: 5px 15px 10px rgb(225, 114, 225);
        }
    </style>
</head>
<body>
