<?php
$data_1 = $_FILES['import_excel']['name'];
$data_2 = $_FILES['import_excel']['tmp_name'];
$data_3 = $_FILES['import_excel']['size'];
$data_4 = $_FILES['import_excel']['type'];

$error = array();
$div1 = "<div class='alert alert-danger text-center container' style='width:500px;margin-top:15px;'>";
$div2 = "</div>";

if(empty($data_1) && empty($data_2) && empty($data_3))
{
	$error['alert'] = $div1."Belum ada file dipilih!".$div2;
}
else
{
	if($data_4 == "application/vnd.ms-excel")
	{
		
	}
	else
	{
		$error['alert'] = $div1."Format file harus excel 2003!".$div2;
	}
}

if(empty($error))
{
	$target = basename($_FILES['import_excel']['name']) ;
	move_uploaded_file($_FILES['import_excel']['tmp_name'], $target);


	chmod($_FILES['import_excel']['name'],0777);


	$data = new Spreadsheet_Excel_Reader($_FILES['import_excel']['name'],false);

	$jumlah_baris = $data->rowcount($sheet_index=0);


	$berhasil = 0;
	for ($i=2; $i<=$jumlah_baris; $i++)
	{
		$nama_customer		= $data->val($i, 1);
		$sid				= $data->val($i, 2);
		$layanan 			= $data->val($i, 3);
		$type_link			= $data->val($i, 4);
		$deskripsi_link		= $data->val($i, 5);
		$bandwidth			= $data->val($i, 6);
		$pe					= $data->val($i, 7);
		$interface			= $data->val($i, 8);
		$me_end1			= $data->val($i, 9);
		$me_end2			= $data->val($i, 10);
		$akses				= $data->val($i, 11);
		$topologi			= $data->val($i, 12);
		$routing_type		= $data->val($i, 13);
		$nama_sto			= $data->val($i, 14);
		$segmen				= $data->val($i, 15);
		$tgl_failover 		= $data->val($i, 16);
		$tgl_rollback		= $data->val($i, 17);
		$status_failover	= $data->val($i, 18);
		$divisi				= $data->val($i, 19);
		$top_cc				= $data->val($i, 20);
		
		if(!empty($nama_customer)){
			
			$query_nomor = mysqli_query($con, "select no from tb_failover_proman order by no desc limit 0,1");
			$cek_query_nomor = mysqli_num_rows($query_nomor);
			$data_nomor = mysqli_fetch_array($query_nomor);
			
			if($cek_query_nomor < 1){
				$no = 1 ;
			}else{
				$no = $data_nomor[0] + 1;
			}
			
			$id_failover = date("Ymd").$no;
			$create_date = date("Y-m-d");
			
			$query_insert = mysqli_query($con, "	insert into 
													tb_failover_proman
													(
													no,
													id_failover,
													nama_customer,
													sid,
													layanan,
													type_link,
													deskripsi_link,
													bandwidth,
													pe,
													interface,
													me_end1,
													me_end2,
													akses,
													topologi,
													routing_type,
													nama_sto,
													segmen,
													tgl_failover,
													tgl_rollback,
													status_failover,
													divisi,
													top_cc,
													create_by,
													create_date
													)
													values
													(
													'".$no."',
													'".$id_failover."',
													'".$nama_customer."',
													'".$sid."',
													'".$layanan."',
													'".$type_link."',
													'".$deskripsi_link."',
													'".$bandwidth."',
													'".$pe."',
													'".$interface."',
													'".$me_end1."',
													'".$me_end2."',
													'".$akses."',
													'".$topologi."',
													'".$routing_type."',
													'".$nama_sto."',
													'".$segmen."',
													'".$tgl_failover."',
													'".$tgl_rollback."',
													'".$status_failover."',
													'".$divisi."',
													'".$top_cc."',
													'IMPORT',
													'".$create_date."'
													)
													");
													$berhasil++;
		}

		
	}


	unlink($_FILES['import_excel']['name']);
	?>
	<script type="text/javascript">
		alert("<?php echo $berhasil;?> data telah berhasil diinput!");
		document.location="index.php?link=data_failover";
	</script>
	<?php
}
?>