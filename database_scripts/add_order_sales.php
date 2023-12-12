<?php
// Retrieve data from the AJAX request
$data = json_decode(file_get_contents("php://input"));

// Connect to the database
$con = require_once __DIR__ . "/connect.php";

// Insert order data into the 'order' table
$sql = "INSERT INTO `order` (order_ID, order_date, order_info) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sss", $data->orderID, $data->orderDate, $data->orderNote);
mysqli_stmt_execute($stmt);

// Insert data into other relevant tables and perform other actions as needed

// Close the database connection
mysqli_close($con);
?>
