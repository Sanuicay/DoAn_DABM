<?php
include_once('connection.php');

function getTotalSale($mysqli, $from_date, $to_date) {
    $query = mysqli_prepare($mysqli, "SELECT SUM(si.sale_quantity) as total_book_sold, g.genre_name as type_book
                FROM `sale_include` as si, `order` as o, `belongs_to` as bt, `genre` as g
                WHERE si.sale_ID = o.order_ID AND si.book_ID = bt.book_ID AND bt.genre_ID = g.genre_ID
                AND (o.order_date BETWEEN ? AND ?)
                GROUP BY g.genre_name;");

    mysqli_stmt_bind_param($query, "ss", $from_date, $to_date);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    $data = array();
    while ($item = mysqli_fetch_assoc($result)) {
        $data[] = $item;
    }

    return $data;
}

?>
