<?php
// $host = "10.60.176.72";
// $username_db = "admdb";
// $password_db = "T3p00ll@20";
// $db_name = "proman";
$host = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "proman";
$con = mysqli_connect($host, $username_db, $password_db, $db_name);



$query = mysqli_query($con, "select * from tb_inventory_imes");

while ($row = mysqli_fetch_array($query)) {
	$data[] = $row;
}
echo json_encode($data);
