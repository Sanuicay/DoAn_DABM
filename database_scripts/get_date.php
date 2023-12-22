<?php
include_once('connection.php');

function getDateRange($mysqli, $from_date, $to_date) {
    $query = mysqli_prepare($mysqli, "SELECT ? as from_date, ? as to_date");

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
