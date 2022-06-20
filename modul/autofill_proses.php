<?php
$host = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "proman";
$con = mysqli_connect($host, $username_db, $password_db, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = mysqli_query($con, "SELECT * FROM tb_segmen WHERE devisi_bud='DES'");
$devisi = mysqli_fetch_array($query);
$data = array('devisi_bud' => $devisi['devisi_bud'], 'segmen' => $devisi['segmen']);
echo json_encode($data);
