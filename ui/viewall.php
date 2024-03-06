<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ars_cartrade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM car";
$result = $conn->query($sql);

if (!$result) {
    die("Error in SQL query: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<style>
            
    body{
        background: linear-gradient(to right , #BBD2C5 , #26a0da);
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

            #cars tr:nth-child(even){background-color: white;}

            #cars tr:hover {background-color: #ddd;}

            #cars th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
          </style>";

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
    echo "<p>No records found</p>";
}

$conn->close();
?>
