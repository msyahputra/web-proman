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

    $kategori_eos = $_POST['kategori_eos'];
    $lokasi_kerja = $_POST['lokasi_kerja'];
    $witel = $_POST['witel'];
    $segmen = $_POST['segmen'];
    $name_customer = $_POST['name_customer'];
    $chk = "";
    foreach ($name_customer as $chk1) {
        $chk .= $chk1 . ",";
    }
    $kategori_pemenuhan_eos = $_POST['kategori_pemenuhan_eos'];
    $nama_eos = $_POST['nama_eos'];
    $kontak_eos = $_POST['kontak_eos'];
    $pic_eos = $_POST['pic_eos'];
    $pic_kontak_eos = $_POST['pic_kontak_eos'];
    $tgl_nodin = $_POST['tgl_nodin'];
    $no_nodin = $_POST['no_nodin'];
    $judul_nodin = $_POST['judul_nodin'];
    $detail_permintaan = $_POST['detail_permintaan'];
    $request_by = $_POST['request_by'];
    $nik_request_by = $_POST['nik_request_by'];
    $approval = $_POST['approval'];
    $nik_approval = $_POST['nik_approval'];
    $status_permintaan = $_POST['status_permintaan'];
    $alasan_rejected = $_POST['alasan_rejected'];
    $eos_eksiting = $_POST['eos_eksiting'];
    $revenue_eksisting = $_POST['revenue_eksisting'];
    $potensi_revenue = $_POST['potensi_revenue'];
    $jum_tiket = $_POST['jum_tiket'];
    $lokasi_terdekat = $_POST['lokasi_terdekat'];
    $catatan_pendukung = $_POST['catatan_pendukung'];
    $upload_name_nodin2 = $_POST['document_nodin2'];
    $upload_judul_nodin2 = $_POST['document_judul_nodin2'];

    $input_date = date("Y-m-d");
    $input_by = $_SESSION['username_pro'];
    $modify_date = date("Y-m-d");
    $modify_by = $_SESSION['username_pro'];

    $error = array();
    $div_seru1 = "<div class='bg-danger text-white p-1 rounded text-center' style='width:30px;font-size:12px;margin-top:6px;'>";
    $div_seru2 = "</div>";
    $seru = $div_seru1 . "!" . $div_seru2;
    $div_teks1 = "<div class='bg-danger text-white p-1 rounded text-center' style='position:absolute;left:708px;width:150px;margin-top:6px;'>";
    $div_teks2 = "</div>";



    if (empty($kategori_eos)) {
        $error['kategori_eos'] = $seru;
    }

    if (empty($name_customer)) {
        $error['name_customer'] = $seru;
    }

    if (empty($kategori_pemenuhan_eos)) {
        $error['kategori_pemenuhan_eos'] = $seru;
    }

    if (empty($tgl_nodin)) {
        $error['tgl_nodin'] = $seru;
    }

    if (empty($detail_permintaan)) {
        $error['detail_permintaan'] = $seru;
    }

    // if (empty($data_eos_eksiting)) {
    //     $error['data_eos_eksiting'] = $seru;
    // }

    // if (empty($data_jum_tiket)) {
    //     $error['data_jum_tiket'] = $seru;
    // }

    // if (empty($data_lokasi_terdekat)) {
    //     $error['data_lokasi_terdekat'] = $seru;
    // }

    // if (empty($data_catatan_pendukung)) {
    //     $error['data_catatan_pendukung'] = $seru;
    // }


    // if (empty($revenue_eksisting)) {
    //     $error['data_potensi_revenue'] = $seru;
    // } else {
    //     if (empty($potensi_revenue)) {
    //         $error['data_potensi_revenue'] = $seru;
    //     } else {
    //         if (!is_numeric($potensi_revenue)) {
    //             $error['data_potensi_revenue'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
    //         }
    //     }
    // }

    if (empty($no_nodin) && $act != "Edit") {
        $error['data_nodin'] = $seru;
    } else {
        $dt_kl = mysqli_query($con, "select no_nodin from tb_pemenuhan_eos where no_nodin = '" . $no_nodin . "'");
        $cek_kl = mysqli_num_rows($dt_kl);

        if ($cek_kl > 0 && $act != "Edit") {
            $error['data_nodin'] = $div_teks1 . "No Nodin Terdaftar!" . $div_teks2;
        }
    }

    if (empty($approval)) {
        $error['data_approval'] = $seru;
    } else {
        if (empty($nik_approval)) {
            $error['data_approval'] = $seru;
        } else {
            if (!is_numeric($nik_approval)) {
                $error['data_approval'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
            }
        }
    }

    if (empty($request_by)) {
        $error['data_rquest_by'] = $seru;
    } else {
        if (empty($nik_request_by)) {
            $error['data_rquest_by'] = $seru;
        } else {
            if (!is_numeric($nik_request_by)) {
                $error['data_rquest_by'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
            }
        }
    }

    // if (empty($judul_nodin)) {
    //     $error['data_judul_nodin'] = $seru;
    // } else {
    //     if (empty($document_judul_nodin)) {
    //         $error['data_judul_nodin'] = $seru;
    //     } else {
    //         if (!is_numeric($document_judul_nodin)) {
    //             $error['data_judul_nodin'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
    //         }
    //     }
    // }

    // if (empty($no_nodin)) {
    //     $error['data_nodin'] = $seru;
    // } else {
    //     if (empty($document_nodin)) {
    //         $error['data_nodin'] = $seru;
    //     } else {
    //         if (!is_numeric($document_nodin)) {
    //             $error['data_nodin'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
    //         }
    //     }
    // }

    if (empty($pic_eos)) {
        $error['data_penanggung_jawab'] = $seru;
    } else {
        if (empty($pic_kontak_eos)) {
            $error['data_penanggung_jawab'] = $seru;
        } else {
            if (!is_numeric($pic_kontak_eos)) {
                $error['data_penanggung_jawab'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
            }
        }
    }

    if (empty($nama_eos)) {
        $error['data_nama_kontak_eos'] = $seru;
    } else {
        if (empty($kontak_eos)) {
            $error['data_nama_kontak_eos'] = $seru;
        } else {
            if (!is_numeric($kontak_eos)) {
                $error['data_nama_kontak_eos'] = "<div style='position:absolute;margin-top:10px' class='rounded bg-danger text-white' id='alert_proman'>Hanya angka !" . $div_teks2;
            }
        }
    }
}

if (!empty($_FILES['document_nodin']['size'])) {
    $upload_tmp = $_FILES['document_nodin']['tmp_name'];
    $upload_name = $_FILES['document_nodin']['name'];

    $query_upload_nodin = ", upload_name_nodin = '" . $upload_name . "'";


    if (!empty($upload_name)) {
        $jum_karakter = strlen($upload_name);
        if ($jum_karakter > 104) {
            $error['document_nodin'] = $div_teks1 . "Max 100 Character!" . $div_teks2;
        } else {
            if (file_exists(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_name)) {
                $error['document_nodin'] = $div_teks1 . "File exists!" . $div_teks2;
            }
        }
    }
} else {
    $query_upload_nodin = " ";
}

if (!empty($_FILES['document_judul_nodin']['size'])) {
    $upload_tmp_judul_nodin = $_FILES['document_judul_nodin']['tmp_name'];
    $upload_judul_nodin = $_FILES['document_judul_nodin']['name'];

    $query_document_judul_nodin = ", upload_judul_nodin = '" . $upload_judul_nodin . "'";


    if (!empty($upload_judul_nodin)) {
        $jum_karakter = strlen($upload_judul_nodin);
        if ($jum_karakter > 104) {
            $error['document_judul_nodin'] = $div_teks1 . "Max 100 Character!" . $div_teks2;
        } else {
            if (file_exists(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_judul_nodin)) {
                $error['document_judul_nodin'] = $div_teks1 . "File exists!" . $div_teks2;
            }
        }
    }
} else {
    $query_document_judul_nodin = " ";
}

if (empty($error)) {
    if ($act == "Input") {

        if (empty($query_upload_nodin)) {
            $query_upload_nodin = "";
        }

        if (empty($query_document_judul_nodin)) {
            $query_document_judul_nodin = "";
        }

        $id_pemenuhan_eos = time();

        $query_input = mysqli_query($con, "INSERT INTO tb_pemenuhan_eos SET
                                                                        id_pemenuhaneos = '" . $id_pemenuhan_eos . "',
																		kategori_eos = '" . $kategori_eos . "',
																		lokasi_kerja = '" . $lokasi_kerja . "',
																		witel = '" . $witel . "',
                                                                        segmen = '" . $segmen . "',
                                                                        name_customer = '" . $chk . "',
                                                                        kategori_pemenuhan_eos = '" . $kategori_pemenuhan_eos . "',
                                                                        nama_eos = '" . $nama_eos . "',
                                                                        kontak_eos = '" . $kontak_eos . "',
                                                                        pic_eos = '" . $pic_eos . "',
                                                                        pic_kontak_eos = '" . $pic_kontak_eos . "',
                                                                        tgl_nodin = '" . $tgl_nodin . "',
                                                                        no_nodin = '" . $no_nodin . "',
                                                                        judul_nodin = '" . $judul_nodin . "',
                                                                        detail_permintaan = '" . $detail_permintaan . "',
                                                                        request_by = '" . $request_by . "',
                                                                        nik_request_by = '" . $nik_request_by . "',
                                                                        approval = '" . $approval . "',
                                                                        nik_approval = '" . $nik_approval . "',
                                                                        status_permintaan = '" . $status_permintaan . "',
                                                                        alasan_rejected = '" . $alasan_rejected . "',
                                                                        eos_eksiting = '" . $eos_eksiting . "',
                                                                        revenue_eksisting = '" . $revenue_eksisting . "',
                                                                        potensi_revenue = '" . $potensi_revenue . "',
                                                                        jum_tiket = '" . $jum_tiket . "',
                                                                        lokasi_terdekat = '" . $lokasi_terdekat . "',
                                                                        catatan_pendukung = '" . $catatan_pendukung . "',
                                                                        input_by = '" . $input_by . "',
																		input_date = '" . $input_date . "'
                                                                        " . $query_upload_nodin . "
																		" . $query_document_judul_nodin . "
									
			");

        if ($query_input) {
            if (!empty($query_upload_nodin)) {
                $pindahkan_file = move_uploaded_file($upload_tmp, __DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_name);
            } else {
                echo "file document nodin kosong";
            }

            if (!empty($query_document_judul_nodin)) {
                $pindahkan_file_judul = move_uploaded_file($upload_tmp_judul_nodin, __DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_judul_nodin);
            } else {
                echo "file document nodin kosong";
            }

            if ($pindahkan_file == true && $pindahkan_file_judul == true) { ?>
                <script type="text/javascript">
                    alert("Data berhasil diinput!");
                    document.location = "index.php?link=data_pemenuhan_eos";
                </script>
            <?php
            } else { ?>
                <script type="text/javascript">
                    alert("Perpindahan file gagal!");
                    document.location = "index.php?link=data_pemenuhan_eos";
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
        $query_edit = mysqli_query($con, "update tb_pemenuhan_eos set 	kategori_eos = '" . $kategori_eos . "',
                                                                        lokasi_kerja = '" . $lokasi_kerja . "',
                                                                        witel = '" . $witel . "',
                                                                        segmen = '" . $segmen . "',
                                                                        name_customer = '" . $chk . "',
                                                                        kategori_pemenuhan_eos = '" . $kategori_pemenuhan_eos . "',
                                                                        nama_eos = '" . $nama_eos . "',
                                                                        kontak_eos = '" . $kontak_eos . "',
                                                                        pic_eos = '" . $pic_eos . "',
                                                                        pic_kontak_eos = '" . $pic_kontak_eos . "',
                                                                        tgl_nodin = '" . $tgl_nodin . "',
                                                                        no_nodin = '" . $no_nodin . "',
                                                                        judul_nodin = '" . $judul_nodin . "',
                                                                        detail_permintaan = '" . $detail_permintaan . "',
                                                                        request_by = '" . $request_by . "',
                                                                        nik_request_by = '" . $nik_request_by . "',
                                                                        approval = '" . $approval . "',
                                                                        nik_approval = '" . $nik_approval . "',
                                                                        status_permintaan = '" . $status_permintaan . "',
                                                                        alasan_rejected = '" . $alasan_rejected . "',
                                                                        eos_eksiting = '" . $eos_eksiting . "',
                                                                        revenue_eksisting = '" . $revenue_eksisting . "',
                                                                        potensi_revenue = '" . $potensi_revenue . "',
                                                                        jum_tiket = '" . $jum_tiket . "',
                                                                        lokasi_terdekat = '" . $lokasi_terdekat . "',
                                                                        catatan_pendukung = '" . $catatan_pendukung . "',
                                                                        modify_by = '" . $modify_by . "',
                                                                        modify_date = '" . $modify_date . "'
                                                                        " . $query_upload_nodin . "
                                                                        " . $query_document_judul_nodin . "
																		where id_pemenuhaneos = '" . $key . "'
			");

        if ($query_edit) {
            if (!empty($query_upload_nodin) == true && !empty($query_document_judul_nodin) == true) {
                if (!empty($upload_name_nodin2) && file_exists(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_name_nodin2) && !empty($upload_judul_nodin2) && file_exists(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_judul_nodin2)) {
                    unlink(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_name_nodin2);
                    unlink(__DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_judul_nodin2);
                }

                move_uploaded_file($upload_tmp, __DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_name);
                move_uploaded_file($upload_tmp_judul_nodin, __DIR__ . '/../../doc_file/pemenuhaneos/' . $upload_judul_nodin);
            }
        ?>
            <script type="text/javascript">
                alert("Data berhasil diupdate!");
                document.location = "index.php?link=detail_pemenuhan_eos&dt_proman=<?php echo $key ?>";
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Data gagal diupdate!");
                document.location = "index.php?link=detail_pemenuhan_eos&dt_proman=<?php echo $key ?>";
            </script>
        <?php
        }
    }

    if ($act == "Delete") {
        if (!empty($_POST['key_1'])) {
            $key_1 = $_POST['key_1'];
            $key_2 = $_POST['key_2'];
        }

        $query_delete = mysqli_query($con, "delete from tb_pemenuhan_eos where id_pemenuhaneos = '" . $key . "'");

        if ($query_delete) {
            if (!empty($key_2) == true && file_exists($$__DIR__ . '/../../doc_file/pemenuhaneos/' . $key_2)) {
                unlink($$__DIR__ . '/../../doc_file/pemenuhaneos/' . $key_2);
            }
        ?>
            <script type="text/javascript">
                alert("Data telah dihapus!");
                document.location = "index.php?link=data_pemenuhan_eos";
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Data telah dihapus!");
                document.location = "index.php?link=data_pemenuhan_eos&dt_proman=<?php echo $key; ?>";
            </script>
<?php
        }
    }
}


?>