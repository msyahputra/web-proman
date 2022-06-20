<?php
$nama_user = ucwords(strtolower($_POST['nama_user']));
$nik_id_perner = $_POST['nik_id_perner'];
$jabatan = ucwords(strtolower($_POST['jabatan']));
$no_telepon = $_POST['no_telepon'];
$gender = $_POST['gender'];
$email = strtolower($_POST['email']);
$alamat = ucwords(strtolower($_POST['alamat']));
$status_user = $_POST['status_user'];
$level_user = $_POST['level_user'];
$username = $_POST['username'];
$create_by = $_SESSION['username_pro'];
$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
$div_1_1 = "<div class='rounded bg-danger text-white text-center' id='alert_upload'>";
$div_2 = "</div>";
$seru = "<p style='width:20px'>!</p>";
$divisi = "";

if(!empty($_POST['password']))
{
	$password = $_POST['password'];
}

if(!empty($_POST['password']))
{
	$rpassword = $_POST['rpassword'];
}

$error = array();

if(!empty($_GET['clue']) && $_GET['clue'] != "deletes")
{
	if(empty($nama_user))
	{
		$error['nama_user'] = $div_1.$seru.$div_2;
	}

	if(empty($nik_id_perner))
	{
		$error['nik_id_perner'] = $div_1.$seru.$div_2;
	}
	else
	{
		$query_nik_id = mysqli_query($con,"select nik_id_perner from tb_user_proman where nik_id_perner = '".$nik_id_perner."'");
		$query_cek_id = mysqli_num_rows($query_nik_id);

		if($query_cek_id > 0 && $_GET['clue'] != "edit")
		{
			$error['nik_id_perner'] = $div_1_1."Nik Sudah Terdaftar !".$div_2;
		}
	}

	if(empty($jabatan))
	{
		$error['jabatan'] = $div_1.$seru.$div_2;
	}

	if(empty($no_telepon))
	{
		$error['no_telepon'] = $div_1.$seru.$div_2;
	}
	else
	{
		if(!is_numeric($no_telepon))
		{
			$error['no_telepon'] = $div_1_1."Hanya Angka !".$div_2;
		}
	}

	if(empty($gender))
	{
		$error['gender'] = $div_1.$seru.$div_2;
	}

	if(empty($email))
	{
		$error['email'] = $div_1.$seru.$div_2;
	}

	if(empty($alamat))
	{
		$error['alamat'] = $div_1.$seru.$div_2;
	}

	if(empty($status_user))
	{
		$error['status_user'] = $div_1.$seru.$div_2;
	}

	if(empty($level_user))
	{
		$error['level_user'] = $div_1.$seru.$div_2;
	}

	if(empty($username))
	{
		$error['username'] = $div_1.$seru.$div_2;
	}
	else
	{
		$query_username = mysqli_query($con,"select username from tb_user_proman where username = '".$username."'");
		$cek_username = mysqli_num_rows($query_username);

		if($cek_username > 0 && $_GET['clue'] != "edit")
		{
			$error['username'] = $div_1_1."Username sudah terdaftar !".$div_2;
		}
	}

	if(empty($password) && $_GET['clue'] != "edit")
	{
		$error['password'] = $div_1.$seru.$div_2;
	}
	else
	{
		if($_GET['clue'] != "edit")
		{
			if($password != $rpassword)
			{
				$error['rpassword'] = $div_1_1."Password Tidak Sama !".$div_2;
			}
		}
	}
}

if(empty($error))
{
	if(!empty($_GET['clue']) && $_GET['clue'] == "input")
	{
		$query_nomor = mysqli_query($con,"select no from tb_user_proman order by no desc limit 0,5");
		$nomor_cek = mysqli_num_rows($query_nomor);
		$sh_nomor = mysqli_fetch_array($query_nomor);

		if($nomor_cek <= 0)
		{
			$no = "1";
		}
		else
		{
			$no = $sh_nomor[0] + 1;
		}

		$id_1 = date("Ymd");

		$id_user = $id_1.$nik_id_perner.$no;
		$create_date = date("Y-m-d");
		$password_encrypted = md5($nik_id_perner.$password);

		$input_query = mysqli_query($con,"insert into tb_user_proman set 	no = '".$no."',
																			id_user = '".$id_user."',
																			nama = '".$nama_user."',
																			divisi = '".$divisi."',
																			jabatan = '".$jabatan."',
																			no_telepon = '".$no_telepon."',
																			gender = '".$gender."',
																			email = '".$email."',
																			alamat = '".$alamat."',
																			nik_id_perner = '".$nik_id_perner."',
																			status_user = '".$status_user."',
																			level_user = '".$level_user."',
																			username = '".$username."',
																			password = '".$password_encrypted."',
																			create_date = '".$create_date."',
																			create_by = '".$create_by."'");
		if($input_query)
		{
			?>
			<script type="text/javascript">
				alert("User Berhasil di Create !");
				document.location="index.php?link=data_user";
			</script>
			<?php
		}
	}

	if(!empty($_GET['clue']) && $_GET['clue'] == "edit")
	{
		$modify_date = date("Y-m-d");
		$modify_by = $_SESSION['username_pro'];
		$key = $_POST['key'];

		$edit_query = mysqli_query($con,"update tb_user_proman set 	nama = '".$nama_user."',
																		jabatan = '".$jabatan."',
																		no_telepon = '".$no_telepon."',
																		gender = '".$gender."',
																		email = '".$email."',
																		alamat = '".$alamat."',
																		nik_id_perner = '".$nik_id_perner."',
																		status_user = '".$status_user."',
																		level_user = '".$level_user."',
																		modify_date = '".$modify_date."',
																		modify_by = '".$modify_by."' 
																		where id_user = '".$key."'");
		if($edit_query)
		{
			?>
			<script type="text/javascript">
				alert("User Berhasil di Update !");
				document.location="index.php?link=data_user";
			</script>
			<?php
		}
	}

	if(!empty($_GET['clue']) && $_GET['clue'] == "deletes")
	{
		$key = $_POST['key'];

		$query_delete = mysqli_query($con,"delete from tb_user_proman where id_user = '".$key."'");

		if($query_delete)
		{
			?>
			<script type="text/javascript">
				alert("User Berhasil di Hapus !");
				document.location="index.php?link=data_user";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("User Gagal di Hapus !");
				document.location="index.php?link=detail_user&dt_user=<?php echo $key;?>";
			</script>
			<?php
		}
	}

}
?>