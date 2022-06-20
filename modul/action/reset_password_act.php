<?php
$nik_id = $_POST['nik_id'];
$username = $_POST['username'];
$new_password = $_POST['new_password'];
$re_password = $_POST['re_password'];
$last_modify = date("Y-m-d");
$modify_by = $_SESSION['username_pro'];

$error = array();
$div_1 = "<div class='text-white text-center bg-danger'>";
$div_2 = "</div>";

if(empty($nik_id) || empty($username) || empty($new_password))
{
	$error['alert'] = $div_1."Semua kolom wajib di input !".$div_2;
}
else
{
	if(!empty($nik_id))
	{
		$query_nik = mysqli_query($con,"select nik_id_perner from tb_user_proman where nik_id_perner = '".$nik_id."'");
		$cek_nik = mysqli_num_rows($query_nik);

		if($cek_nik <= 0)
		{
			$error['alert'] = $div_1."NIK atau Perner tidak terdaftar !".$div_2;
		}
		else
		{
			if(!empty($username))
			{
				$query_username = mysqli_query($con,"select username from tb_user_proman where username = '".$username."'");
				$cek_username = mysqli_num_rows($query_username);

				if($cek_username <= 0)
				{
					$error['alert'] = $div_1."Username tidak terdaftar !".$div_2;
				}
				else
				{
					$query_nik_user = mysqli_query($con,"select username from tb_user_proman where nik_id_perner = '".$nik_id."'");
					$data_nik_user = mysqli_fetch_array($query_nik_user);

					if($username != $data_nik_user['username'])
					{
						$error['alert'] = $div_1."NIK atau Perner tidak terdaftar untuk user : ".$username." !".$div_2;
					}
					else
					{
						if($new_password != $re_password)
						{
							$error['alert'] = $div_1."Password yang di input tidak sama !".$div_2;
						}
					}
				}
			}
		}
	}
}

if(empty($error))
{
	$encrypt_pass = md5($nik_id.$new_password);
	$query_reset = mysqli_query($con,"update tb_user_proman set password = '".$encrypt_pass."' where nik_id_perner = '".$nik_id."'");

	if($query_reset)
	{
		?>
		<script type="text/javascript">
			alert("Password berhasil di reset !");
			document.location = "index.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Password gagal di reset !");
			document.location = "index.php";
		</script>
		<?php
	}
}
?>	