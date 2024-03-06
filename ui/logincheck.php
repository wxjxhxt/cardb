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

// Fetch login data with isset
$enteredUsername = isset($_POST['id']) ? $_POST['id'] : '';
$enteredPassword = isset($_POST['pwd']) ? $_POST['pwd'] : '';

// SQL query to check login
$sql = "SELECT * FROM user WHERE ID ='$enteredUsername' AND userPassword ='$enteredPassword'";

$result = $conn->query($sql);

if (!$result) {
    echo "Error in SQL query: " . $conn->error;
    die();
}

if ($result->num_rows > 0) {
    // Login successful
    header("Location: home.html");
    exit();
} else {
    // Login failed
    echo "<script>alert('Incorrect username or password');</script>";
    echo "<script>setTimeout(function(){ window.location='login.html'; }, 1000);</script>";
    exit();
}

$conn->close();
?>
