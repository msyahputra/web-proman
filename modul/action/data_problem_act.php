<?php
if(!empty($_GET['act']))
{
	$act = $_GET['act'];
}

$sid = str_replace(" ","",$_POST['sid']);
$layanan = ucwords(strtolower($_POST['layanan']));
$corporate_customer = ucwords(strtolower($_POST['corporate_customer']));
$nodin = $_POST['nodin'];
$order = $_POST['order'];
$request_by = $_POST['request_by'];
$tanggal_permintaan = $_POST['tanggal_permintaan'];
$detail_permintaan = addslashes(trim($_POST['detail_permintaan']));
$history_tiket = strtoupper($_POST['history_tiket']);
$segment = $_POST['segment'];
$regional = $_POST['regional'];
$witel = ucwords(strtolower($_POST['witel']));
$lokasi = ucwords(strtolower($_POST['lokasi']));
$status = $_POST['status'];
$doc_name = $_FILES['upload_document']['name'];
$doc_tmp = $_FILES['upload_document']['tmp_name'];
$doc_type = $_FILES['upload_document']['type'];
$doc_size = $_FILES['upload_document']['size'];
$last_update = date("Y-m-d");
$key = $_POST['key'];
$username = $_SESSION['username_pro'];

$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
$div_2 = "</div>";
$seru = "<p style='width:20px'>!</p>";
$error = array();

if(empty($sid))
{
	$error['sid'] = $div_1.$seru.$div_2;
}

if(empty($layanan))
{
	$error['layanan'] = $div_1.$seru.$div_2;
}

if(empty($corporate_customer))
{
	$error['corporate_customer'] = $div_1.$seru.$div_2;
}

if(empty($request_by))
{
	$error['request_by'] = $div_1.$seru.$div_2;
}

if(empty($tanggal_permintaan))
{
	$error['tanggal_permintaan'] = $div_1.$seru.$div_2;
}

if(empty($detail_permintaan))
{
	$error['detail_permintaan'] = $div_1.$seru.$div_2;
}

if(empty($history_tiket))
{
	$error['history_tiket'] = $div_1.$seru.$div_2;
}

if(empty($segment))
{
	$error['segment'] = $div_1.$seru.$div_2;
}

if(empty($regional))
{
	$error['regional'] = $div_1.$seru.$div_2;
}

if(empty($witel))
{
	$error['witel'] = $div_1.$seru.$div_2;
}

if(empty($lokasi))
{
	$error['lokasi'] = $div_1.$seru.$div_2;
}

if(empty($status))
{
	$error['status'] = $div_1.$seru.$div_2;
}

if(!empty($doc_type) && $doc_type != "application/pdf")
{
	$error['upload_file'] = "<div class='rounded bg-danger text-white text-center' id='alert_upload'>PDF Only !</div>";
}
else
{
	$jumlah_word = strlen($doc_name);
	if($jumlah_word > 104)
	{
		$kelebihan = $jumlah_word - 104;
		$error['upload_file'] = "<div class='rounded bg-danger text-white text-center' id='alert_upload'>File name to long, Max 100 Character!</div>";
	}
}

if(empty($error))
{
	if($act == "Input")
	{
		$data_norut = mysqli_query($con,"select NO from tb_proman order by NO desc limit 0, 5");
		$cek_norut = mysqli_num_rows($data_norut);
		$show_norut = mysqli_fetch_array($data_norut);

		if($cek_norut <= 0)
		{
			$no = 1;
		}
		else
		{
			$no = $show_norut[0] + 1;
		}

		if($no <= 9)
		{
			$zero = "0";
		}
		else
		{
			$zero = "";
		}

		$id_problem = date("YmdHis").$zero.$no;

		if(!empty($doc_size) && $doc_size > 0)
		{
			$path_eksekusi = $problem_path.$doc_name;
			move_uploaded_file($doc_tmp, $path_eksekusi);

			$query_upload = ", DOC_NAME = '".$doc_name."', DOC_TYPE = '".$doc_type."', DOC_SIZE = '".$doc_size."'";
		}
		else
		{
			$query_upload = "";
		}

		$query_input = mysqli_query($con,"insert into tb_proman	set NO = '".$no."',
																	ID_PROBLEM = '".$id_problem."',
																	SERVICE_ID = '".$sid."',
																	LAYANAN = '".$layanan."',
																	CORPORATE_CUSTOMER = '".$corporate_customer."',
																	NODIN = '".$nodin."',
																	ORDERS = '".$order."',
																	REQUEST_BY = '".$request_by."',
																	TANGGAL_PERMINTAAN = '".$tanggal_permintaan."',
																	DETAIL_PERMINTAAN = '".$detail_permintaan."',
																	HISTORY_TICKET = '".$history_tiket."',
																	SEGMEN = '".$segment."',
																	REGIONAL = '".$regional."',
																	WITEL = '".$witel."',
																	LOKASI = '".$lokasi."',
																	STATUS = '".$status."',
																	USERNAME = '".$username."',
																	LAST_UPDATE = '".$last_update."'".$query_upload."");

		if($query_input)
		{
			?>
			<script type="text/javascript">
				alert("Data Berhasil di simpan !");
				document.location="index.php?link=data_problem";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data Gagal di simpan !");
				document.location="index.php?link=form_data_problem";
			</script>
			<?php
		}
	}

	if($act == "Edit")
	{

		$key = $_POST['key'];

		if(!empty($doc_size) && $doc_size > 0)
		{
			$panggil_link = mysqli_query($con,"select DOC_NAME from tb_proman where ID_PROBLEM = '".$key."'");
			$unlink_file = mysqli_fetch_array($panggil_link);

			if(!empty($unlink_file['DOC_SIZE']) && $unlink_file['DOC_SIZE'] < 0)
			{
				unlink($problem_path.$unlink_file['DOC_NAME']);
			}

			$path = $problem_path.$doc_name;
			move_uploaded_file($doc_tmp, $path);

			$query_upload = ", DOC_NAME = '".$doc_name."', DOC_TYPE = '".$doc_type."', DOC_SIZE = '".$doc_size."'";
		}
		else
		{
			$query_upload = "";
		}

		$query_edit = mysqli_query($con,"update tb_proman	set 	SERVICE_ID = '".$sid."',
																	LAYANAN = '".$layanan."',
																	CORPORATE_CUSTOMER = '".$corporate_customer."',
																	NODIN = '".$nodin."',
																	ORDERS = '".$order."',
																	REQUEST_BY = '".$request_by."',
																	TANGGAL_PERMINTAAN = '".$tanggal_permintaan."',
																	DETAIL_PERMINTAAN = '".$detail_permintaan."',
																	HISTORY_TICKET = '".$history_tiket."',
																	SEGMEN = '".$segment."',
																	REGIONAL = '".$regional."',
																	WITEL = '".$witel."',
																	LOKASI = '".$lokasi."',
																	STATUS = '".$status."'".$query_upload." 
																	where ID_PROBLEM = '".$key."'");

		if($query_edit)
		{
			?>
			<script type="text/javascript">
				alert("Data Berhasil di edit !");
				document.location="index.php?link=detail_problem&dt_proman=<?php echo $key;?>&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data Gagal di edit !");
				document.location="index.php?link=data_problem&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
	}
}
?>