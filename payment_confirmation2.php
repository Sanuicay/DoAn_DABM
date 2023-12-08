<?php
$con = mysqli_connect("localhost:3307","root","","doan");
//payment_confirmation2.php?id=4?flag=1
//get order id
$order_id = $_GET['id'];
$order_id = mysqli_real_escape_string($con,$order_id);

$sql = "UPDATE sale_order
        SET payment_status = 'Đã thanh toán'
        WHERE sale_ID = '$order_id';";
$result = mysqli_query($con,$sql);
if ($result) {
    echo "<script>
        alert('ĐÃ THANH TOÁN');
        window.location.href = 'cart.php';
    </script>";
} else {
    echo "<script>
        alert('THANH TOÁN THẤT BẠI');
        window.location.href = 'cart.php';
    </script>";
}



// http://localhost/DOAN_DABM/payment_confirmation.php?id=ONL4
?>