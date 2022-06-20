<?php
if(!empty($_GET['act'])){
	$act = $_GET['act'];
}else{
	?>
	<script type="text/javascript">
		alert("Something went wrong!");
		//document.location = "index.php";
	</script>
	<?php
}

$error = array();

if($act == "update"){
	$panduan = $_POST['panduan'];
	$pic_mitra = $_POST['pic_mitra'];
	$no_telepon_mitra = $_POST['no_pic_mitra'];
	$catatan_handover = $_POST['catatan_handover'];
	$sla = $_POST['sla'];
	$deskripsi_sla = $_POST['deskripsi_sla'];
	$mttr_respone = $_POST['mttr_respone'];
	$mttr_recovery = $_POST['mttr_recovery'];
	$manager_im = $_POST['manager_im'];
	$no_telepon_mgr = $_POST['no_telepon_mgr'];
	$eos_telkom = $_POST['eos_telkom'];
	$no_telepon_eos = $_POST['no_telepon_eos'];

	if($_FILES['file_mom']['size'] > 0){
		$nama_file = $_FILES['file_mom']['name'];
		$tmp_file = $_FILES['file_mom']['tmp_name'];
		$tipe_file = $_FILES['file_mom']['type'];
		$size_file = $_FILES['file_mom']['size'];
	}


	if(!empty($no_telepon_mitra) && !is_numeric($no_telepon_mitra)){
		$error['telepon_mitra'] = "Hanya angka !";
	}

	if(!empty($no_telepon_mgr) && !is_numeric($no_telepon_mgr)){
		$error['telepon_mgr'] = "Hanya angka !";
	}

	if(!empty($no_telepon_eos) && !is_numeric($no_telepon_eos)){
		$error['telepon_eos'] = "Hanya angka !";
	}

	if(!empty($tipe_file) && $tipe_file != "application/pdf"){
		$error['file'] = "Hanya file PDF !";
	}
}

