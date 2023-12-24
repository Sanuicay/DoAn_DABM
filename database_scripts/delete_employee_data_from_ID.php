<?php
// Connect to your database
// $con = mysqli_connect("localhost:3307","root","","doan");
include_once("../connection.php");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($con, $id);

//set employee_ID in sale_order table to another random employee_ID in the employee table
$query = "UPDATE sale_order SET employee_ID = (SELECT id FROM employee WHERE id != '{$id}' ORDER BY RAND() LIMIT 1) WHERE employee_ID = '{$id}'";
$result1 = mysqli_query($con, $query);
//set employee_ID in purchase_order table 
$query = "UPDATE purchase_order SET employee_ID = (SELECT id FROM employee WHERE id != '{$id}' ORDER BY RAND() LIMIT 1) WHERE employee_ID = '{$id}'";
$result2 = mysqli_query($con, $query);

// //delete the employee from the database
// $query = "DELETE FROM employee WHERE id = '{$id}'";
// $result = mysqli_query($con, $query);

// //delete the user from the database
// $query = "DELETE FROM user WHERE id = '{$id}'";
// $result = mysqli_query($con, $query);

// if ($result) {
//     echo "<script>alert('Xóa thành công!')</script>";
//     echo "<script>window.location.href = '../manager_employee.php';</script>";
// } else {
//     echo "<script>alert('Xóa thất bại!')</script>";
//     echo "<script>window.location.href = '../manager_employee.php';</script>";
// }

if ($result1 && $result2) {
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
} else {
    echo "<script>alert('Xóa thất bại!')</script>";
    echo "<script>window.location.href = '../manager_employee.php';</script>";
};
?>