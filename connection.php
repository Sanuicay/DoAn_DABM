<?php 
session_start();
//check if user is logged in
if(!isset($_SESSION['user_id'])){
    header('location:homepage_nologin.html');
}
else{
    $con = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE ID = {$_SESSION["user_id"]}";
            
    $user = $con->query($sql)->fetch_assoc();
}
$id = $user["ID"];
$query = "SELECT sur_name, last_name, phone_num, email, username, password, user_info
          FROM user
          WHERE ID = $id;";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>