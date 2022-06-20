<?php

if(!empty($_GET['act'])){
	if(!empty($_GET['keys'])){
		$key = $_GET['keys'];
	}else{
		?>
		<script type="text/javascript">
			alert("Something went wrong !");
			//document.location = "index.php";
		</script>
		<?php
	}

	$query_prime_detail = mysqli_query($con,"select * from data_prime where ID_DATA = '".$key."'");
	$sh_data = mysqli_fetch_array($query_prime_detail);

	$panduan = $sh_data['ID_DATA'];
	$id_lop = $sh_data['ID_LOP'];
	$nama_pekerjaan = $sh_data['NAMA_PEKERJAAN'];
	$nilai_pekerjaan = "Rp " . number_format($sh_data['NILAI_PEKERJAAN'],2,',','.');
	$nama_customer = $sh_data['NIPNAS'];
	$am_name = $sh_data['AM_NAME'];
	$segmen = $sh_data['SEGMENT'];
	$jenis_layanan = $sh_data['TIPE_PEKERJAAN'];
	$mitra = $sh_data['ID_MITRA'];
	$no_kb = $sh_data['NO_KB'];
	$tanggal_kb = $sh_data['TANGGAL_KB'];
	$no_p8 = $sh_data['NO_P8'];
	$tanggal_p8 = $sh_data['TANGGAL_P8'];
	$no_kl = $sh_data['NO_KL'];
	$tanggal_kl = $sh_data['TANGGAL_KL'];
	$pic_mitra = $sh_data['PIC_MITRA'];
	$no_telepon_mitra = $sh_data['NO_TELEPON_MITRA'];
	$catatan_handover = $sh_data['CATATAN_HANDOVER'];
	$sla = $sh_data['SLA'];
	$deskripsi_sla = $sh_data['DESKRIPSI_SLA'];
	$mttr_response = $sh_data['MTTR_RESPONE'];
	$mttr_recovery = $sh_data['MTTR_RECOVERY'];
	$manager_im = $sh_data['MANAGER_IM'];
	$no_telepon_mgr = $sh_data['NO_TELEPON_MGR'];
	$eos_telkom = $sh_data['EOS_TELKOM'];
	$no_telepon_eos = $sh_data['NO_TELEPON_EOS'];

	$no_bast = $sh_data['NO_BAST'];
	$link_bast = $sh_data['LINK_BAST'];

	}

	if(!empty($_GET['keys'])){
		$key = $_GET['keys'];
	}else{
		?>
		<script type="text/javascript">
			alert("Something went wrong !");
			document.location = "index.php";
		</script>
		<?php
}


if($_POST){
	include("action/action_project.php");
}
?>

