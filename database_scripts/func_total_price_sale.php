<?php

function total_price_sales($mysqli, $id_order) {
    include_once('database_scripts/connect.php');

    $total = 0;

    $query = "SELECT SUM(si.sale_quantity * b.sale_price) AS total
              FROM sale_include si
              JOIN book b ON si.book_ID = b.book_ID
              WHERE si.sale_ID = '$id_order'";
    
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
    }

    return $total;
}

?>