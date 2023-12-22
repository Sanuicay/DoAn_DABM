<?php
<<<<<<< HEAD
$mysqli = new mysqli("localhost","root","Danh@mysql@23","dabm_database");
=======
$mysqli = new mysqli("localhost:3307","root","","dabm_database");
>>>>>>> 7ae805706f6666dd36a670f14a4577aa12a0e12d

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$mysqli -> set_charset("utf8");


return $mysqli;
?>