<div>
	<div class="card p-0 mb-2 mt-2" style="width: 98%; margin: 15px auto 0px auto;border: solid thin black">
		<div class="card-head text-center text-white bg-dark" style="font-size: 27px">
			Detail Project
		</div>

		<div class="card-body">
			<form action="index.php?act=update&link=form_edit_project&keys=<?php echo $key;?>" method="POST" enctype = "multipart/form-data">
				<input type="hidden" name="panduan" value="<?php echo $panduan;?>">
				<div class="text-center mb-2">
					<input type="submit" name="submit" value="Save" class="btn btn-info">
				</div>
				<div class="d-flex">
					<div class="container p-0" style="width: 48%">
						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								ID LOP
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $id_lop;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Nama Pekerjaan
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $nama_pekerjaan;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Nilai Pekerjaan
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $nilai_pekerjaan;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Nama Customer
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $nama_customer;?>
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Account Manager
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $am_name;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Segmen
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $segmen;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Jenis Layanan
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $jenis_layanan;?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								PIC Mitra
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="pic_mitra" value="<?php echo !empty($pic_mitra) ? $pic_mitra : '';?>">
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Nomor Telepon
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="no_pic_mitra" value="<?php echo !empty($no_telepon_mitra) ? $no_telepon_mitra : '';?>">
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								No KB
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $no_kb;?>
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Tanggal KB
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<?php echo !empty($tanggal_kb) && $tanggal_kb == "0000-00-00" ? "-" : $tanggal_kb ; ?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								No SPK ke Mitra
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $no_p8;?>
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Tanggal SPK
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<?php echo !empty($tanggal_p8) && $tanggal_p8 == "0000-00-00" ?  "-" : $tanggal_p8; ?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								No KL
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
								<?php echo $no_kl;?>
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Tanggal KL
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<?php echo !empty($tanggal_kl) && $tanggal_kl == "0000-00-00" ?  "-" : $tanggal_kl; ?>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Catatan Handover
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 p-1">
								<textarea name="catatan_handover" class="form-control"><?php echo !empty($catatan_handover) ? $catatan_handover : ""; ?></textarea>
							</div>
						</div>
						
					</div>

					<div class="container p-0" style="width: 48%">
						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								SLA
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="sla" value="<?php echo !empty($sla) ? $sla : '';?>">
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Deskripsi SLA
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 p-1">
								<textarea name="deskripsi_sla" class="form-control"><?php echo !empty($deskripsi_sla) ? $deskripsi_sla : ""; ?></textarea>
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Mttr Response
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="mttr_respone" value="<?php echo !empty($mttr_response) ? $mttr_response : '';?>">
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Mttr Recovery
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="mttr_recovery" value="<?php echo !empty($mttr_recovery) ? $mttr_recovery : '';?>">
							</div>
						</div>

						<!--
						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Awal Kontrak
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 p-1">
								<input type="date" class="form-control" name="awal_kontrak_1" value="<?php echo !empty($awal_kontrak_1) ? $awal_kontrak_1 : '';?>">
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Akhir Kontrak
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<input type="date" class="form-control" name="awal_kontrak_2" value="<?php echo !empty($awal_kontrak_2) ? $awal_kontrak_2 : '';?>">
							</div>
						</div>

						 <div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Durasi Kontrak
							</div>
							<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
								Belum ada data
							</div>
						</div> -->

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								Manager IM
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="manager_im" value="<?php echo !empty($manager_im) ? $manager_im : '';?>">
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Nomor Telepon
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="no_telepon_mgr" value="<?php echo !empty($no_telepon_mgr) ? $no_telepon_mgr : '';?>">
							</div>
						</div>

						<div class="d-flex mb-1">
							<div style="width: 20%" class="bg-success pl-2 text-white">
								EOS Telkom
							</div>
							<div style="width: 29%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="eos_telkom" value="<?php echo !empty($eos_telkom) ? $eos_telkom : '';?>">
							</div>
							<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
								Nomor Telepon
							</div>
							<div style="width: 30%" class="bg-secondary text-white ml-1 p-1">
								<input type="text" class="form-control" name="no_telepon_eos" value="<?php echo !empty($no_telepon_eos) ? $no_telepon_eos : '';?>">
							</div>
						</div>

					</div>
				</div>
			

			<div class="" style="width: 98%; margin: 10px auto 0px auto;">
				<div>
					<h3>Data Pendukung</h3>
				</div>

				<table class="table table-bordered">
					<tr class="text-center bg-success text-white">
						<th style="width: 30%">BAST</th>
						<th style="width: 30%">Lokasi & SID</th>
						<th style="width: 30%">BA & MOM Handover</th>
					</tr>
					<tr class="bg-secondary text-white">
						<td>
							<?php
							if(!empty($link_bast)){
								echo "<a href='https://prime.telkom.co.id/".$link_bast."' target='_blank' style='color:white'>";
								echo $no_bast;
								echo "</a>";
							}else{
								echo $no_bast;
							}
							?>							
						</td>
						<td class="text-center">
							<!-- SID -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ManualSID">Manual</button>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import_sid">Import</button>

							<?php
							$query_dt_sid  = mysqli_query($con,"select * from tb_sid where ID_DATA = '".$panduan."'");
							$cek_dt_sid = mysqli_num_rows($query_dt_sid);

							if($cek_dt_sid > 0){
								echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#list_sid'>List SID</button";
							}
							?>

						</td>
						<td>
							<?php
							$query_mom = mysqli_query($con,"select * from file_project where id_data = '".$panduan."'");
							$cek_mom = mysqli_num_rows($query_mom);

							if($cek_mom <= 0){

							}else{
								echo "<ol>";
								while($sh_mom = mysqli_fetch_array($query_mom)){
									echo "<li>";
									echo $sh_mom['nama_file'];
									echo "</li>";
								}
								echo "</ol>";
							}
							?>

							<input type="file" name="file_mom" class="form-control">
						</td>
					</tr>
				</table>
			</form>
			</div>
		</div>
		<div class="card-footer bg-dark">

		</div>
	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="ManualSID">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Judul</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<script type="text/javascript">
					counter = 0;

					function tambah(){
						counterNext = counter + 1;
						document.getElementById("input"+counter).innerHTML="<div><div id=\"hilang"+counterNext+"\" class='mb-1'><input type='text' name='ao[]' placeholder='AO'><input type='text' name='sid[]' placeholder='SID' class='ml-1'><input type='text' name='lokasi[]' placeholder='Lokasi' class='ml-1' style='width:350px;'><a href='javascript:hapus("+counterNext+")' class=''><i class='fas fa-times ml-1'></i></a></div><div id=\"input"+counterNext+"\"></div>";
						counter++;
					}

					function hapus(nilai){
						var nilai;
						document.getElementById("hilang"+nilai).innerHTML= "";
					}
				</script>
				<form action="index.php?act=input_sid&link=form_edit_project&keys=<?php echo $key;?>" method="POST">
					<div>
						<div id="hilang0" class="mb-1">
							<input type="text" name="ao[]" placeholder="AO">
							<input type="text" name="sid[]" placeholder="SID">
							<input type="text" name="lokasi[]" placeholder="Lokasi" class="mr-0" style="width:350px"><a href='javascript:hapus(0)' class=''><i class='fas fa-times ml-1'></i></a>
						</div>
					</div>

					<div id="input0">
					</div>

					<div>
						<a href="javascript:tambah();" class="btn btn-success">Tambah</a>
						<input type="hidden" name="id_data" value="<?php echo $panduan;?>">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					</div>
					<?php echo !empty($data) ? $data : "";?>
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="list_sid">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">List SID</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div>
					<table id="tb_proman" class="table table-bordered">
						<thead class="text-center text-white bg-dark">
							<tr>
								<th style="width:10px;">NO</th>
								<th>AO</th>
								<th>SID</th>
								<th style="width: 330px">LOKASI</th>
								<th>ACT</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							while($data_sid = mysqli_fetch_array($query_dt_sid)){
								echo "<tr>";
								echo "<td class='text-center'>".$no."</td>";
								echo "<td>".$data_sid['ao']."</td>";
								echo "<td>".$data_sid['sid']."</td>";
								echo "<td>".$data_sid['lokasi']."</td>";
								echo "<td class='text-center'>";
								echo "<form method='POST' action='index.php?act=delete_sid&link=form_edit_project&keys=<?php echo $key;?>'>";
								echo "<input type='hidden' name='id_data' value='".$panduan."'>";
								echo "<input type='hidden' name='id_sid' value='".$data_sid['id_sid']."'>";
								echo "<input type='hidden' name='sid' value='".$data_sid['sid']."'>";
								echo "<input type='submit' name='submit' value='Delete'>";
								echo "</form>";
								echo "</td>";
								echo "</tr>";
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>


<script type="text/javascript">
	function validateForm2() {
  var y = document.forms["import_form"]["import_axcel"].value;
  if (y == "") {
    alert("Divisi & catatan tidak boleh kosong !");
    return false;
  }
} 
</script>

<div class="modal fade" id="import_sid">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Import SID</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="import_form" id="import_form" action="index.php?act=import_sid&link=form_edit_project&keys=<?php echo $key;?>">
					<div class="d-flex container p-0" style="width:80%">
						<input type="file" name="import_excel" id="import_excel" class="form form-control">
						<input type="hidden" name="id_data" value="<?php echo $panduan;?>">
						<input type="submit" name="submit" value="Submit" class="ml-2">
					</div>
					<div class="text-center">
						Download Format Excel Here!
					</div>
				</form>
			</div>

		</div>
	</div>
</div>