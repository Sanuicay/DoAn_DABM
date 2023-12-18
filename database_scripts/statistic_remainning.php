<?php
include_once('connection.php');

function getTotalRemaining($mysqli) {
    $query = mysqli_prepare($mysqli, "SELECT SUM(b.remaining_quantity) as total_book_remaining, g.genre_name as type_book
                FROM `book` as b, `belongs_to` as bt, `genre` as g
                WHERE b.book_ID = bt.book_ID AND bt.genre_ID = g.genre_ID
                GROUP BY g.genre_name;");

    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    $data = array();
    while ($item = mysqli_fetch_assoc($result)) {
        $data[] = $item;
    }

    return $data;
}

?>
