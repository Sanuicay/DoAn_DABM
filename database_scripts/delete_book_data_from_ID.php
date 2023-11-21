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

//delete from written_by table
$query = "DELETE FROM written_by WHERE book_ID = '$id'";
$result = mysqli_query($con, $query);

//delete from belongs_to table
$query = "DELETE FROM belongs_to WHERE book_ID = '$id'";
$result = mysqli_query($con, $query);

//delete from book table
$query = "DELETE FROM book WHERE book_ID = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
    //redirect to list_of_book2.html (outside of database_scripts folder)
    header("Location: ../list_of_book2.html");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
?>