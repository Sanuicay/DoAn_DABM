<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost:3307", "root", "", "dabm_database");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Create a new order
    $result = mysqli_query($con, 'SELECT order_ID, o.order_date, o.order_info, SUM(purchase_price * purchase_quantity) as total_price
    FROM `order` AS o
    JOIN purchase_order AS po ON o.order_ID = po.purchase_ID
    JOIN purchase_include AS pi ON o.order_ID = pi.purchase_ID
    JOIN book AS b ON b.book_ID = pi.book_ID
    GROUP BY order_ID
    ORDER BY order_date DESC;
    ');

    if ($result) {
        // Fetch all rows into an array
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // Use prepared statements to prevent SQL injection
            $rows[] = $row;
        }
        // Return the user data as a JSON response
        http_response_code(200);
        $response = [
            'success' => true,
            'message' => 'Hello world',
            'userData' => $rows,
        ];
        echo json_encode($response);
    } else {
        echo "Error executing main query: " . mysqli_error($con);
    }

    // Close the prepared statement and the database connection
    mysqli_close($con);
}
?>
