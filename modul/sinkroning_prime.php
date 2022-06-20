<?php
 //header('Content-Type: application/json');

 //HTTP username.
$username = 'epic_user';
 //HTTP password.
 $password = 'T3lk0mDes2017';


 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,'https://prime.telkom.co.id/index.php/api/project/DataBastManageService');
 curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
 curl_setopt_array($ch, array(
  CURLOPT_RETURNTRANSFER => TRUE
 ));

 $output = curl_exec($ch);
 curl_close($ch);

//echo $output;

$data = json_decode($output,true);


//echo $data['status'];
//echo $data['message'];
$jml =  count($data['data']);

$berhasil = 0;
$gagal = 0;
$eksisting = 0;

$query_nomor = mysqli_query($con,"select NO from data_prime order by no desc limit 0,2");
$cek_nomor = mysqli_num_rows($query_nomor);

if($cek_nomor <= 0){
	$no = 1;
}else{
	$data_nomor = mysqli_fetch_array($query_nomor);

	$no = $data_nomor['NO'] + 1;
}

for($z=0;$z<$jml;$z++){


		$ID_DATA = $data['data'][$z]['ID_LOP']."-".date("YmdHis")."-".$no;

		$id_bast = $data['data'][$z]['ID_BAST'];
		$id_lop = $data['data'][$z]['ID_LOP'];
		$no_p8 = $data['data'][$z]['NO_P8'];
		$link_p8 = $data['data'][$z]['LINK_P8'];
		$tanggal_p8 = $data['data'][$z]['TANGGAL_P8'];
		$segment = $data['data'][$z]['SEGMENT'];
		$id_mitra = $data['data'][$z]['ID_MITRA'];
		$nama_mitra = $data['data'][$z]['NAMA_MITRA'];
		$nipnas = $data['data'][$z]['NIPNAS'];
		$nama_customer = $data['data'][$z]['NAMA_CUSTOMER'];
		$nama_pekerjaan = $data['data'][$z]['NAMA_PEKERJAAN'];
		$am_nik = $data['data'][$z]['AM_NIK'];
		$am_name = $data['data'][$z]['AM_NAME'];
		$pm_nik = $data['data'][$z]['PM_NIK'];
		$pm_name = $data['data'][$z]['PM_NAME'];
		$nilai_pekerjaan = $data['data'][$z]['NILAI_PEKERJAAN'];
		$no_kl = $data['data'][$z]['NO_KL'];
		$link_kl = $data['data'][$z]['LINK_KL'];
		$tanggal_kl = $data['data'][$z]['TANGGAL_KL'];
		$no_kb = $data['data'][$z]['NO_KB'];
		$link_kb = $data['data'][$z]['LINK_KB'];
		$no_bast = $data['data'][$z]['NO_BAST'];
		$link_bast = $data['data'][$z]['LINK_BAST'];
		$tanggal_bast = $data['data'][$z]['TANGGAL_BAST'];
		$tipe_pekerjaan = $data['data'][$z]['TIPE_PEKERJAAN'];
		$lesson_learned = $data['data'][$z]['LESSON_LEARNED'];

		if(!empty($id_bast)){
			$query_id_bast = mysqli_query($con,"select * from data_prime where ID_BAST = '".$id_bast."'");
			$cek_id_bast = mysqli_num_rows($query_id_bast);

			if($cek_id_bast <= 0){

			$query_insert = mysqli_query($con,"insert into data_prime 	(NO,
																		ID_DATA,
																		ID_BAST,
																		ID_LOP,
																		NO_P8,
																		LINK_P8,
																		TANGGAL_P8,
																		SEGMENT,
																		ID_MITRA,
																		NAMA_MITRA,
																		NIPNAS,
																		NAMA_CUSTOMER,
																		NAMA_PEKERJAAN,
																		AM_NIK,
																		AM_NAME,
																		PM_NIK,
																		PM_NAME,
																		NILAI_PEKERJAAN,
																		NO_KL,
																		LINK_KL,
																		TANGGAL_KL,
																		NO_KB,
																		LINK_KB,	
																		NO_BAST,
																		LINK_BAST,
																		TANGGAL_BAST,
																		TIPE_PEKERJAAN,
																		LESSON_LEARNED
																		)
																		VALUES (
																		'".$no."',
																		'".$ID_DATA."',
																		'".$id_bast."',
																		'".$id_lop."',
																		'".$no_p8."',
																		'".$link_p8."',
																		'".$tanggal_p8."',
																		'".$segment."',
																		'".$id_mitra."',
																		'".$nama_mitra."',
																		'".$nipnas."',
																		'".$nama_customer."',
																		'".$nama_pekerjaan."',
																		'".$am_nik."',
																		'".$am_name."',
																		'".$pm_nik."',
																		'".$pm_name."',
																		'".$nilai_pekerjaan."',
																		'".$no_kl."',
																		'".$link_kl."',
																		'".$tanggal_kl."',
																		'".$no_kb."',
																		'".$link_kb."',
																		'".$no_bast."',
																		'".$link_bast."',
																		'".$tanggal_bast."',
																		'".$tipe_pekerjaan."',
																		'".$lesson_learned."'
																		)
																				");
			if($query_insert){
				$berhasil++;
				$no++;
			}else{
				$gagal++;
			}

			}else{
				$eksisting++;
			}
		}
}
?>

<div class="" style="margin-top:100px;">
	<table class="container text-center table table-bordered" style="width: 30%; background-color: white">
		<thead class="text-white bg-dark">
			<tr>
				<th colspan="3">
					DATA INPUT
				</th>
			</tr>
			<tr>
				<th class="bg-success" style="width:30%">SUCCESS</th>
				<th class="bg-danger" style="width:30%">FAILED</th>
				<th class="bg-warning" style="width:30%">EKSISTING</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $berhasil;?></td>
				<td><?php echo $gagal;?></td>
				<td><?php echo $eksisting;?></td>
			</tr>
		</tbody>
		<tfoot class="bg-dark">
			<tr>
				<td colspan="3">
					<a href="index.php?link=data_prime" class="btn btn-primary">CLOSE</a>
				</td>
			</tr>
		</tfoot>
	</table>
</div>