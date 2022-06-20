<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "proman";
$con = mysqli_connect($host, $username_db, $password_db, $db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
