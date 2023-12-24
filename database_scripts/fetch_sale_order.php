<?php

function total_price_sales($mysqli, $id_order) {
    include_once('database_scripts/connect.php');

    $total = 0;

    // Use prepared statement to prevent SQL injection
    $query = "SELECT SUM(si.sale_quantity * b.sale_price) AS total
              FROM sale_include si
              JOIN book b ON si.book_ID = b.book_ID
              WHERE si.sale_ID = ?";
    
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 's', $id_order);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $total;
}

?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = require_once __DIR__ . "connect.php";

    // Create a new order
    $result = mysqli_query($con, 'SELECT order_ID, E.sur_name, E.last_name, M.sur_name as sur, M.last_name as last_n, order_date, count(*) as count_item, payment_status, delivery_address, SUM(sale_include.sale_quantity * book.sale_price) AS total_price, order_info, E.ID as emp
        FROM `order`,`sale_order` NATURAL JOIN `sale_include` NATURAL JOIN `book`, `user` as E, `user` as M
        WHERE order_ID = sale_ID AND employee_ID = E.ID AND member_ID = M.ID 
        GROUP BY order_ID, E.sur_name, E.last_name, sur, last_n, order_date, payment_status
        ORDER BY CAST(SUBSTRING(order_ID, 4) AS UNSIGNED);')
        ;

    if ($result) {
        // Fetch all rows into an array
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // Use prepared statements to prevent SQL injection
            $orderID = mysqli_real_escape_string($con, $row['order_ID']);
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
