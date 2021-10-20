<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <link rel="stylesheet" href="Keuangan.css">
</head>
<body>
    <header>
        <div class="Title">Laporan Keuangan</div>
    </header>
    <form action="Data.php" method="get">
      Income: <input type="number" name="Income"></br>
      Outcome: <input type="number" name="Outcome"></br>
      <input type="submit">
    </form>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
  //echo "Database created successfully"."<br>";
} else {
  //echo "Error creating database: " . mysqli_error($conn)."<br>";
}

//use database
$sql = "USE myDB";
if (mysqli_query($conn, $sql)) {
  //echo nl2br("Switched database successfully\n");
} else {
  //echo "Error switching database: " . mysqli_error($conn)."<br>";
}

// sql to create table
$sql = "CREATE TABLE Keuangan (
Income INT(10),
Outcome INT(10)
)";


if (mysqli_query($conn, $sql)) {
  //echo "Table Keuangan created successfully"."<br>";
} else {
  //echo "Error creating table: " . mysqli_error($conn)."<br>";
}

$query = "SELECT * FROM Keuangan"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><th>Income</th><th>Outcome</th><tr>";

while($row = mysqli_fetch_array($result)){ //Creates a loop to loop through results
?>
  <tr>
    <td><?php echo $row['Income']; ?></td>
    <td><?php echo $row['Outcome']; ?></td>
    <td><a href="delete.php?Income=<?php echo $row['Income']; ?>">Delete</a></td>
  </tr>  

<?php
}
echo "</table>";

$result = mysqli_query($conn, 'SELECT SUM(Income)-SUM(Outcome) AS value_sum FROM Keuangan'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];

echo "Total: ".$sum;

mysqli_close($conn);
?> 