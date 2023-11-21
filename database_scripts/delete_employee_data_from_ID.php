<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Get the ID from the GET request
$id = $_GET['id'];

// Sanitize the ID to prevent SQL injection
$id = mysqli_real_escape_string($con, $id);

// Run the DELETE query
$query = "DELETE FROM employee WHERE ID = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}


mysqli_close($con);
?>