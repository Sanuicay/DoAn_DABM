<?php
$con = require_once __DIR__ . "/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $bookId = $data->bookId;
    $status = $data->status;
    
    // Use prepared statement to prevent SQL injection
    $sqlUpdateStatus = "UPDATE book SET display_status = ? WHERE book_ID = ?";
    $stmt = mysqli_prepare($con, $sqlUpdateStatus);
    mysqli_stmt_bind_param($stmt, "ss", $status, $bookId);
    $result = mysqli_stmt_execute($stmt);

    // Insert data into other relevant tables and perform other actions as needed

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($con);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
