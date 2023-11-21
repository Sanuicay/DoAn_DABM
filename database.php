<?php

$host = "localhost";
$dbname = "DABM_database";
$username = "root";
$password = "Danh@mysql@23";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;