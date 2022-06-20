<?php

include("koneksi.php");
$query = mysqli_query($con,"select * from tb_inventory_imes");
$cek = mysqli_num_rows($query);

if($cek > 0){
	while($row = mysqli_fetch_array($query)){
	$data[] = $row;
}
//echo '<pre>'; print_r($data); echo '</pre>';				
echo json_encode($data);
?>