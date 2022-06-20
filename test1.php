<?php
	include("koneksi.php");
	$query = mysqli_query($con,"select ID_DATA from data_prime");
	echo $cek = mysqli_num_rows($query);

	if($cek <= 0){
		echo "Tidak ada data";
	}else{
		while($data = mysqli_fetch_array($query)){
			echo $data['ID_DATA'];
		}
	}
?>