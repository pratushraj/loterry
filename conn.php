 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lottery";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?> 