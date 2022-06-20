<br>
<br>
<?php
if ($_POST) {
	include("modul/action/inventory_act.php");
	echo "damn";
}
$proman = $_GET['dt_proman'];
$query_inventory_imes = mysqli_query($con, "select * from tb_inventory_imes where id_inventory = '" . $proman . "'");
$cek_inventory_imes = mysqli_fetch_array($query_inventory_imes);
?>
<center>
	<div class="container-fluid">
		<div class="card shadow w-75 mb-4">
			<div class="card-header py-3 bg-dark text-white center d-flex justify-content-center h2">
				Detail Manage Service <?= $cek_inventory_imes['nama_corporate']; ?> customer <?= $cek_inventory_imes['nama_mitra']; ?>
			</div>
			<br>
			<div class="row m-2">
				<div class="col mb-4">
					<div class="float-right" style="margin-right: 30px;">Last Update : <?= $cek_inventory_imes['modify_date']; ?></div>
					<div id="tabel_warp" class="text-white table-responsive-lg">
						<table id="tb_proman" class="table table-striped table-bordered table-lg">



							<?php
							if ($cek_inventory_imes <= 0) {
								echo "<tr class='bg-white'>";
								echo "<td colspan='13' align='center'>Tidak ada data yang di tampilkan !</td>";
								echo "</tr>";
							} else {
							?>
								<tbody style="background-color:#ffffff">
									<tr>

										<th scope="row" width="15%">Corporate Account/Nipnas </th>
										<td width="35%">: <?= $cek_inventory_imes['corporate_account']; ?></td>
										<th scope="row" width="15%">Tipe Produk</th>
										<td width="35%">: <?= $cek_inventory_imes['produk']; ?></td>
									</tr>
									<tr>

										<th scope="row">Nama CC </th>
										<td>: <?= $cek_inventory_imes['nama_corporate']; ?></td>
										<th scope="row">Kategori Produk</th>
										<td>: <?= $cek_inventory_imes['kategori_produk']; ?></td>
									</tr>
									<tr>

										<th scope="row">Order NCX/Ticares </th>
										<td>: <?= $cek_inventory_imes['order_ncx_ticares']; ?></td>
										<th scope="row">Deskripsi Project (SOW)</th>
										<td>: <?= $cek_inventory_imes['deskripsi_project']; ?></td>
									</tr>
									<tr>

										<th scope="row">SID </th>
										<td>: <?= $cek_inventory_imes['sid']; ?></td>
										<th scope="row">Nilai Project</th>
										<td>: <?= $cek_inventory_imes['nilai_project']; ?></td>
									</tr>
									<tr>

										<th scope="row">Nomor KB </th>
										<td>: <?= $cek_inventory_imes['nomor_kb']; ?></td>
										<th scope="row">Nama AM</th>
										<td>: <?= $cek_inventory_imes['nama_am']; ?></td>
									</tr>
									<tr>

										<th scope="row">Nomor SPK</th>
										<td>: <?= $cek_inventory_imes['nomor_spk']; ?></td>
										<th scope="row">Nama Mitra</th>
										<td>: <?= $cek_inventory_imes['nama_mitra']; ?></td>
									</tr>
									<tr>

										<th scope="row">Nomor KL </th>
										<td>: <?= $cek_inventory_imes['no_kl']; ?></td>
										<th scope="row">PIC Mitra (Operation)</th>
										<td>: <?= $cek_inventory_imes['pic_mitra_op']; ?></td>
									</tr>
									<tr>

										<th scope="row">Availability </th>
										<td>: <?= $cek_inventory_imes['availability']; ?></td>
										<th scope="row">PIC Mitra (Delivery)</th>
										<td>: <?= $cek_inventory_imes['pic_mitra_del']; ?></td>
									</tr>
									<tr>
										<th scope="row">Devisi/BUD</th>
										<td>: <?= $cek_inventory_imes['divisi_bud']; ?></td>
										<th scope="row">Segmen</th>
										<td>: <?= $cek_inventory_imes['segmen']; ?></td>
									</tr>
									<tr>

										<th scope="row">MTTR Recovery </th>
										<td>: <?= $cek_inventory_imes['mttr_recovery']; ?></td>
										<th scope="row">Overhandle By</th>
										<td>: <?= $cek_inventory_imes['overhandle_by']; ?></td>
									</tr>
									<tr>

										<th scope="row">MTTR Response </th>
										<td>: <?= $cek_inventory_imes['mttr_response']; ?></td>
										<th scope="row">Verifikasi By</th>
										<td>: <?= $cek_inventory_imes['verifikasi_by']; ?></td>
									</tr>
									<tr>

										<th scope="row">Pola Pembayaran </th>
										<td>: <?= $cek_inventory_imes['pola_pembayaran']; ?></td>
										<th scope="row">Catatan</th>
										<td>: <?= $cek_inventory_imes['catatan']; ?></td>
									</tr>
									<tr>

										<th scope="row">Jangka Waktu Kontrak </th>
										<td>: <?= $cek_inventory_imes['jangka_waktu_akhir']; ?></td>
										<th scope="row">Document Handcover</th>
										<td>:
											<?php if (!empty($cek_inventory_imes['upload_size'])) { ?>
												<a href="http://localhost/proman/doc_file/inventory/<?= $cek_inventory_imes['upload_name']; ?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Available</button></a>
											<?php } else { ?>
												<button type="button" class="btn btn-danger btn-sm">Not Available</button>
											<?php } ?>



									</tr>
									<tr>

										<th scope="row">Tanggal SPK </th>
										<td>: <?= $cek_inventory_imes['tgl_spk']; ?></td>

										<th scope="row">Topologi</th>
										<td>:

											<?php if (!empty($cek_inventory_imes['upload_size_topologi'])) { ?>
												<a href="http://localhost/proman/doc_file/inventory/<?= $cek_inventory_imes['upload_name_topologi']; ?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Available</button></a>
											<?php } else { ?>
												<button type="button" class="btn btn-danger btn-sm">Not Available</button>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<th scope="row">Tanggal Nodin</th>
										<td>: <?= $cek_inventory_imes['tgl_nodin']; ?></td>
										<th scope="row"></th>
										<td>:</td>
									</tr>
								<?php
								$no++;
							}
								?>
								</tbody>
						</table>
						<br>
						<?php
						if ($_SESSION['level_pro'] < 2) {
						?>
							<a href="index.php?link=form_inventory&act_detail=Edit&key=<?php echo $cek_inventory_imes['id_inventory'] ?>" class="btn btn-success p-1" style="width:80px">Edit</a>
							<a href="#" class="btn btn-danger p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>

						<?php
						}
						?>

						<a href="index.php?link=data_inventory" class="btn btn-warning p-1" style="width:80px">Back</a>
					</div>
					<script type="text/javascript">
						$(document).ready(
							function() {
								$('#tb_proman').DataTable();
							}
						);
					</script>
				</div>
			</div>
		</div>
	</div>
</center>

<script type="text/javascript" src="fontawesome/js/fontawesome.js"></script>
<script type="text/javascript">
	$(document).ready(
		function() {
			$('#tb_proman').DataTable();
		}
	);
</script>

<div class="modal" id="delete_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center bg-danger p-0">
				<h3 class="text-white text-center container">Warning !</h3>
			</div>
			<div class="modal-body text-center">
				<p class="mb-1">Peringatan data akan di hapus secara permanen,</p>
				<p class="mb-2">Apakah anda yakin ingin menghapus data ini ?</p>
				<form name="myForm" method="POST" action="index.php?link=detail_inventory&act=Delete&dt_proman=<?php echo $cek_inventory_imes['id_inventory']; ?>">
					<input type="hidden" name="key" value="<?php echo $cek_inventory_imes['id_inventory']; ?>">
					<input type="hidden" name="key_1" value="<?php echo $cek_inventory_imes['upload_size'];
																echo $cek_inventory_imes['upload_size_topologi']; ?>">
					<input type="hidden" name="key_2" value="<?php echo $cek_inventory_imes['upload_name'];
																echo $cek_inventory_imes['upload_name_topologi']; ?>">
					<input type="submit" name="button" value="Yes" class="btn btn-warning">
					<input type="button" name="button" value="No" class="btn btn-warning" data-dismiss="modal">
				</form>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>