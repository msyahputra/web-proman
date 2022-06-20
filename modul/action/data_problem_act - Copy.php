<?php
if(!empty($_GET['act']))
{
	$act = $_GET['act'];
}

$sid = $_POST['sid'];
$layanan = $_POST['layanan'];
$corporate_customer = $_POST['corporate_customer'];
$nodin = $_POST['nodin'];
$order = $_POST['order'];
$request_by = $_POST['request_by'];
echo $tanggal_permintaan = $_POST['tanggal_permintaan'];
$detail_permintaan = $_POST['detail_permintaan'];
$history_tiket = $_POST['history_tiket'];
$segment = $_POST['segment'];
$regional = $_POST['regional'];
$witel = $_POST['witel'];
$lokasi = $_POST['lokasi'];
$status = $_POST['status'];
$doc_name = $_FILES['upload_document']['name'];
$doc_tmp = $_FILES['upload_document']['tmp_name'];
$doc_type = $_FILES['upload_document']['type'];
$doc_size = $_FILES['upload_document']['size'];
$last_update = date("Y-m-d");

$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
$div_2 = "</div>";
$error = array();

if(empty($sid))
{
	$error['sid'] = $div_1."!".$div_2;
}

if(empty($layanan))
{
	$error['layanan'] = $div_1."!".$div_2;
}

if(empty($corporate_customer))
{
	$error['corporate_customer'] = $div_1."!".$div_2;
}

if(empty($request_by))
{
	$error['request_by'] = $div_1."!".$div_2;
}

if(empty($tanggal_permintaan))
{
	$error['tanggal_permintaan'] = $div_1."!".$div2;
}

if(empty($detail_permintaan))
{
	$error['detail_permintaan'] = $div_1."!".$div_2;
}

if(empty($history_tiket))
{
	$error['history_tiket'] = $div_1."!".$div_2;
}

if(empty($segment))
{
	$error['segment'] = $div_1."!".$div_2;
}

if(empty($regional))
{
	$error['regional'] = $div_1."!".$div_2;
}

if(empty($witel))
{
	$error['witel'] = $div_1."!".$div_2;
}

if(empty($lokasi))
{
	$error['lokasi'] = $div_1."!".$div_2;
}

if(empty($status))
{
	$error['status'] = $div_1."!".$div_2;
}

if(empty($error))
{
	if($act == "input")
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

		$id_problem = date("YmdHis")."-".$no;

		$query_input = mysqli_query($con,"insert into tb_proman	NO = '".$no."',
																ID_PROBLEM = '".$id_problem."',
																SERVICE_ID = '".$sid."',
																LAYANAN = '".$layanan."',
																CORPORATE_CUSTOMER = '".$corporate_customer."',
																NODIN = '".$nodin."',
																ORDER = '".$order."',
																REQUEST_BY = '".$request_by."',
																TANGGAL_PERMINTAAN = '".$tanggal_permintaan."',
																DETAIL_PERMINTAAN = '".$detail_permintaan."',
																HISTORY_TICKET = '".$history_tiket."',
																SEGMEN = '".$segment."',
																REGIONAL = '".$regional."',
																WITEL = '".$witel."',
																LOKASI = '".$lokasi."',
																STATUS = '".$status."',
																LAST_UPDATE = '".$last_update."'");

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
				//document.location="index.php?link=form_data_problem";
			</script>
			<?php
		}
	}
}
?>