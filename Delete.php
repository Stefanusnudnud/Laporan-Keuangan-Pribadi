<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$income = $_GET['Income']; // get id through query string

$sql = "Delete from Keuangan where Income = $income";

if(mysqli_query($conn,$sql))
{
    mysqli_close($conn); // Close connection
    header("location:Keuangan.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>