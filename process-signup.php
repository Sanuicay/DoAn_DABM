<?php

$uniqueID = crc32(uniqid());
$password_form = $_POST["password"];

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (ID, sur_name, last_name, phone_num, username, email, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $uniqueID,
                  $_POST["surname"],
                  $_POST["name"],
                  $_POST["phoneNumber"],
                  $_POST["username"],
                  $_POST["email"],
                  $password_form);
                  
if ($stmt->execute()) {

    header("Location: signup_successful.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}