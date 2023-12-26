<?php

$uniqueID = "100".rand(10000, 99999);
$password_form = $_POST["password"];

$mysqli = require __DIR__ . "/database.php";

$validate = "SELECT email, username FROM user;";

$result = $mysqli->query($validate);
    
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $databaseEmail = $row["email"];
        if (isset($_POST['email'])) {
            $userInputEmail = $_POST['email'];
        
            if ($databaseEmail === $userInputEmail) {
                die("Email đã được sử dụng!\nVui lòng chọn email khác để đăng ký");
            }
        }
        $databaseUsername = $row["username"];
        if (isset($_POST['username'])) {
            $userInputUsername = $_POST['username'];
        
            if ($databaseUsername === $userInputUsername) {
                die("Tên tài khoản đã được sử dụng!\n Vui lòng chọn tên tài khoản khác để đăng ký");
            }
        }
    }
} else {
    echo "0 results";
}

$sql = "INSERT INTO user (ID, sur_name, last_name, phone_num, username, email, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
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

    // Prepare SQL query for inserting ID into member table
    $sql_member = "INSERT INTO member (ID) VALUES (?)";
    $stmt_member = $mysqli->stmt_init();
    if (!$stmt_member->prepare($sql_member)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt_member->bind_param("s", $uniqueID);
    $stmt_member->execute();

    // Prepare SQL query for inserting ID into cart table
    $sql_cart = "INSERT INTO cart (ID) VALUES (?)";
    $stmt_cart = $mysqli->stmt_init();
    if (!$stmt_cart->prepare($sql_cart)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt_cart->bind_param("s", $uniqueID);
    $stmt_cart->execute();

    header("Location: signup_successful.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

?>
