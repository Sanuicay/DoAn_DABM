<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysqli_connect("localhost:3307", "root", "", "dabm_database");

        if (mysqli_connect_errno()) {
            $res = [
                'success' => false,
                'message' => 'Failed to connect to MySQL: ' . mysqli_connect_error(),
            ];
            echo json_encode($res);
            exit();
        }

        // Get the POST data
        $data = json_decode(file_get_contents("php://input"));
        $orderID = mysqli_real_escape_string($con, $data->orderID); // Escape input
        $order_info = mysqli_real_escape_string($con, $data->status); // Escape input

        // Use prepared statement to prevent SQL injection
        $query = "UPDATE `order` SET order_info = ? WHERE order_ID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $order_info, $orderID);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $res = [
                'success' => true,
                'message' => 'Order updated successfully',
            ];
        } else {
            $res = [
                'success' => false,
                'message' => 'Error updating order: ' . mysqli_error($con),
            ];
        }

        echo json_encode($res);

        // Close the prepared statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
?>
