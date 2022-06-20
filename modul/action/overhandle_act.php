<?php
if (!empty($_GET['act'])) {
	$act = $_GET['act'];

	if (!empty($_POST['key'])) {
		$key = $_POST['key'];
	}
}

if (!empty($_POST['nama_doc'])) {
	$nama_doc = $_POST['nama_doc'];
}

if (!empty($_FILES['upload_file']['size'])) {
	$unik = date("Ymdhis");
	$upload_name = addslashes(trim($_FILES['upload_file']['name']));
	$upload_tmp = $_FILES['upload_file']['tmp_name'];
	$upload_type = $_FILES['upload_file']['type'];
	$upload_size = $_FILES['upload_file']['size'];
} else {
	$upload_name = "";
	$upload_type = "";
	$upload_size = "";
}

if ($act != "Delete" && $act != "Update" && $act != "Update_Catatan" && $act != "Update_Item_Catatan") {
	$corporate_account = ucwords(strtolower($_POST['corporate_account']));
	$nama_project = ucwords(strtolower($_POST['nama_project']));
	$nilai_project = trim($_POST['nilai_project']);
	$nama_cc = ucwords(strtolower($_POST['nama_cc']));
	$order_ncx_ticares = $_POST['order_ncx_ticares'];
	$sid = $_POST['sid'];
	$segmen = $_POST['segmen'];
	$divisi = $_POST['divisi'];
	$status_overhandle = $_POST['status_overhandle'];
	$nomor_kb_pks =  $_POST['nomor_kb_pks'];
	$nama_am = $_POST['nama_am'];
	$nomor_kontak_am = $_POST['nomor_kontak_am'];
	$nama_mitra = $_POST['nama_mitra'];
	$pic_mitra = $_POST['pic_mitra'];
	$no_pic_mitra = $_POST['no_pic_mitra'];
	$nomor_kl = $_POST['nomor_kl'];
	$tanggal_bast = $_POST['tanggal_bast'];
	$layanan = $_POST['layanan'];
	$metode_pembayaran = $_POST['metode_pembayaran'];
	$slg = $_POST['slg'];
	$mttr_recovery = $_POST['mttr_recovery'];
	$mttr_respone = $_POST['mttr_respone'];
	$pic_penyerah = $_POST['pic_penyerah'];
	$nik_penyerah = $_POST['nik_penyerah'];
	$pic_penerima = $_POST['pic_penerima'];
	$nik_penerima = $_POST['nik_penerima'];
	$create_date = date("Y-m-d");
	$create_by = $_SESSION['username_pro'];

	$div_1 = "<div class='rounded bg-danger text-white text-center' id='alert_proman'>";
	$div_2 = "</div>";
	$seru = "<p style='width:20px'>!</p>";
	$error = array();

	if (empty($corporate_account)) {
		$error['corporate_account'] = $div_1 . $seru . $div_2;
	}

	if (empty($nama_project)) {
		$error['nama_project'] = $div_1 . $seru . $div_2;
	}

	if (empty($nilai_project)) {
		$error['nilai_project'] = $div_1 . $seru . $div_2;
	} else {
		if (!is_numeric($nilai_project)) {
			$error['nilai_projcet'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_2;
		}
	}

	if (empty($nama_cc)) {
		$error['nama_cc'] = $div_1 . $seru . $div_2;
	}

	if (empty($order_ncx_ticares)) {
		$error['order_ncx_ticares'] = $div_1 . $seru . $div_2;
	}

	if (empty($sid)) {
		$error['sid'] = $div_1 . $seru . $div_2;
	}

	if (empty($segmen)) {
		$error['segmen'] = $div_1 . $seru . $div_2;
	}

	if (empty($divisi)) {
		$error['divisi'] = $div_1 . $seru . $div_2;
	}

	if (empty($status_overhandle)) {
		$error['status_overhandle'] = $div_1 . $seru . $div_2;
	}

	if (empty($nomor_kb_pks)) {
		$error['nomor_kb_pks'] = $div_1 . $seru . $div_2;
	}

	if (empty($nama_am)) {
		$error['data_am'] = $div_1 . $seru . $div_2;
	} else {
		if (empty($nomor_kontak_am)) {
			$error['data_am'] = $div_1 . $seru . $div_2;
		} else {
			if (!is_numeric($nomor_kontak_am)) {
				$error['data_am'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_2;
			}
		}
	}

	if (empty($nama_mitra)) {
		$error['nama_mitra'] = $div_1 . $seru . $div_2;
	}

	if (empty($pic_mitra)) {
		$error['data_mitra'] = $div_1 . $seru . $div_2;
	} else {
		if (empty($no_pic_mitra)) {
			$error['data_mitra'] = $div_1 . $seru . $div_2;
		} else {
			if (!is_numeric($no_pic_mitra)) {
				$error['data_mitra'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_2;
			}
		}
	}

	if (empty($nomor_kl)) {
		$error['no_kl'] = $div_1 . $seru . $div_2;
	}

	if (empty($tanggal_bast)) {
		$error['tanggal_bast'] = $div_1 . $seru . $div_2;
	}

	if (empty($layanan)) {
		$error['layanan'] = $div_1 . $seru . $div_2;
	}

	if (empty($metode_pembayaran)) {
		$error['metode_pembayaran'] = $div_1 . $seru . $div_2;
	}

	if (empty($pic_penyerah)) {
		$error['data_penyerah'] = $div_1 . $seru . $div_2;
	}

	if (empty($nik_penyerah)) {
		$error['data_penyerah'] = $div_1 . $seru . $div_2;
	}

	if (empty($pic_penerima)) {
		$error['data_penerima'] = $div_1 . $seru . $div_2;
	}

	if (empty($nik_penerima)) {
		$error['data_penerima'] = $div_1 . $seru . $div_2;
	}

	if ($act != "Edit") {
		if (empty($upload_size)) {
			$error['upload_file'] = $div_1 . $seru . $div_2;
		} else {
			if ($upload_type != "application/pdf") {
				$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>Format PDF Only !" . $div_2;
				$triger_error = "yes";
			}
		}
	}

	if (file_exists($overhandle_path . $upload_name) && !empty($upload_name)) {
		$error['upload_file'] = "<div style='position:absolute;margin-top:10px;width:100px;' class='rounded bg-danger text-white' id='alert_proman'>File Exists !" . $div_2;
	}
}

if (empty($error)) {
	if (!empty($act) && $act == "Input") {
		$query_no = mysqli_query($con, "select no from tb_overhandle_proman order by no desc limit 0,5");
		$cek_no = mysqli_num_rows($query_no);
		$shono = mysqli_fetch_array($query_no);

		if ($cek_no <= 0) {
			$no = 1;
		} else {
			$no = $shono['no'] + 1;
		}

		$id_overhandle = date("Ymdhis") . $corporate_account . $no;

		if (!empty($upload_size)) {
			$upload_query = ", upload_name = '" . $upload_name . "', upload_type = '" . $upload_type . "', upload_size = '" . $upload_size . "' ";
		} else {
			$upload_query = "";
		}

		$query_overhandle = mysqli_query($con, "insert into tb_overhandle_proman set no = '" . $no . "',
																					id_project = '" . $id_overhandle . "',
																					corporate_account = '" . $corporate_account . "',
																					nama_project = '" . $nama_project . "',
																					nilai_project = '" . $nilai_project . "',
																					nama_cc = '" . $nama_cc . "',
																					order_ncx_ticares = '" . $order_ncx_ticares . "',
																					sid = '" . $sid . "',
																					segmen = '" . $segmen . "',
																					divisi = '" . $divisi . "',
																					status_overhandle = '" . $status_overhandle . "',
																					nomor_kb_pks = '" . $nomor_kb_pks . "',
																					nama_am = '" . $nama_am . "',
																					nomor_kontak_am = '" . $nomor_kontak_am . "',
																					nama_mitra = '" . $nama_mitra . "',
																					pic_mitra = '" . $pic_mitra . "',
																					no_pic_mitra = '" . $no_pic_mitra . "',
																					nomor_kl = '" . $nomor_kl . "',
																					tanggal_bast = '" . $tanggal_bast . "',
																					layanan = '" . $layanan . "',
																					metode_pembayaran = '" . $metode_pembayaran . "',
																					slg = '" . $slg . "',
																					mttr_recovery = '" . $mttr_recovery . "',
																					mttr_respone = '" . $mttr_respone . "',
																					pic_penyerah = '" . $pic_penyerah . "',
																					nik_penyerah = '" . $nik_penyerah . "',
																					pic_penerima = '" . $pic_penerima . "',
																					nik_penerima = '" . $nik_penerima . "',
																					create_date = '" . $create_date . "',
																					create_by = '" . $create_by . "'
																					" . $upload_query . "");
		if ($query_overhandle) {
			if (!empty($upload_size) && $upload_size > 0) {
				$moving = move_uploaded_file($upload_tmp, $overhandle_path . $upload_name);
			}

?>
			<script type="text/javascript">
				alert("Data berhasil di input !");
				document.location = "index.php?link=data_overhandle";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Data gagal di input !");
				//document.location="index.php?link=form_overhandle";
			</script>
		<?php
		}
	}

	if (!empty($act) && $act == "Edit") {
		if (!empty($_POST['key'])) {
			$key = $_POST['key'];
		}

		if (!empty($upload_size)) {
			if (!empty($_POST['upload_name2'])) {
				$upload_name2 = $_POST['upload_name2'];
			}


			$path = $overhandle_path . $upload_name;

			$moving = move_uploaded_file($upload_tmp, $path);

			if ($moving) {
				if (!empty($upload_size) && !empty($upload_name2)) {
					unlink($overhandle_path . $upload_name2);
				}

				$upload_query = ", upload_name = '" . $upload_name . "', upload_type = '" . $upload_type . "', upload_size = '" . $upload_size . "' ";
			} else {
				echo "gagal upload";
			}
		} else {
			$upload_query = "";
		}

		$modify_date = date("Y-m-d");
		$modify_by = $_SESSION['username_pro'];

		$query_edit_failover = mysqli_query($con, "update tb_overhandle_proman set 	corporate_account = '" . $corporate_account . "',
																					nama_project = '" . $nama_project . "',
																					nilai_project = '" . $nilai_project . "',
																					nama_cc = '" . $nama_cc . "',
																					order_ncx_ticares = '" . $order_ncx_ticares . "',
																					sid = '" . $sid . "',
																					segmen = '" . $segmen . "',
																					divisi = '" . $divisi . "',
																					status_overhandle = '" . $status_overhandle . "',
																					nomor_kb_pks = '" . $nomor_kb_pks . "',
																					nama_am = '" . $nama_am . "',
																					nomor_kontak_am = '" . $nomor_kontak_am . "',
																					nama_mitra = '" . $nama_mitra . "',
																					pic_mitra = '" . $pic_mitra . "',
																					no_pic_mitra = '" . $no_pic_mitra . "',
																					nomor_kl = '" . $nomor_kl . "',
																					tanggal_bast = '" . $tanggal_bast . "',
																					layanan = '" . $layanan . "',
																					metode_pembayaran = '" . $metode_pembayaran . "',
																					slg = '" . $slg . "',
																					mttr_recovery = '" . $mttr_recovery . "',
																					mttr_respone = '" . $mttr_respone . "',
																					pic_penyerah = '" . $pic_penyerah . "',
																					nik_penyerah = '" . $nik_penyerah . "',
																					pic_penerima = '" . $pic_penerima . "',
																					nik_penerima = '" . $nik_penerima . "',
																					modify_date = '" . $modify_date . "',
																					modify_by = '" . $modify_by . "'
																					" . $upload_query . " 
																					where id_project = '" . $key . "'
																																");
		if ($query_edit_failover) {

		?>
			<script type="text/javascript">
				alert("Data berhasil di update !");
				document.location = "index.php?link=data_overhandle";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Data gagal di update !");
				document.location = "index.php?link=form_overhandle";
			</script>
		<?php
		}
	}

	if ($act == "Delete") {
		if (!empty($_POST['key_1'])) {
			$key_1 = $_POST['key_1'];
		} else {
			$key_1 = 0;
		}

		if (!empty($_POST['key_2'])) {
			$key_2 = $_POST['key_2'];
		}

		$query_delete_overhandle = mysqli_query($con, "delete from tb_overhandle_proman where id_project = '" . $key . "'");

		if ($query_delete_overhandle) {
			if ($key_1 > 0) {
				unlink($overhandle_path . $key_2);
			}

		?>
			<script type="text/javascript">
				alert("Data berhasil di hapus !");
				document.location = "index.php?link=data_overhandle";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Data gagal di hapus !");
				document.location = "index.php?link=data_overhandle";
			</script>
		<?php
		}
	}

	if ($act == "Update") {
		$update_note = $_POST['update_note'];
		$modify_by = $_SESSION['username_pro'];
		$modify_date = date("Y-m-d");

		$query_update_note = mysqli_query($con, "update tb_overhandle_proman set 	note = '" . $update_note . "',
																					modify_by = '" . $modify_by . "',
																					modify_date = '" . $modify_date . "'
																					where id_project = '" . $key . "'			");
		if ($query_update_note) {
		?>
			<script type="text/javascript">
				alert("Note telah di simpan !");
				document.location = "index.php?link=detail_overhandle&dt_proman=<?php echo $key; ?>";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Note gagal di simpan !");
				document.location = "index.php?link=detail_overhandle&dt_proman=<?php echo $key; ?>";
			</script>
		<?php
		}
	}

	if ($act == "Update_Catatan") {
		$query_no = mysqli_query($con, "select no from tb_note_ov order by no desc limit 0,3 ");
		$cek_no = mysqli_num_rows($query_no);

		if ($cek_no <= 0) {
			$no = 1;
		} else {
			$data_no = mysqli_fetch_array($query_no);
			$no = $data_no[0] + 1;
		}

		$note = strip_tags($_POST['catatan']);
		$id_project = $_POST['id_project'];
		$divisi  = $_POST['divisi'];
		$tanggal_create = date("Y-m-d");
		$status = 1;
		$uploader = $_SESSION['username_pro'];
		$id_note_ov = date("Ymd") . "-" . $id_project . "-" . $no;

		$query_catatan = mysqli_query($con, "insert into tb_note_ov 
																	(
																	no,
																	id_note_ov,
																	id_project,
																	note,
																	divisi,
																	tanggal_create,
																	status,
																	uploader
																	) 
																	values 
																	(
																	'" . $no . "',
																	'" . $id_note_ov . "',
																	'" . $id_project . "',
																	'" . $note . "',
																	'" . $divisi . "',
																	'" . $tanggal_create . "',
																	'" . $status . "',
																	'" . $uploader . "'
																	)");
		if ($query_catatan) {
		?>
			<script type="text/javascript">
				alert("Catatan berhasil ditambahkan !");
				document.location = "index.php?link=detail_overhandle&dt_proman=<?php echo $id_project; ?>";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Catatan gagal ditambahkan !");
			</script>
		<?php
		}
	}

	if ($act == "Update_Item_Catatan") {
		$id_project = $_POST['id_project'];
		$id_note_ov = $_POST['id_note_ov'];

		$query_update = mysqli_query($con, "update tb_note_ov set status = '0' where id_note_ov = '" . $id_note_ov . "'");

		if ($query_update) {
		?>
			<script type="text/javascript">
				document.location = "index.php?link=detail_overhandle&dt_proman=<?php echo $id_project; ?>";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Terjadi kesalahan sistem !");
				document.location = "index.php?link=detail_overhandle&dt_proman=<?php echo $id_project; ?>"
			</script>
<?php
		}
	}
}
?>