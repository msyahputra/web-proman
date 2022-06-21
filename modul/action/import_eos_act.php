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

        $kategori_eos                    = $data->val($i, 1);
        $lokasi_kerja                    = $data->val($i, 2);
        $witel                           = $data->val($i, 3);
        $segmen                          = $data->val($i, 4);
        $name_customer                   = $data->val($i, 5);
        $kategori_pemenuhan_eos          = $data->val($i, 6);
        $nama_eos                        = $data->val($i, 7);
        $kontak_eos                      = $data->val($i, 8);
        $pic_eos                         = $data->val($i, 9);
        $pic_kontak_eos                  = $data->val($i, 10);
        $tgl_nodin                       = $data->val($i, 11);
        $no_nodin                        = $data->val($i, 12);
        $judul_nodin                     = $data->val($i, 13);
        $detail_permintaan               = $data->val($i, 14);
        $request_by                      = $data->val($i, 15);
        $nik_request_by                  = $data->val($i, 16);
        $approval                        = $data->val($i, 17);
        $nik_approval                    = $data->val($i, 18);
        $status_permintaan               = $data->val($i, 19);
        $alasan_rejected                 = $data->val($i, 20);
        $eos_eksiting                    = $data->val($i, 21);
        $revenue_eksisting               = $data->val($i, 22);
        $potensi_revenue                 = $data->val($i, 23);
        $jum_tiket                       = $data->val($i, 24);
        $lokasi_terdekat                 = $data->val($i, 25);
        $catatan_pendukung               = $data->val($i, 26);

        $query_no = mysqli_query($con, "select id_pemenuhaneos from tb_pemenuhan_eos order by id_pemenuhaneos desc limit 0,3");
        $cek_no = mysqli_num_rows($query_no);
        $shno = mysqli_fetch_array($query_no);

        if ($cek_no > 0) {
            $no = $shno[0] + 1;
        } else {
            $no = 1;
        }

        $input_date = date("Y-m-d");
        $input_by = $_SESSION['username_pro'];
        $id_inventory = time();

        if (!empty($id_inventory)) {
            $query_kl = mysqli_query($con, "select id_pemenuhaneos from tb_pemenuhan_eos where id_pemenuhaneos = '" . $id_inventory . "'");
            $cek_kl = mysqli_num_rows($query_kl);

            if ($cek_kl <= 0) {
                $query_no = mysqli_query($con, "select id_pemenuhaneos from tb_pemenuhan_eos order by id_pemenuhaneos desc limit 0,3");
                $cek_no = mysqli_num_rows($query_no);
                $shno = mysqli_fetch_array($query_no);

                if ($cek_no > 0) {
                    $no = $shno[0] + 1;
                } else {
                    $no = 1;
                }

                $input_date = date("Y-m-d");
                $input_by = $_SESSION['username_pro'];
                $id_inventory = time();

                $simpan = mysqli_query($con, "INSERT INTO tb_pemenuhan_eos SET id_pemenuhaneos = '" . $id_inventory . "',
				kategori_eos = '" . $kategori_eos . "',
				lokasi_kerja = '" . $lokasi_kerja . "',
				witel = '" . $witel . "',
                segmen = '" . $segmen . "',
                name_customer = '" . $name_customer . "',
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
				input_date = '" . $input_date . "'");
            }

            // var_dump($simpan);

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