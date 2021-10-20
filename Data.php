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
 
// prepare and bind
$stmt = $conn->prepare("INSERT INTO Keuangan(Income, Outcome) VALUES (?,?)");
$stmt->bind_param("ii",$income,$outcome);

$income = $_GET["Income"];
$outcome = $_GET["Outcome"];
$stmt->execute();

mysqli_close($conn);

header("Location: /project/Keuangan.php");
?>