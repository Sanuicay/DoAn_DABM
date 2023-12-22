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

//delete from written_by table
//$query = "DELETE FROM written_by WHERE book_ID = '$id'";
//$result = mysqli_query($con, $query);

//delete from belongs_to table
//$query = "DELETE FROM belongs_to WHERE book_ID = '$id'";
//$result = mysqli_query($con, $query);

//update from book table (set số lượng còn lại = 0)
$query = "UPDATE book SET deleted_tag = 1 WHERE book_ID = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Xóa thành công!')</script>";
    echo "<script>window.location.href = '../list_of_book.php';</script>";
} else {
    echo "<script>alert('Xóa thất bại!')</script>";
    echo "<script>window.location.href = '../list_of_book.php';</script>";
}
?>