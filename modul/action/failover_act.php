<?php
if(!empty($_GET['act']))
{
	$act = $_GET['act'];

	if(!empty($_POST['key']))
	{
		$key = $_POST['key'];
	}
}

if(!empty($_POST['nama_doc']))
	{
		$nama_doc = $_POST['nama_doc'];
	}

if($act != "Delete" && $act != "Update")
{
	$nama_customer = ucwords(strtolower($_POST['nama_customer']));
	$sid = $_POST['sid'];
	$layanan  = ucwords(strtolower($_POST['layanan']));
	$deskripsi_link = $_POST['deskripsi_link'];
	$bandwidth = $_POST['bandwidth'];
	$pe = strtoupper($_POST['pe']);
	$interface = $_POST['interface'];
	$me_end1 = strtoupper($_POST['me_end1']);
	$me_end2 = strtoupper($_POST['me_end2']);
	$akses = $_POST['akses'];
	$routing_type = $_POST['routing_type'];
	$nama_sto = $_POST['nama_sto'];
	$divisi = $_POST['divisi'];
	$segmen = $_POST['segmen'];
	$tgl_failover = $_POST['tgl_failover'];
	$tgl_rollback = $_POST['tgl_rollback'];
	$status_failover = $_POST['status_failover'];
	$create_date = date("Y-m-d");
	$create_by = $_SESSION['username_pro'];

	$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
	$div_2 = "</div>";
	$seru = "<p style='width:20px'>!</p>";
	$error = array();
	
	if(!empty($_POST['type_link']))
	{
		$type_link = $_POST['type_link'];
	}else{
		$type_link = "";
	}
	
	if(!empty($_FILES['upload_file']['size']))
	{
		$unik = date("Ymdhis");
		$upload_name = $unik."_".$_FILES['upload_file']['name'];
		$upload_tmp = $_FILES['upload_file']['tmp_name'];
		$upload_type = $_FILES['upload_file']['type'];
		$upload_size = $_FILES['upload_file']['size'];
	}else{
		$upload_name = "";
		$upload_type = "";
		$upload_size = "0";
	}

	if(empty($nama_customer))
	{
		$error['nama_customer'] = $div_1.$seru.$div_2;
	}

	if(empty($sid))
	{
		$error['sid'] = $div_1.$seru.$div_2;
	}

	if(empty($layanan))
	{
		$error['layanan'] = $div_1.$seru.$div_2;
	}

	if(empty($bandwidth))
	{
		$error['bandwidth'] = $div_1.$seru.$div_2;
	}
	else
	{
		if(!is_numeric($bandwidth))
		{
			$error['bandwidth'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !".$div_2;
		}
	}

	if(empty($pe))
	{
		$error['pe'] = $div_1.$seru.$div_2;
	}

	if(empty($interface))
	{
		$error['interface'] = $div_1.$seru.$div_2;
	}

	if(empty($me_end1))
	{
		$error['me_end1'] = $div_1.$seru.$div_2;
	}

	if(empty($me_end2))
	{
		$error['me_end2'] = $div_1.$seru.$div_2;
	}

	if(empty($akses))
	{
		$error['akses'] = $div_1.$seru.$div_2;
	}

	if(empty($routing_type))
	{
		$error['routing_type'] = $div_1.$seru.$div_2;
	}

	if(empty($nama_sto))
	{
		$error['nama_sto'] = $div_1.$seru.$div_2;
	}

	if(empty($divisi))
	{
		$error['divisi'] = $div_1.$seru.$div_2;
	}

	if(empty($segmen))
	{
		$error['segmen'] = $div_1.$seru.$div_2;
	}

	if(empty($tgl_failover))
	{
		$error['tgl_failover'] = $div_1.$seru.$div_2;
	}

	if(empty($tgl_rollback))
	{
		$error['tgl_rollback'] = $div_1.$seru.$div_2;
	}

	/*
	if(empty($status_failover))
	{
		$error['status_failover'] = $div_1.$seru.$div_2;
	}
	*/

	if(!empty($upload_size))
	{
		if($upload_type != "application/pdf")
		{
			$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Format PDF Only !".$div_2;
		}
	}
}

if(empty($error))
{
	if(!empty($act) && $act == "Input")
	{
		$query_no = mysqli_query($con,"select no from tb_failover_proman order by no desc limit 0,5");
		$cek_no = mysqli_num_rows($query_no);
		$shono = mysqli_fetch_array($query_no);

		if($cek_no <= 0)
		{
			$no = 1;
		}
		else
		{
			$no = $shono['no'] + 1;
		}


		$id_failover = date("Ymdhis").$no;


		if(!empty($upload_size))
		{
			$path = "doc_file/failover/".$upload_name;

			$moving = move_uploaded_file($upload_tmp, $path);

			if($moving)
			{
				$upload_query = ", nama_doc = '".$upload_name."', type_doc = '".$upload_type."', size_doc = '".$upload_size."' ";
			}
		}
		else
		{
			$upload_query = "";
		}

		$query_failover = mysqli_query($con,"insert into tb_failover_proman (	no,
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
																				routing_type,
																				nama_sto,
																				segmen,
																				tgl_failover,
																				tgl_rollback,
																				status_failover,
																				create_date,
																				create_by,
																				nama_doc,
																				type_doc,
																				size_doc,
																				divisi
																				) values (
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
																				'".$routing_type."',
																				'".$nama_sto."',
																				'".$segmen."',
																				'".$tgl_failover."',
																				'".$tgl_rollback."',
																				'".$status_failover."',
																				'".$create_date."',
																				'".$create_by."',
																				'".$upload_name."',
																				'".$upload_type."',
																				'".$upload_size."'
																				'".$divisi."'
																				)");
		if($query_failover)
		{
			?>
			<script type="text/javascript">
				alert("Data berhasil di create !");
				document.location="index.php?link=data_failover";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di create !");
				//document.location="index.php?link=data_failover";
			</script>
			<?php
		}
	}

	if(!empty($act) && $act == "Edit")
	{
		if(!empty($_POST['key']))
		{
			$key = $_POST['key'];
		}

		if(!empty($upload_size))
		{
			$path = "doc_file/failover/".$upload_name;

			$moving = move_uploaded_file($upload_tmp, $path);

			if($moving)
			{
				if(!empty($nama_doc))
				{
					unlink($failover_path.$nama_doc);
				}
				
				$upload_query = ", nama_doc = '".$upload_name."', type_doc = '".$upload_type."', size_doc = '".$upload_size."' ";
			}
		}
		else
		{
			$upload_query = "";
		}

		$modify_date = date("Y-m-d");
		$modify_by = $_SESSION['username_pro'];

		$query_edit_failover = mysqli_query($con,"update tb_failover_proman set nama_customer = '".$nama_customer."',
																				sid = '".$sid."',
																				layanan = '".$layanan."',
																				type_link = '".$type_link."',
																				deskripsi_link = '".$deskripsi_link."',
																				bandwidth = '".$bandwidth."',
																				pe = '".$pe."',
																				interface = '".$interface."',
																				me_end1 = '".$me_end1."',
																				me_end2 = '".$me_end2."',
																				akses = '".$akses."',
																				routing_type = '".$routing_type."',
																				nama_sto = '".$nama_sto."',
																				segmen = '".$segmen."',
																				divisi = '".$divisi."',
																				tgl_failover = '".$tgl_failover."',
																				tgl_rollback = '".$tgl_rollback."',
																				status_failover = '".$status_failover."',
																				modify_date = '".$modify_date."',
																				modify_by = '".$modify_by."' 
																				".$upload_query." 
																				where id_failover = '".$key."'
																														");
		if($query_edit_failover)
		{

			?>
			<script type="text/javascript">
				alert("Data berhasil di update !");
				document.location="index.php?link=data_failover";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di update !");
				document.location="index.php?link=form_failover";
			</script>
			<?php
		}
	}

	if($act == "Delete")
	{
		$query_delete_failover = mysqli_query($con,"delete from tb_failover_proman where id_failover = '".$key."'");

		if($query_delete_failover)
		{
			unlink($failover_path.$nama_doc);
			?>
			<script type="text/javascript">
				alert("Data berhasil di hapus !");
				document.location="index.php?link=data_failover";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di hapus !");
				document.location="index.php?link=data_failover";
			</script>
			<?php
		}
	}

	if($act == "Update")
	{
		$key = $_POST['key'];
		$update_info = $_POST['update_info'];
		$update_by = $_SESSION['username_pro'];
		$update_date = date("Y-m-d");
		$update_time = date("H:i:s");

		$query_cek_no = mysqli_query($con,"select no from tb_update_failover order by no desc limit 0,5");
		$cek_no = mysqli_num_rows($query_cek_no);
		$dtno = mysqli_fetch_array($query_cek_no);

		if($cek_no <= 0)
		{
			$no = 1;
		}
		else
		{
			$no = $dtno['no'] + 1;
		}

		$id_update_failover = $key."-".$no;

		$query_update_failover = mysqli_query($con,"insert into tb_update_failover set 	no = '".$no."',
																						id_update_failover = '".$id_update_failover."',
																						id_failover = '".$key."',
																						update_info = '".$update_info."',
																						update_by = '".$update_by."',
																						update_date = '".$update_date."',
																						update_time = '".$update_time."'
																									");
		if($query_update_failover)
		{
			?>
			<script type="text/javascript">
				alert("Update telah di simpan !");
				document.location="index.php?link=detail_failover&dt_proman=<?php echo $key;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Update gagal di simpan !");
				document.location="index.php?link=detail_failover&dt_proman=<?php echo $key;?>";
			</script>
			<?php
		}
	}
}
?>