<?php
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

$query_prime_detail = mysqli_query($con,"select * from data_prime where ID_DATA = '".$key."'");
$sh_data = mysqli_fetch_array($query_prime_detail);

$id_data = $sh_data['ID_DATA'];
$id_lop = $sh_data['ID_LOP'];
$nama_pekerjaan = $sh_data['NAMA_PEKERJAAN'];
$nilai_pekerjaan = "Rp " . number_format($sh_data['NILAI_PEKERJAAN'],2,',','.');
$nama_customer = $sh_data['NAMA_CUSTOMER'];
$am_name = $sh_data['AM_NAME'];
$segmen = $sh_data['SEGMENT'];
$jenis_layanan = $sh_data['TIPE_PEKERJAAN'];
$nama_mitra = $sh_data['NAMA_MITRA'];
$no_kb = $sh_data['NO_KB'];
$link_kb = $sh_data['LINK_KB'];
$tanggal_kb = $sh_data['TANGGAL_KB'];
$no_p8 = $sh_data['NO_P8'];
$link_p8 = $sh_data['LINK_P8'];
$tanggal_p8 = $sh_data['TANGGAL_P8'];
$no_kl = $sh_data['NO_KL'];
$link_kl = $sh_data['LINK_KL'];
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
?>

<div class="mb-2">
	<div class="card p-0" style="width: 98%; margin: 15px auto 0px auto;border: solid thin black">
		<div class="card-head text-center text-white bg-dark" style="font-size: 27px">
			Detail Project
		</div>

		<div class="card-body">

			<div class=" rounded container text-center p-1 mt-0 mb-2" style="width: 5%; border:solid thin black">
				<a href="index.php?link=form_edit_project&act=edit&keys=<?php echo $id_data; ?>" style="text-decoration: none" title="Edit">
					<i class="fas fa-pen pr-1"></i>
				</a>

				<a href="" style="text-decoration: none">
					<i class="fas fa-trash-alt pl-1"></i>
				</a>
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
							Nama Mitra
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $nama_mitra;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							PIC Mitra
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $pic_mitra;?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Nomor Telepon
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $no_telepon_mitra;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							No KB
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php 
							if(empty($link_kb)){
								echo $no_kb;
							}else{
								echo "<a href='".$link_kb."' style='color:white' target='_blank'>";
								echo $no_kb;
								echo "</a>";
							}
							?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Tanggal KB
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo !empty($tanggal_kb) && $tanggal_kb != "0000-00-00" ? $tanggal_kb : "-";?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							No SPK ke Mitra
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php
							if(empty($link_p8)){
								echo $no_p8;
							} else{
								echo "<a href='".$link_p8."' style='color:white' target='_blank'>";
								echo $no_p8;
								echo "</a>";
							}
							?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Tanggal SPK
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo !empty($tanggal_p8) && $tanggal_p8 != "0000-00-00" ? $tanggal_p8 : "-";?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							No KL
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php
							if(empty($link_kl)){
								echo $no_kl;
							}else{
								echo "<a href='".$link_kl."' style='color:white' target='_blank'>";
								echo $no_kl;
								echo "</a>";
							}
							?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Tanggal KL
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo !empty($tanggal_kl) && $tanggal_kl != "0000-00-00" ? $tanggal_kl : "-";?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							Catatan Handover
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $catatan_handover;?>
						</div>
					</div>
					
				</div>

				<div class="container p-0" style="width: 48%">
					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							SLA
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $sla;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							Deskripsi SLA
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $deskripsi_sla;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							MTTR Response
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $mttr_response;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							Mttr Recovery
						</div>
						<div style="width: 80%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $mttr_recovery;?>
						</div>
					</div>

					<!--
					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							Awal Kontrak
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							Belum ada data
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Akhir Kontrak
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							Belum ada data
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
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $manager_im;?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Nomor Telepon
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $no_telepon_mgr;?>
						</div>
					</div>

					<div class="d-flex mb-1">
						<div style="width: 20%" class="bg-success pl-2 text-white">
							EOS Telkom
						</div>
						<div style="width: 29%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $eos_telkom;?>
						</div>
						<div style="width: 20%" class="bg-success pl-2 ml-1 text-white">
							Nomor Telepon
						</div>
						<div style="width: 30%" class="bg-secondary text-white ml-1 pl-1">
							<?php echo $no_telepon_eos;?>
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
						<!--SID-->
						<td>
							<div class="text-center">
								<?php
								$query_sid = mysqli_query($con,"select * from tb_sid where ID_DATA = '".$id_data."'");
								$cek_sid = mysqli_num_rows($query_sid);

								if($cek_sid <= 0){
									echo "SID not available";
								}else{
									?>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#SID_list">SID Available</button>
									<?php
								}
								?>
							</div>
						</td>
						<td>
							<?php
							$query_mom = mysqli_query($con,"select * from file_project where id_data = '".$id_data."'");
							$cek_mom = mysqli_num_rows($query_mom);

							if($cek_mom <= 0){
								echo "No Data";
							}else{
								echo "<ol>";
								while($sh_mom = mysqli_fetch_array($query_mom)){
									echo "<li>";
									echo "<a href='".$project_path.$sh_mom['nama_file']."' style='color:white' target='_blank'>";
									echo $sh_mom['nama_file'];
									echo "</a>";
									echo "</li>";
								}
								echo "</ol>";
							}
							?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card-footer bg-dark">

		</div>
	</div>
</div>

<!--Modal-->
<div class="modal fade" id="SID_list">
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
								<th style="width: 350px">LOKASI</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							while($data_sid = mysqli_fetch_array($query_sid)){
								echo "<tr>";
								echo "<td class='text-center'>".$no."</td>";
								echo "<td>".$data_sid['ao']."</td>";
								echo "<td>".$data_sid['sid']."</td>";
								echo "<td>".$data_sid['lokasi']."</td>";
								echo "</tr>";
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>

<!--Paging data -->
<script type="text/javascript">
	$(document).ready( 
		function () {
    		$('#tb_proman').DataTable();
			} 
		);
</script>