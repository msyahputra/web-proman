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

	if(!empty($_FILES['upload_file']['size']))
	{
		$unik = date("Ymdhis");
		$upload_name = addslashes(trim($_FILES['upload_file']['name']));
		$upload_tmp = $_FILES['upload_file']['tmp_name'];
		$upload_type = $_FILES['upload_file']['type'];
		$upload_size = $_FILES['upload_file']['size'];
	}
	else
	{
		$upload_name = "";
		$upload_type = "";
		$upload_size = "";
	}

if($act != "Delete" && $act != "Update")
{
	$corporate_account = $_POST['corporate_account'];
    $nama_corporate = ucwords(strtolower($_POST['nama_corporate']));
    $sid = $_POST['sid'];
    $layanan = $_POST['layanan'];
    $nama_am = $_POST['nama_am'];
    $kontak_am =  $_POST['kontak_am'];
    $email_am = $_POST['email_am'];
    $nama_eos = $_POST['nama_eos'];
    $kontak_eos = $_POST['kontak_eos'];
    $email_eos = $_POST['email_eos'];
    $alamat = $_POST['alamat'];
    $detail_permintaan = $_POST['detail_permintaan'];
	$tgl_input = date("Y-m-d");
	$input_by = $_SESSION['username_pro'];

	$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
	$div_2 = "</div>";
	$seru = "<p style='width:20px'>!</p>";
	$error = array();
	
	if(empty($corporate_account))
	{
		$error['corporate_account'] = $div_1.$seru.$div_2;
	}
	else
	{
		if(!is_numeric($corporate_account))
		{
			$error['corporate_account'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Number Only!".$div_2;
		}
	}

	if(empty($nama_corporate))
	{
		$error['nama_corporate'] = $div_1.$seru.$div_2;
	}

	if(empty($sid))
	{
		$error['sid'] = $div_1.$seru.$div_2;
	}

	if(empty($layanan))
	{
		$error['layanan'] = $div_1.$seru.$div_2;
	}

	if(empty($nama_am))
	{
		$error['nama_am'] = $div_1.$seru.$div_2;
	}

	if(empty($kontak_am))
	{
		$error['kontak_am'] = $div_1.$seru.$div_2;
	}
	else
	{
		if(!is_numeric($kontak_am))
		{
			$error['kontak_am'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Number Only!".$div_2;
		}
	}

	if(empty($email_am))
	{
		$error['email_am'] = $div_1.$seru.$div_2;
	}

	if(empty($nama_eos))
	{
		$error['nama_eos'] = $div_1.$seru.$div_2;
	}

	if(empty($kontak_eos))
	{
		$error['kontak_eos'] = $div_1.$seru.$div_2;
	}
	else
	{
		if(!is_numeric($kontak_eos))
		{
			$error['kontak_eos'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Number Only!".$div_2;
		}
	}

	if(empty($email_eos))
	{
		$error['email_eos'] = $div_1.$seru.$div_2;
	}

	if(empty($alamat))
	{
		$error['alamat'] = $div_1.$seru.$div_2;
	}

	if(empty($detail_permintaan))
	{
		$error['detail_permintaan'] = $div_1.$seru.$div_2;
	}

	if($act != "Edit")
	{
		if(empty($upload_size))
		{
			$error['upload_file'] = $div_1.$seru.$div_2;
		}
		else
		{
			if($upload_type != "application/pdf")
			{
				$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Format PDF Only !".$div_2;
				$triger_error = "yes";
			}
		}
	}

	if(file_exists($projectQE_path.$upload_name) && !empty($upload_name) )
		{
		$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>File Exists !".$div_2;
		}
		else
		{
			$count_char = strlen($upload_name);

			if($count_char > 104)
			{
				$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:220px;' class='rounded bg-danger text-white text-center' id='alert_proman'>File name to long, Max 100 character!".$div_2;
			}
		}
}

if(empty($error))
{
	if(!empty($act) && $act == "Input")
	{
		$query_no = mysqli_query($con,"select no from tb_project_qe order by no desc limit 0,5");
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

		$id_projectQE = "QE".date("Ymdhis").$corporate_account.$no;

		if(!empty($upload_size))
		{

			$moving = move_uploaded_file($upload_tmp, $projectQE_path.$upload_name);

			if($moving)
			{
				$upload_query = ", upload_name = '".$upload_name."', upload_type = '".$upload_type."', upload_size = '".$upload_size."' ";
			}
		}
		else
		{
			$upload_query = "";
		}

		$query_projectQE = mysqli_query($con,"insert into tb_project_qe set 	no = '".$no."',
																				id_projectQE = '".$id_projectQE."',
																				corporate_account = '".$corporate_account."',
																				nama_corporate = '".$nama_corporate."',
																				sid = '".$sid."',
																				layanan = '".$layanan."',
																				nama_am = '".$nama_am."',
																				kontak_am = '".$kontak_am."',
																				email_am = '".$email_am."',
																				nama_eos = '".$nama_eos."',
																				kontak_eos = '".$kontak_eos."',
																				email_eos = '".$email_eos."',
																				alamat = '".$alamat."',
																				detail_permintaan = '".$detail_permintaan."',
																				tgl_input = '".$tgl_input."',
																				input_by = '".$input_by."'

																					".$upload_query."");

		if($query_projectQE)
		{
			?>
			<script type="text/javascript">
				alert("Data berhasil di input !");
				document.location="index.php?link=data_projectQE";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di input !");
				document.location="index.php?link=form_projectQE";
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
			if(!empty($_POST['upload_name2']))
			{
				$upload_name2 = $_POST['upload_name2'];
			}
			

			$path = $projectQE_path.$upload_name;

			$moving = move_uploaded_file($upload_tmp, $path);

			if($moving)
			{
				if(!empty($upload_size) && !empty($upload_name2))
				{
					unlink($projectQE_path.$upload_name2);
				}
				
				$upload_query = ", upload_name = '".$upload_name."', upload_type = '".$upload_type."', upload_size = '".$upload_size."' ";
			}
			else
			{
				echo "gagal upload";
			}
		}
		else
		{
			$upload_query = "";
		}

		$modify_date = date("Y-m-d");
		$modify_by = $_SESSION['username_pro'];

		$query_edit_projectQE = mysqli_query($con,"update tb_project_qe set corporate_account = '".$corporate_account."',
																			nama_corporate = '".$nama_corporate."',
																			sid = '".$sid."',
																			layanan = '".$layanan."',
																			nama_am = '".$nama_am."',
																			kontak_am = '".$kontak_am."',
																			email_am = '".$email_am."',
																			nama_eos = '".$nama_eos."',
																			kontak_eos = '".$kontak_eos."',
																			email_eos = '".$email_eos."',
																			alamat = '".$alamat."',
																			detail_permintaan = '".$detail_permintaan."',
																			modify_by = '".$modify_by."',
																			modify_date = '".$modify_date."'
																			".$upload_query." 
																			where id_projectQE = '".$key."'
																																");
		if($query_edit_projectQE)
		{

			?>
			<script type="text/javascript">
				alert("Data berhasil di update !");
				document.location="index.php?link=data_projectQE";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di update !");
				document.location="index.php?link=form_projectQE&act_detail=<?php echo $act?>&key=<?php echo $key;?>";
			</script>
			<?php
		}
	}

	if($act == "Delete")
	{
		if(!empty($_POST['key_1']))
			{
				$key_1 = $_POST['key_1'];
			}
			else
			{
				$key_1 = 0;
			}
			
			if(!empty($_POST['key_2']))
			{
				$key_2 = $_POST['key_2'];
			}

			if(!empty($_POST['id_topologi_eks']))
			{
				$id_topologi_eks = $_POST['id_topologi_eks'];
				$query_del_top_eks = mysqli_query($con,"delete from tb_topologi where id_topologi = '".$id_topologi_eks."'");
			}

			if(!empty($_POST['id_topologi_bar']))
			{
				$id_topologi_bar = $_POST['id_topologi_bar'];
				$query_del_top_bar = mysqli_query($con,"delete from tb_topologi where id_topologi = '".$id_topologi_bar."'");
			}

		$query_delete_update_projectQE = mysqli_query($con,"delete from tb_update_projectqe where id_projectqe = '".$key."'");
		$query_delete_projectQE = mysqli_query($con,"delete from tb_project_qe where id_projectQE = '".$key."'");
		
		if($query_delete_projectQE && $query_delete_update_projectQE)
		{
			if($key_1 > 0)
			{
				unlink($projectQE_path.$key_2);
			}
			
			?>
			<script type="text/javascript">
				alert("Data berhasil di hapus !");
				document.location="index.php?link=data_projectQE";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data gagal di hapus !");
				document.location="index.php?link=data_projectQE";
			</script>
			<?php
		}
	}

	if($act == "Update")
	{
		$no_up = mysqli_query($con,"select no from tb_update_projectqe order by no desc limit 0,3");
		$cek_no_up = mysqli_num_rows($no_up);
		$sh_no_up = mysqli_fetch_array($no_up);
		if($cek_no_up <= 0)
		{
			$no = 1;
		}
		else
		{
			$no = $sh_no_up[0] + 1;
		}
		$update_info = $_POST['update_info'];
		$modify_by = $_SESSION['username_pro'];
		$tanggal_update = date("Y-m-d");
		$jam_update = date("h:i:s");

		$id_updateqe = $key.date("Ymdhis");

		$query_update_info = mysqli_query($con,"insert into tb_update_projectqe set 	no = '".$no."',
																						id_projectqe = '".$key."',
																						id_updateqe = '".$id_updateqe."',
																						tanggal_update = '".$tanggal_update."',
																						jam_update = '".$jam_update."',
																						info_update = '".$update_info."',
																						username = '".$modify_by."'");
		if($query_update_info)
		{
			?>
			<script type="text/javascript">
				alert("Update telah di simpan !");
				document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $key;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Note gagal di simpan !");s
				document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $key;?>";
			</script>
			<?php
		}
	}
}
?>