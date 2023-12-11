<?php
// $con = mysqli_connect("localhost:3307","root","","doan");
include_once("connection.php");
$order_id = $_GET['id'];
$order_id = mysqli_real_escape_string($con,$order_id);

echo "<script>
    var confirmation = confirm('XÁC NHẬN THANH TOÁN?');
    if (confirmation) {
        window.location.href = 'payment_confirmation2.php?id=$order_id';
    } else {
        window.location.href = 'customer_order_history.php';
    }
</script>";
?>