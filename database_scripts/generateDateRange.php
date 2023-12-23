<?php
function generateDateRange($start, $end)
{
    $dateRange = [];
    $currentDate = strtotime($start);

    while ($currentDate <= strtotime($end)) {
        $dateRange[] = date('Y-m-d', $currentDate);
        $currentDate = strtotime('+1 day', $currentDate);
    }

    return $dateRange;
}
?>