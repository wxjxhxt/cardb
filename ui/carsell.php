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

$brand = $_POST['brand'];
$vehicletype = $_POST['vehicletype'];
$carname = $_POST['carname'];
$transtype = $_POST['transtype'];
$colour = $_POST['colour'];
$mileage = $_POST['mileage'];
$price = $_POST['price'];
$fuel = $_POST['fuel'];
$id = $_POST['carid'];

$sql = "INSERT INTO car (car_name,car_brand,vehicle_type,trans_type,mileage,colour,price,fuel_type,car_id)
 VALUES('$carname','$brand','$vehicletype','$transtype','$mileage','$colour','$price','$fuel','$id')";

try {
    if ($conn->query($sql) === TRUE) {
        echo "<p>YOUR CAR IS NOW ON OUR LIST WE WILL NOTIFY YOU IF WE HAVE ANY BUYER</p>";
    } else {
        throw new Exception($conn->error);
    }
} catch (Exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo "<p>404 ERROR: This car ID already exists. Make sure to write the car ID properly.</p>";
    } else {
        echo "<p>404 ERROR: We see a problem here!! " . $e->getMessage() . "</p>";
    }
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
        body {
            background: linear-gradient(to right, #314755, #26a0da);
        }

        p {
            margin-top: 115px;
            font-size: 50px;
            text-align: center;
            box-shadow: 5px 15px 10px rgb(225, 114, 225);
        }
    </style>
</head>
<body>
