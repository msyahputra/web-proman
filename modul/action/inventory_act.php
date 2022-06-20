<?php
if (!empty($_GET['act'])) {
	$act = $_GET['act'];
} else {
	$act = "Input";
}

if (!empty($act) && $act == "Edit") {
	$lock = "readonly";
}

$key = $_POST['key'];

if ($act != "Delete") {

	$corporate_account = ucwords(strtolower($_POST['corporate_account']));
	$nama_corporate = ucwords(strtolower($_POST['nama_corporate']));
	$order_ncx_ticares = $_POST['order_ncx_ticares'];
	$divisi_bud = $_POST['divisi_bud'];
	$segmen = $_POST['segmen'];
	$sid = $_POST['sid'];
	$nomor_kb = $_POST['nomor_kb'];
	$nomor_spk = $_POST['nomor_spk'];
	$no_kl = $_POST['no_kl'];
	$availability = $_POST['availability'];
	$mttr_recovery = $_POST['mttr_recovery'];
	$mttr_response = $_POST['mttr_response'];
	$pola_pembayaran = $_POST['pola_pembayaran'];
	$jangka_waktu_awal = $_POST['jangka_waktu_awal'];
	$jangka_waktu_akhir = $_POST['jangka_waktu_akhir'];
	$tgl_spk = $_POST['tgl_spk'];
	$tgl_nodin = $_POST['tgl_nodin'];
	$produk = $_POST['produk'];
	$tipe_produk = $_POST['tipe_produk'];
	$kategori_produk = $_POST['kategori_produk'];
	$nama_projek = ucwords(strtolower($_POST['nama_projek']));
	$deskripsi_project = $_POST['deskripsi_project'];
	$nilai_project = trim($_POST['nilai_project']);
	$nama_am = $_POST['nama_am'];
	$kontak_am = $_POST['kontak_am'];
	$nama_mitra = $_POST['nama_mitra'];
	$pic_assurance = $_POST['pic_assurance'];
	$pic_mitra_op = $_POST['pic_mitra_op'];
	$kontak_mitra_op = $_POST['kontak_mitra_op'];
	$pic_mitra_del = $_POST['pic_mitra_del'];
	$kontak_mitra_del = $_POST['kontak_mitra_del'];
	$overhandle_by = $_POST['overhandle_by'];
	$verifikasi_by = $_POST['verifikasi_by'];
	$catatan = $_POST['catatan'];
	$upload_name2 = $_POST['upload_name2'];
	$upload_name_topologi2 = $_POST['upload_name_topologi2'];
	$status_handcover = $_POST['status_handcover'];
	$chk = "";
	foreach ($status_handcover as $chk1) {
		$chk .= $chk1 . ",";
	}
	$input_date = date("Ymd");
	$input_by = $_SESSION['username_pro'];
	$modify_date = date("Ymd");
	$modify_by = $_SESSION['username_pro'];

	$error = array();
	$div_seru1 = "<div class='bg-danger text-white p-1 rounded text-center' style='width:30px;font-size:12px;margin-top:6px;'>";
	$div_seru2 = "</div>";
	$seru = $div_seru1 . "!" . $div_seru2;
	$div_teks1 = "<div class='bg-danger text-white p-1 rounded text-center' style='position:absolute;left:708px;width:150px;margin-top:6px;'>";
	$div_teks2 = "</div>";


	// if (!empty($jangka_waktu_awal)) {
	// 	$m = explode("-", $jangka_waktu_awal);
	// 	$fix_jangka_waktu_awal = $m[2] . "-" . $m[1] . "-" . $m[0];
	// }

	// if (!empty($jangka_waktu_akhir)) {
	// 	$d = explode("-", $jangka_waktu_akhir);
	// 	$fix_jangka_waktu_akhir = $d[2] . "-" . $d[1] . "-" . $d[0];
	// }

	if (empty($corporate_account)) {
		$error['corporate_account'] = $seru;
	}

	if (empty($nama_corporate)) {
		$error['nama_corporate'] = $seru;
	}

	if (empty($order_ncx_ticares)) {
		$error['order_ncx_ticares'] = $seru;
	}

	if (empty($divisi_bud)) {
		$error['divisi_bud'] = $seru;
	}

	if (empty($segmen)) {
		$error['segmen'] = $seru;
	}

	if (empty($sid)) {
		$error['sid'] = $seru;
	}

	if (empty($nomor_kb)) {
		$error['nomor_kb'] = $seru;
	}

	if (empty($nomor_spk)) {
		$error['nomor_spk'] = $seru;
	}

	if (empty($no_kl) && $act != "Edit") {
		$error['no_kl'] = $seru;
	} else {
		$dt_kl = mysqli_query($con, "select no_kl from tb_inventory_imes where no_kl = '" . $no_kl . "'");
		$cek_kl = mysqli_num_rows($dt_kl);

		if ($cek_kl > 0 && $act != "Edit") {
			$error['no_kl'] = $div_teks1 . "No KL Terdaftar!" . $div_teks2;
		}
	}

	if (empty($availability)) {
		$error['availability'] = $seru;
	}
	if (empty($mttr_recovery)) {
		$error['mttr_recovery'] = $seru;
	}

	if (empty($mttr_response)) {
		$error['mttr_response'] = $seru;
	}

	if (empty($pola_pembayaran)) {
		$error['pola_pembayaran'] = $seru;
	}

	if (empty($jangka_waktu_awal)) {
		$error['jangka_waktu_awal'] = $seru;
	}

	if (empty($jangka_waktu_akhir)) {
		$error['jangka_waktu_akhir'] = $seru;
	}

	if (empty($tgl_spk)) {
		$error['tgl_spk'] = $seru;
	}

	if (empty($tgl_nodin)) {
		$error['tgl_nodin'] = $seru;
	}

	if (empty($produk)) {
		$error['produk'] = $seru;
	}

	if (empty($tipe_produk)) {
		$error['tipe_produk'] = $seru;
	}

	if (empty($kategori_produk)) {
		$error['kategori_produk'] = $seru;
	}

	if (empty($nama_projek)) {
		$error['nama_projek'] = $seru;
	}

	if (empty($deskripsi_project)) {
		$error['deskripsi_project'] = $seru;
	}

	if (empty($nilai_project)) {
		$error['nilai_project'] = $seru;
	} else {
		if (!is_numeric($nilai_project)) {
			$error['nilai_projcet'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
		}
	}

	if (empty($nama_am)) {
		$error['data_am'] = $seru;
	} else {
		if (empty($kontak_am)) {
			$error['data_am'] = $seru;
		} else {
			if (!is_numeric($kontak_am)) {
				$error['data_am'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
			}
		}
	}

	if (empty($nama_mitra)) {
		$error['nama_mitra'] = $seru;
	}

	if (empty($pic_assurance)) {
		$error['pic_assurance'] = $seru;
	}

	if (empty($pic_mitra_op)) {
		$error['data_mitra_op'] = $seru;
	} else {
		if (empty($kontak_mitra_op)) {
			$error['data_mitra_op'] = $seru;
		} else {
			if (!is_numeric($kontak_mitra_op)) {
				$error['data_mitra_op'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
			}
		}
	}

	if (empty($pic_mitra_del)) {
		$error['data_mitra_del'] = $seru;
	} else {
		if (empty($kontak_mitra_del)) {
			$error['data_mitra_del'] = $seru;
		} else {
			if (!is_numeric($kontak_mitra_del)) {
				$error['data_mitra_del'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
			}
		}
	}

	if (empty($overhandle_by)) {
		$error['overhandle_by'] = $seru;
	}

	if (empty($verifikasi_by)) {
		$error['verifikasi_by'] = $seru;
	}

	if (empty($catatan)) {
		$error['catatan'] = $seru;
	}
}

if (!empty($_FILES['upload_file']['size'])) {
	$upload_tmp = $_FILES['upload_file']['tmp_name'];
	$upload_name = $_FILES['upload_file']['name'];
	$upload_size = $_FILES['upload_file']['size'];
	$upload_type = $_FILES['upload_file']['type'];

	$query_upload = ", upload_name = '" . $upload_name . "', upload_size = '" . $upload_size . "', upload_type = '" . $upload_type . "'";

	if (!empty($upload_type) && $upload_type != "application/pdf") {
		$error['upload_file'] = $div_teks1 . "PDF format only!" . $div_teks2;
	} else {
		if (!empty($upload_name)) {
			$jum_karakter = strlen($upload_name);
			if ($jum_karakter > 104) {
				$error['upload_file'] = $div_teks1 . "Max 100 Character!" . $div_teks2;
			} else {
				if (file_exists($inventory_path . $upload_name)) {
					$error['upload_file'] = $div_teks1 . "File exists!" . $div_teks2;
				}
			}
		}
	}
} else {
	$query_upload = " ";
}

if (!empty($_FILES['upload_topologi']['size'])) {
	$upload_tmp_topologi = $_FILES['upload_topologi']['tmp_name'];
	$upload_name_topologi = $_FILES['upload_topologi']['name'];
	$upload_size_topologi = $_FILES['upload_topologi']['size'];
	$upload_type_topologi = $_FILES['upload_topologi']['type'];

	$query_upload_topologi = ", upload_name_topologi = '" . $upload_name_topologi . "', upload_size_topologi = '" . $upload_size_topologi . "', upload_type_topologi = '" . $upload_type_topologi . "'";

	if (!empty($upload_type_topologi) && $upload_type_topologi != "application/pdf") {
		$error['upload_topologi'] = $div_teks1 . "PDF format only!" . $div_teks2;
	} else {
		if (!empty($upload_name_topologi)) {
			$jum_karakter = strlen($upload_name_topologi);
			if ($jum_karakter > 104) {
				$error['upload_topologi'] = $div_teks1 . "Max 100 Character!" . $div_teks2;
			} else {
				if (file_exists($inventory_path . $upload_name_topologi)) {
					$error['upload_topologi'] = $div_teks1 . "File exists!" . $div_teks2;
				}
			}
		}
	}
} else {
	$query_upload_topologi = " ";
}

if (empty($error)) {
	if ($act == "Input") {
		$no_query = mysqli_query($con, "select no from tb_inventory_imes order by no limit 0,3");
		$cek_no = mysqli_num_rows($no_query);
		$shno = mysqli_fetch_array($no_query);

		if ($cek_no <= 0) {
			$no = 1;
		} else {
			$no = $shno[0] + 1;
		}

		if (empty($query_upload)) {
			$query_upload = "";
		}

		if (empty($query_upload_topologi)) {
			$query_upload_topologi = "";
		}

		$id_inventory = date("Ymdhis") . $no;

		$query_input = mysqli_query($con, "INSERT INTO tb_inventory_imes SET no = '" . $no . "',
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
																		status_handcover = '" . $chk . "',
																		input_by = '" . $input_by . "',
																		input_date = '" . $input_date . "'
																		" . $query_upload . "
																		" . $query_upload_topologi . "
																		
			");
		var_dump($query_input);

		if ($query_input) {
			if (!empty($query_upload)) {
				$pindahkan_file = move_uploaded_file($upload_tmp, $inventory_path . $upload_name);
			}

			if (!empty($query_upload_topologi)) {
				$pindahkan_file_topologi = move_uploaded_file($upload_tmp_topologi, $inventory_path . $upload_name_topologi);
			}

			if ($pindahkan_file == true && $pindahkan_file_topologi == true) {
?>
				<script type="text/javascript">
					alert("Data berhasil diinput!");
					document.location = "index.php?link=data_inventory";
				</script>
			<?php
			} else {
			?>
				<script type="text/javascript">
					alert("Perpindahan file gagal!");
					//document.location="index.php?link=data_inventory";
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript">
				alert("Data gagal diinput!");
				//document.location="index.php?link=form_inventory";
			</script>
		<?php
		}
	}

	if ($act == "Edit") {
		$query_edit = mysqli_query($con, "update tb_inventory_imes set 	corporate_account = '" . $corporate_account . "',
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
																		status_handcover = '" . $chk . "',
																		modify_by = '" . $modify_by . "',
																		modify_date = '" . $modify_date . "'
																		" . $query_upload . "
																		" . $query_upload_topologi . "
																		where id_inventory = '" . $key . "'
			");

		if ($query_edit) {
			if (!empty($query_upload) == true && !empty($query_upload_topologi) == true) {
				if (!empty($upload_name2) && file_exists($inventory_path . $upload_name2) && !empty($upload_name_topologi2) && file_exists($inventory_path . $upload_name_topologi2)) {
					unlink($inventory_path . $upload_name2);
					unlink($inventory_path . $upload_name_topologi2);
				}

				move_uploaded_file($upload_tmp, $inventory_path . $upload_name);
				move_uploaded_file($upload_tmp_topologi, $inventory_path . $upload_name_topologi);
			}
		?>
			<script type="text/javascript">
				alert("Data berhasil diupdate!");
				document.location = "index.php?link=detail_inventory&dt_proman=<?php echo $key ?>";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Data gagal diupdate!");
				document.location = "index.php?link=detail_inventory&dt_proman=<?php echo $key ?>";
			</script>
		<?php
		}
	}

	if ($act == "Delete") {
		if (!empty($_POST['key_1'])) {
			$key_1 = $_POST['key_1'];
			$key_2 = $_POST['key_2'];
		}

		$query_delete = mysqli_query($con, "delete from tb_inventory_imes where id_inventory = '" . $key . "'");

		if ($query_delete) {
			if (!empty($key_2) == true && file_exists($inventory_path . $key_2)) {
				unlink($inventory_path . $key_2);
			}
		?>
			<script type="text/javascript">
				alert("Data telah dihapus!");
				document.location = "index.php?link=data_inventory";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert("Data telah dihapus!");
				document.location = "index.php?link=detail_inventory&dt_proman=<?php echo $key; ?>";
			</script>
<?php
		}
	}
}


?>