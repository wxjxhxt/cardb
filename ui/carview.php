<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ars_cartrade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$brand = $_POST['brand'];
$vehicletype = $_POST['vehicletype'];

$sql = "SELECT * FROM car WHERE vehicle_type='$vehicletype' AND car_brand='$brand'";
$result = $conn->query($sql);

if (!$result) {
    die("Error in SQL query: " . $conn->error);
}

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
        #cars {
            font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        #cars td, #cars th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #cars tr:nth-child(even){background-color: #f2f2f2;}

        #cars tr:hover {background-color: #ddd;}

        #cars th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        p{
            margin-top: 115PX;
            font-size: 50px;
            text-align: center;
            box-shadow: 5px 15px 10px rgb(225, 114, 225);
        }
        #btn{
           
             border-radius: 15px;
              box-shadow: 5px 5px 10px rgb(110, 114, 114);
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<table id='cars'>
            <tr>
                <th>Car Brand</th>
                <th>Car Name</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Colour</th>
                <th></th>
            </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[10] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td style='text-align: center;'><input type='button' name='buy' value='Buy Now' onclick='window.location.href=\"payment.html\";' style='width: 150px; height: 40px;'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>WE ARE OUT OF STOCK FOR YOUR CURRENT REQUEST PLEASE TRY OTHER MODELS</p>";
    echo "<p>No records found</p>";
}

$conn->close();
?>

</body>
</html>
