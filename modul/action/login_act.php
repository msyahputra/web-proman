<?php
$username_proman = mysqli_real_escape_string($con,$_POST['username_proman']);
$password_proman = mysqli_real_escape_string($con,$_POST['password_proman']);
$error = array();
$div_1 = "<div class='alert alert-danger'>";
$div_2 = "</div>";

if(empty($username_proman) || empty($password_proman))
{
	$error['cek'] = $div_1."Username & Password di butuhkan !".$div_2;
	$error_input = "true";
}

if(empty($error_input))
{
	$query_user_login = mysqli_query($con,"select * from tb_user_proman where username = '".$username_proman."'");
	$cek_validasi_data = mysqli_num_rows($query_user_login);
	$data_login = mysqli_fetch_array($query_user_login);

	if($cek_validasi_data <= 0)
	{
		$error['cek'] = $div_1."Username tidak terdaftar !".$div_2;
		$error_user = "true";
	}
	else
	{
		$password_matching = md5($data_login['nik_id_perner'].$password_proman);

		if($password_matching != $data_login['password'])
		{
			$error['cek'] = $div_1."Password yang di masukan salah !".$div_2;
		}
		else
		{
			if($data_login['status_user'] == "deactive")
			{
				$error['cek'] = $div_1."User anda telah di bekukan !".$div_2;
			}
		}
	}
}

if(empty($error))
{
	$query_login_acc = mysqli_query($con,"select * from tb_user_proman where username = '".$username_proman."'");
	$sh_data_login = mysqli_fetch_array($query_login_acc);

	$_SESSION['username_pro'] = $sh_data_login['username'];
	$_SESSION['level_pro'] = $sh_data_login['level_user'];
	$_SESSION['nama_pro'] = $sh_data_login['nama'];
	$_SESSION['user_status_pro'] = $sh_data_login['status_user'];
	$_SESSION['login_var'] = "Yes";

	?>
	<script type="text/javascript">
		document.location="index.php";
	</script>
	<?php
}



?>