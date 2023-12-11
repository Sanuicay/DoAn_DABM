<?php
// $con = mysqli_connect("localhost:3307", "root", "", "doan");
include_once("../connection.php");


if($_SERVER['REQUEST_METHOD'] == "POST") {
 //check null for all fields except ID and info
 if (empty($_POST['username']) || empty($_POST['new-password']) || empty($_POST['confirm-password']) || empty($_POST['ho']) || empty($_POST['ten']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['start_date']) || empty($_POST['status']))
 {
     echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
 }
 else 
 {
     //get the input
     $username = $_POST['username'];
     $employeeID = $_POST['employeeID'];
     $password = $_POST['new-password'];
     $confirm_password = $_POST['confirm-password'];
     $ho = $_POST['ho'];
     $ten = $_POST['ten'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $info = $_POST['info'];
     $start_date = $_POST['start_date'];
     $employee_status = $_POST['status'];

     //check if the username already exists
     $query = "SELECT username FROM user";
     $result = mysqli_query($con,$query);
     if (mysqli_num_rows($result) > 0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             if ($row['username'] == $username)
             {
                 echo "<script>alert('Tên đăng nhập đã tồn tại!')</script>";
                 exit();
             }
         }
     }

     //check if the password and confirm password match
     if ($password != $confirm_password)
     {
         echo "<script>alert('Mật khẩu không khớp!')</script>";
         exit();
     }

     //check if the email already exists
     $query = "SELECT email FROM user";
     $result = mysqli_query($con,$query);
     if (mysqli_num_rows($result) > 0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             if ($row['email'] == $email)
             {
                 echo "<script>alert('Email đã tồn tại!')</script>";
                 exit();
             }
         }
     }

    //insert the new user into the user table
    $query = "INSERT INTO user (username, password, sur_name, last_name, email, phone_num, user_info, ID)
               VALUES ('$username', '$password', '$ho', '$ten', '$email', '$phone', '$info', '$employeeID');";
    $result = mysqli_query($con,$query);

     //insert the new user into the employee table with the start date
    $query = "INSERT INTO employee (ID, start_date, employee_status)
                VALUES ('$employeeID', '$start_date', '$employee_status');";
    $result = mysqli_query($con,$query);
    echo "Thêm nhân viên thành công!";

 }
 
}

?>