if(empty($error)){

	if($act == "update"){
		$query_update = mysqli_query($con,"update data_prime set 	PIC_MITRA = '".$pic_mitra."', 
																	NO_TELEPON_MITRA = '".$no_telepon_mitra."',
																	SLA = '".$sla."',
																	DESKRIPSI_SLA = '".$deskripsi_sla."',
																	MTTR_RESPONE = '".$mttr_respone."',
																	MTTR_RECOVERY = '".$mttr_recovery."',
																	MANAGER_IM = '".$manager_im."',
																	NO_TELEPON_MGR = '".$no_telepon_mgr."',
																	EOS_TELKOM = '".$eos_telkom."',
																	NO_TELEPON_EOS = '".$no_telepon_eos."',
																	CATATAN_HANDOVER = '".$catatan_handover."'
																	where ID_DATA = '".$panduan."'
																									");

		if($query_update){

			$query_file_no = mysqli_query($con,"select no from file_project order by no desc limit 0,3");
			$cek_file_no = mysqli_num_rows($query_file_no);
			$sh_file_no = mysqli_fetch_array($query_file_no);
			if($cek_file_no <= 0){
				$no = 1;
			}else{
				$no = $sh_file_no[0] + 1;
			}

			$id_file = date('YmdHis').$size_file.$no;

			$query_insert_file = mysqli_query($con,"insert into file_project 	( 	no,
																					id_file,
																					nama_file,
																					tipe_file,
																					size_file,
																					id_data
																				) values (
																					'".$no."',
																					'".$id_file."',
																					'".$nama_file."',
																					'".$tipe_file."',
																					'".$size_file."',
																					'".$panduan."'
																					)
																									");
			if($query_insert_file){
				$upload_mom = move_uploaded_file($tmp_file, $project_path.$nama_file);

				if($upload_mom){
					?>
					<script type="text/javascript">
						alert("Data berhasil diperbaharui!");
						document.location = "index.php?link=detail_project&keys=<?php echo $key;?>"
					</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
						alert("File gagal disimpan diserver!");
						document.location = "index.php?link=detail_project&keys=<?php echo $key;?>"
					</script>
					<?php
				}

			}else{
				?>
				<script type="text/javascript">
					alert("Data file yang diupload gagal disimpan!");
					//document.location = "index.php?link=detail_project&keys=<?php echo $key;?>"
				</script>
				<?php
			}

		}else{
			?>
			<script type="text/javascript">
				alert("Data gagal diperbaharui!");
				document.location = "index.php?link=detail_project&keys=<?php echo $key;?>"
			</script>
			<?php
		}
	}

	if($act == "input_sid"){
		$ao = $_POST['ao'];
		$sid = $_POST['sid'];
		$lokasi = $_POST['lokasi'];
		$id_data = $_POST['id_data'];

		$data = count($ao);

		for($r=0;$r<$data;$r++){
			if(!empty($sid[$r])){
				$query_no = mysqli_query($con,"select no from tb_sid order by no desc limit 0,2");
				$cek_no = mysqli_num_rows($query_no);

				if($cek_no <=0){
					$no = 1;
				}else{
					$nomor = mysqli_fetch_array($query_no);
					$no = $nomor[0] + 1;
				}

			$id_sid = $id_data."_".$no;

				$query_sid = mysqli_query($con,"insert into tb_sid 
																	(no,
																	id_data,
																	id_sid,
																	ao,
																	sid,
																	lokasi)
																	values
																	('".$no."',
																	'".$id_data."',
																	'".$id_sid."',
																	'".$ao[$r]."',
																	'".$sid[$r]."',
																	'".$lokasi[$r]."'
																	)");
				if($query_sid){
					?>
					<script type="text/javascript">
						alert("Data SID berhasil disimpan!");
						document.location = "index.php?link=detail_project&keys=<?php echo $id_data;?>";
					</script>
					<?php
				}else{
					$keys = $id_data;
					?>
					<script type="text/javascript">
						alert("Data SID gagal disimpan!");
						//document.location = "index.php?link=detail_project&keys=<?php echo $id_data;?>";
					</script>
					<?php
				}
			}

		}

	}

	if($act == 'delete_sid'){
		$id_data = $_POST['id_data'];
		$id_sid = $_POST['id_sid'];
		$sid = $_POST['sid'];

		$query_delete = mysqli_query($con,"delete from tb_sid where id_sid = '".$id_sid."'");

		if($query_delete){
			?>
			<script type="text/javascript">
				alert("SID <?php echo $sid;?> telah dihapus!");
				document.location = "index.php?link=detail_project&keys=<?php echo $id_data;?>";
			</script>
			<?php
		}
	}

	if($act == "import_sid"){

		include("plugin/excel_reader/excel_reader2.php");

		$id_data = $_POST['id_data'];
		$data_1 = $_FILES['import_excel']['name'];
		$data_2 = $_FILES['import_excel']['tmp_name'];
		$data_3 = $_FILES['import_excel']['size'];
		$data_4 = $_FILES['import_excel']['type'];

		$target = basename($_FILES['import_excel']['name']) ;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $target);

		chmod($_FILES['import_excel']['name'],0777);

		$data = new Spreadsheet_Excel_Reader($_FILES['import_excel']['name'],false);

		$jumlah_baris = $data->rowcount($sheet_index=0);

		$query_no = mysqli_query($con,"select no from tb_sid order by no desc limit 0,2");
					$cek_no = mysqli_num_rows($query_no);

					if($cek_no <= 0){
						$no = 1;
					}else{
						$data_no = mysqli_fetch_array($query_no);
						$no = $data_no[0] + 1;
					}

		$berhasil = 0;
		for ($i=2; $i<=$jumlah_baris; $i++){
			$ao 	= $data->val($i, 1);
			$sid	= $data->val($i, 2);
			$lokasi	= $data->val($i, 3);

			if(!empty($sid)){
				$query_sid = mysqli_query($con,"select * from tb_sid where sid = '".$sid."'");
				$cek_sid = mysqli_num_rows($query_sid);

				if($cek_sid <= 0){
					$query_no = mysqli_query($con,"select no from tb_sid order by no desc limit 0,2");
					$cek_no = mysqli_num_rows($query_no);

					if($cek_no <= 0){
						$no = 1;
					}else{
						$data_no = mysqli_fetch_array($query_no);
						$no = $data_no[0] + 1;
					}

					$query_insert = mysqli_query($con,"insert into tb_sid 	(no,
																			id_sid,
																			id_data,
																			ao,
																			sid,
																			lokasi)
																			values
																			('".$no."',
																			'".$id_data."-".$no."',
																			'".$id_data."',
																			'".$ao."',
																			'".$sid."',
																			'".$lokasi."'
																			)
																				");
					$no++;
					$berhasil++;
				}
			}
		}

		unlink($_FILES['import_excel']['name']);
		?>
		<script type="text/javascript">
			alert("<?php echo $berhasil;?> SID telah berhasil diinput!");
			document.location="index.php?link=detail_project&keys=<?php echo $id_data;?>";
		</script>
		<?php
	}

}
?>