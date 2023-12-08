<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($con, $id);

//delete the employee from the database
$query = "DELETE FROM employee WHERE id = '{$id}'";
$result = mysqli_query($con, $query);

//delete the user from the database
$query = "DELETE FROM user WHERE id = '{$id}'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Xóa thành công!')</script>";
    echo "<script>window.location.href = '../manager_employee.php';</script>";
} else {
    echo "<script>alert('Xóa thất bại!')</script>";
    echo "<script>window.location.href = '../manager_employee.php';</script>";
}
?>