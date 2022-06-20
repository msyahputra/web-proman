<br>
<br>
<?php
if ($_POST) {
    include("modul/action/pemenuhaneos_act.php");
    echo "damn";
}
$proman = $_GET['dt_proman'];
$query_pemenuhan_eos = mysqli_query($con, "select * from tb_pemenuhan_eos where id_pemenuhaneos = '" . $proman . "'");
$cek_pemenuhan_eos = mysqli_fetch_array($query_pemenuhan_eos);
// var_dump($cek_pemenuhan_eos);
?>
<center>
    <div class="container-fluid">
        <div class="card shadow w-75 mb-4">
            <div class="card-header py-3 bg-dark text-white center d-flex justify-content-center h2">
                Detail Manage Service <?= $cek_pemenuhan_eos['lokasi_kerja']; ?> <?= $cek_pemenuhan_eos['segmen']; ?> <?= $cek_pemenuhan_eos['witel']; ?>
            </div>
            <br>
            <div class="row m-2">
                <div class="col mb-4">
                    <div class="float-right" style="margin-right: 30px;">Last Update : <?= $cek_pemenuhan_eos['modify_date']; ?></div>
                    <div id="tabel_warp" class="text-white table-responsive-lg">
                        <table id="tb_proman" class="table table-striped table-bordered table-lg">
                            <?php
                            if ($cek_pemenuhan_eos <= 0) {
                                echo "<tr class='bg-white'>";
                                echo "<td colspan='13' align='center'>Tidak ada data yang di tampilkan !</td>";
                                echo "</tr>";
                            } else {
                            ?>
                                <tbody style="background-color:#ffffff">
                                    <tr>
                                        <th scope="row">Kategori EOS</th>
                                        <td>: <?= $cek_pemenuhan_eos['kategori_eos']; ?></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="15%">Lokasi Kerja</th>
                                        <td width="35%">: <?= $cek_pemenuhan_eos['lokasi_kerja']; ?></td>
                                        <th scope="row">Witel/Segmen</th>
                                        <?php if (!empty($cek_pemenuhan_eos['witel'])) { ?>
                                            <td>: <?= $cek_pemenuhan_eos['witel']; ?></td>
                                        <?php } else { ?>
                                            <td>: <?= $cek_pemenuhan_eos['segmen']; ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Customer </th>
                                        <td>: <?= $cek_pemenuhan_eos['name_customer']; ?></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kategori Pemenuhan EOS</th>
                                        <td>: <?= $cek_pemenuhan_eos['kategori_pemenuhan_eos']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama EOS </th>
                                        <td>: <?= $cek_pemenuhan_eos['nama_eos']; ?></td>
                                        <th scope="row">Telp</th>
                                        <td>: <?= $cek_pemenuhan_eos['kontak_eos']; ?></td>
                                    </tr>
                                    <tr>

                                        <th scope="row"> PIC Penanggung Jawab </th>
                                        <td>: <?= $cek_pemenuhan_eos['pic_eos']; ?></td>
                                        <th scope="row">Telp</th>
                                        <td>: <?= $cek_pemenuhan_eos['pic_kontak_eos']; ?></td>
                                    </tr>
                                    <tr>

                                        <th scope="row">Tanggal Nodin/Permintaan</th>
                                        <td>: <?= $cek_pemenuhan_eos['tgl_nodin']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>

                                        <th scope="row">Nomor Nodin</th>
                                        <td>: <?= $cek_pemenuhan_eos['no_nodin']; ?></td>
                                        <th scope="row">Dokument Nodin</th>
                                        <td>:
                                            <?php if (!empty($cek_pemenuhan_eos['upload_name_nodin'])) { ?>
                                                <a href="http://localhost/proman/doc_file/pemenuhaneos/<?= $cek_pemenuhan_eos['upload_name_nodin']; ?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Available</button></a>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm">Not Available</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Judul Nodin</th>
                                        <td>: <?= $cek_pemenuhan_eos['judul_nodin']; ?></td>
                                        <th scope="row">Dokumen Pendukung</th>
                                        <td>:
                                            <?php if (!empty($cek_pemenuhan_eos['upload_judul_nodin'])) { ?>
                                                <a href="http://localhost/proman/doc_file/pemenuhaneos/<?= $cek_pemenuhan_eos['upload_judul_nodin']; ?>" target="_blank"><button type="button" class="btn btn-success btn-sm">Available</button></a>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-danger btn-sm">Not Available</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Detail Permintaan</th>
                                        <td>: <?= $cek_pemenuhan_eos['detail_permintaan']; ?></td>
                                    </tr>
                                    <tr>

                                        <th scope="row">Request By </th>
                                        <td>: <?= $cek_pemenuhan_eos['request_by']; ?></td>
                                        <th scope="row">NIK</th>
                                        <td>: <?= $cek_pemenuhan_eos['nik_request_by']; ?></td>
                                    </tr>
                                    <tr>

                                        <th scope="row">Approval By</th>
                                        <td>: <?= $cek_pemenuhan_eos['approval']; ?></td>
                                        <th scope="row">NIK</th>
                                        <td>: <?= $cek_pemenuhan_eos['nik_approval']; ?></td>
                                    </tr>
                                    <tr>

                                        <th scope="row">Status Permintaan </th>
                                        <td>: <?= $cek_pemenuhan_eos['status_permintaan']; ?></td>
                                        <th scope="row">EOS Ekisting</th>
                                        <td>: <?= $cek_pemenuhan_eos['eos_eksiting']; ?></td>

                                    </tr>
                                    <tr>

                                        <th scope="row">Revenue eksisting/bulan</th>
                                        <td>: <?= $cek_pemenuhan_eos['revenue_eksisting']; ?></td>
                                        <th scope="row">Potensi Revenue</th>
                                        <td>: <?= $cek_pemenuhan_eos['potensi_revenue']; ?></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Tiket Gangguan Per bulan</th>
                                        <td>: <?= $cek_pemenuhan_eos['jum_tiket']; ?></td>
                                        <th scope="row">Lokasi EOS Terdekat</th>
                                        <td>: <?= $cek_pemenuhan_eos['lokasi_terdekat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Catatan Pendukung Lain</th>
                                        <td>: <?= $cek_pemenuhan_eos['catatan_pendukung']; ?></td>
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
                            <a href="index.php?link=form_pemenuhan_eos&act_detail=Edit&key=<?php echo $cek_pemenuhan_eos['id_pemenuhaneos'] ?>" class="btn btn-success p-1" style="width:80px">Edit</a>
                            <a href="#" class="btn btn-danger p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>

                        <?php
                        }
                        ?>

                        <a href="index.php?link=data_pemenuhan_eos" class="btn btn-warning p-1" style="width:80px">Back</a>
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
                <form name="myForm" method="POST" action="index.php?link=detail_pemenuhan_eos&act=Delete&dt_proman=<?php echo $cek_inventory_imes['id_pemenuhaneos']; ?>">
                    <input type="hidden" name="key" value="<?php echo $cek_pemenuhan_eos['id_pemenuhaneos']; ?>">
                    <input type="hidden" name="key_1" value="<?php echo $cek_pemenuhan_eos['upload_name_nodin']; ?>">
                    <input type="hidden" name="key_2" value="<?php echo $cek_pemenuhan_eos['upload_judul_nodin']; ?>">
                    <input type="submit" name="button" value="Yes" class="btn btn-warning">
                    <input type="button" name="button" value="No" class="btn btn-warning" data-dismiss="modal">
                </form>
            </div>
            <div class="modal-footer bg-danger">

            </div>
        </div>
    </div>
</div>