<?php
$mysqli = new mysqli("localhost","root","Danh@mysql@23","dabm_database");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$mysqli -> set_charset("utf8");


return $mysqli;
?>