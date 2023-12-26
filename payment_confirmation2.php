<?php
// $con = mysqli_connect("localhost:3307","root","","doan");
include_once("connection.php");
//payment_confirmation2.php?id=4?flag=1
//get order id
$order_id = $_GET['id'];
$order_id = mysqli_real_escape_string($con,$order_id);
// get the user id
$user_id = $_SESSION['user_id'];
// check if the user own this order or not
$sql = "SELECT * FROM sale_order WHERE member_ID = '$user_id' AND sale_ID = '$order_id'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    echo "<script>
    alert('Bạn không có quyền truy cập vào đơn hàng này!');
    window.location.href = 'customer_order_history.php';
    </script>";
} else {
    // check if the order is already paid or not
    $sql = "SELECT * FROM sale_order WHERE sale_ID = '$order_id' AND payment_status = 'Đã thanh toán'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>
        alert('Đơn hàng này đã được thanh toán trước đó!');
        window.location.href = 'customer_order_history.php';
        </script>";
    } else {
        $sql = "UPDATE sale_order
            SET payment_status = 'Đã thanh toán'
            WHERE sale_ID = '$order_id';";
        $result = mysqli_query($con,$sql);
        if ($result) {
        echo "<script>
            alert('ĐÃ THANH TOÁN');
            window.location.href = 'customer_order_history.php';
        </script>";
        } else {
        echo "<script>
            alert('THANH TOÁN THẤT BẠI');
            window.location.href = 'customer_order_history.php';
        </script>";
        }
    }
}
?>