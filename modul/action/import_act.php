<?php
$data_1 = $_FILES['import_excel']['name'];
$data_2 = $_FILES['import_excel']['tmp_name'];
$data_3 = $_FILES['import_excel']['size'];
$data_4 = $_FILES['import_excel']['type'];

$error = array();
$div1 = "<div class='alert alert-danger text-center container' style='width:500px;margin-top:15px;'>";
$div2 = "</div>";

if (empty($data_1) && empty($data_2) && empty($data_3)) {
	$error['alert'] = $div1 . "Belum ada file dipilih!" . $div2;
} else {
	if ($data_4 == "application/vnd.ms-excel") {
	} else {
		$error['alert'] = $div1 . "Format file harus excel 2003!" . $div2;
	}
}

if (empty($error)) {
	$target = basename($_FILES['import_excel']['name']);
	move_uploaded_file($_FILES['import_excel']['tmp_name'], $target);


	chmod($_FILES['import_excel']['name'], 0777);


	$data = new Spreadsheet_Excel_Reader($_FILES['import_excel']['name'], false);

	$jumlah_baris = $data->rowcount($sheet_index = 0);


	$berhasil = 0;
	for ($i = 2; $i <= $jumlah_baris; $i++) {

		$corporate_account 				= $data->val($i, 1);
		$nama_corporate					= $data->val($i, 2);
		$order_ncx_ticares 				= $data->val($i, 3);
		$divisi_bud 					= $data->val($i, 4);
		$segmen							= $data->val($i, 5);
		$sid							= $data->val($i, 6);
		$nomor_kb						= $data->val($i, 7);
		$nomor_spk						= $data->val($i, 8);
		$no_kl							= $data->val($i, 9);
		$availability					= $data->val($i, 10);
		$mttr_recovery					= $data->val($i, 11);
		$mttr_response 					= $data->val($i, 12);
		$pola_pembayaran				= $data->val($i, 13);
		$jangka_waktu_awal 				= $data->val($i, 14);
		$jangka_waktu_akhir 			= $data->val($i, 15);
		$tgl_spk						= $data->val($i, 16);
		$tgl_nodin						= $data->val($i, 17);
		$produk							= $data->val($i, 18);
		$tipe_produk					= $data->val($i, 19);
		$kategori_produk				= $data->val($i, 20);
		$nama_projek					= $data->val($i, 21);
		$deskripsi_project				= $data->val($i, 22);
		$nilai_project					= $data->val($i, 23);
		$nama_am 						= $data->val($i, 24);
		$kontak_am 						= $data->val($i, 25);
		$nama_mitra						= $data->val($i, 26);
		$pic_assurance					= $data->val($i, 27);
		$pic_mitra_op					= $data->val($i, 28);
		$kontak_mitra_op				= $data->val($i, 29);
		$pic_mitra_del					= $data->val($i, 30);
		$kontak_mitra_del				= $data->val($i, 31);
		$overhandle_by 					= $data->val($i, 32);
		$verifikasi_by					= $data->val($i, 33);
		$catatan 						= $data->val($i, 34);
		$status_handcover				= $data->val($i, 35);

		$query_no = mysqli_query($con, "select no from tb_inventory_imes order by no desc limit 0,3");
		$cek_no = mysqli_num_rows($query_no);
		$shno = mysqli_fetch_array($query_no);

		if ($cek_no > 0) {
			$no = $shno[0] + 1;
		} else {
			$no = 1;
		}

		$input_date = date("Y-m-d");
		$input_by = $_SESSION['username_pro'];
		$id_inventory = date("Ymdhis") . $no;

		if (!empty($id_inventory)) {
			$query_kl = mysqli_query($con, "select id_inventory from tb_inventory_imes where id_inventory = '" . $id_inventory . "'");
			$cek_kl = mysqli_num_rows($query_kl);

			if ($cek_kl <= 0) {
				$query_no = mysqli_query($con, "select no from tb_inventory_imes order by no desc limit 0,3");
				$cek_no = mysqli_num_rows($query_no);
				$shno = mysqli_fetch_array($query_no);

				if ($cek_no > 0) {
					$no = $shno[0] + 1;
				} else {
					$no = 1;
				}

				$input_date = date("Y-m-d");
				$input_by = $_SESSION['username_pro'];
				$id_inventory = date("Ymdhis") . $no;

				$simpan = mysqli_query($con, "INSERT INTO tb_inventory_imes SET no = '" . $no . "',
				id_inventory = '" . $id_inventory . "',
				corporate_account = '" . $corporate_account . "',
				nama_corporate = '" . $nama_corporate . "',
				order_ncx_ticares = '" . $order_ncx_ticares . "',
				divisi_bud = '" . $divisi_bud . "',
				segmen = '" . $segmen . "',
				sid = '" . $sid . "',
				nomor_kb = '" . $nomor_kb . "',
				nomor_spk = '" . $nomor_spk . "',
				no_kl = '" . $no_kl . "',
				availability = '" . $availability . "',
				mttr_recovery = '" . $mttr_recovery . "',
				mttr_response = '" . $mttr_response . "',
				pola_pembayaran = '" . $pola_pembayaran . "',
				jangka_waktu_awal = '" . $jangka_waktu_awal . "',
				jangka_waktu_akhir = '" . $jangka_waktu_akhir . "',
				tgl_spk = '" . $tgl_spk . "',
				tgl_nodin = '" . $tgl_nodin . "',
				produk = '" . $produk . "',
				tipe_produk = '" . $tipe_produk . "',
				kategori_produk = '" . $kategori_produk . "',
				nama_projek = '" . $nama_projek . "',
				deskripsi_project = '" . $deskripsi_project . "',
				nilai_project = '" . $nilai_project . "',
				nama_am = '" . $nama_am . "',
				kontak_am = '" . $kontak_am . "',
				nama_mitra = '" . $nama_mitra . "',
				pic_assurance = '" . $pic_assurance . "',
				pic_mitra_op = '" . $pic_mitra_op . "',
				kontak_mitra_op = '" . $kontak_mitra_op . "',
				pic_mitra_del = '" . $pic_mitra_del . "',
				kontak_mitra_del = '" . $kontak_mitra_del . "',
				overhandle_by = '" . $overhandle_by . "',
				verifikasi_by = '" . $verifikasi_by . "',
				catatan = '" . $catatan . "',
				status_handcover = '" . $status_handcover . "',
				input_by = '" . $input_by . "',
				input_date = '" . $input_date . "'");
			}

			$berhasil++;
		}
	}


	unlink($_FILES['import_excel']['name']);
?>
	<script type="text/javascript">
		alert("<?php echo $berhasil; ?> data telah berhasil diinput!");
		document.location = "index.php?link=data_inventory";
	</script>
<?php
}
?>