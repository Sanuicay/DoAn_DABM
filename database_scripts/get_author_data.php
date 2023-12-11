<?php
// Connect to your database
// $con = mysqli_connect("localhost:3307","root","","doan");
include_once("../connection.php");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$search = $_POST['search'];
$query = "SELECT author_ID, author_name FROM author WHERE author_name LIKE '%$search%'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'><th style='padding: 8px; border: 1px solid #ddd;'>Author ID</th><th style='padding: 8px; border: 1px solid #ddd;'>Author Name</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["author_ID"]. "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["author_name"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

mysqli_close($con);
?>