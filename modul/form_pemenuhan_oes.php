<?php
if ($_POST) {
    include("modul/action/pemenuhaneos_act.php");
}

if (!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit") {
    $act = "Edit";
    $key = $_GET['key'];

    $query_edit_pemenuhaneos = mysqli_query($con, "select * from tb_pemenuhan_eos where id_pemenuhaneos = '" . $key . "'");
    $dt_edit = mysqli_fetch_array($query_edit_pemenuhaneos);

    $kategori_eos = $dt_edit['kategori_eos'];
    $lokasi_kerja = $dt_edit['lokasi_kerja'];
    $witel = $dt_edit['witel'];
    $segmen = $dt_edit['segmen'];
    $name_customer = $dt_edit['name_customer'];
    $kategori_pemenuhan_eos =  $dt_edit['kategori_pemenuhan_eos'];
    $nama_eos = $dt_edit['nama_eos'];
    $kontak_eos = $dt_edit['kontak_eos'];
    $pic_eos = $dt_edit['pic_eos'];
    $pic_kontak_eos = $dt_edit['pic_kontak_eos'];
    $tgl_nodin = $dt_edit['tgl_nodin'];
    $no_nodin = $dt_edit['no_nodin'];
    $document_nodin = $dt_edit['document_nodin'];
    $judul_nodin = $dt_edit['judul_nodin'];
    $document_judul_nodin = $dt_edit['document_judul_nodin'];
    $detail_permintaan = $dt_edit['detail_permintaan'];
    $request_by = $dt_edit['request_by'];
    $nik_request_by = $dt_edit['nik_request_by'];
    $approval = $dt_edit['approval'];
    $nik_approval = $dt_edit['nik_approval'];
    $status_permintaan = $dt_edit['status_permintaan'];
    $alasan_rejected = $dt_edit['alasan_rejected'];
    $eos_eksiting = $dt_edit['eos_eksiting'];
    $revenue_eksisting = $dt_edit['revenue_eksisting'];
    $potensi_revenue = $dt_edit['potensi_revenue'];
    $jum_tiket = $dt_edit['jum_tiket'];
    $lokasi_terdekat = $dt_edit['lokasi_terdekat'];
    $catatan_pendukung = $dt_edit['catatan_pendukung'];
}

if (empty($act)) {
    $act = "Input";
}
?>

<div id="form_wraper" class="w-75 container card p-0 border border-dark mb-2" style="margin-top:20px;">
    <div class="card-head bg-dark text-white text-center">
        <h3>
            Form <?php echo $act; ?> Pemenuhan EOS
        </h3>
    </div>

    <div class="card-body">
        <form id="form_data_input" class="" method="POST" enctype="multipart/form-data" action="index.php?link=form_pemenuhan_eos&act=<?php echo $act; ?>">
            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Kategori EOS
                </div>
                <div class="float-left col-sm-8">
                    <select name="kategori_eos" class="form form-control" id="sel1">
                        <option value="null">Pilih Kategori EOS</option>
                        <option value="EOS Dedicated" <?php if (!empty($kategori_eos) && $kategori_eos == "EOS Dedicated") {
                                                            echo "selected";
                                                        } ?>>EOS Dedicated</option>
                        <option value="EOS Multi Customer" <?php if (!empty($kategori_eos) && $kategori_eos == "EOS Multi Customer") {
                                                                echo "selected";
                                                            } ?>>EOS Multi Customer</option>
                        <option value="EOS Area" <?php if (!empty($kategori_eos) && $kategori_eos == "EOS Area") {
                                                        echo "selected";
                                                    } ?>>EOS Area</option>
                        <option value="EOS Mobile Expert" <?php if (!empty($kategori_eos) && $kategori_eos == "EOS Mobile Expert") {
                                                                echo "selected";
                                                            } ?>>EOS Mobile Expert</option>
                    </select>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['kategori_eos'])) {
                        echo $error['kategori_eos'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Lokasi Kerja
                </div>
                <div class="float-left col-sm-4">
                    <select name="lokasi_kerja" class="form form-control" id="divisi_bud">
                        <option value="null">Pilih Lokasi Kerja</option>
                        <option value="DES" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "DES") {
                                                echo "selected";
                                            } ?>>DES</option>
                        <option value="DBS" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "DBS") {
                                                echo "selected";
                                            } ?>>DBS</option>
                        <option value="DGS" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "DGS") {
                                                echo "selected";
                                            } ?>>DGS</option>
                        <option value="Treg 1" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 1") {
                                                    echo "selected";
                                                } ?>>Treg 1</option>
                        <option value="Treg 2" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 2") {
                                                    echo "selected";
                                                } ?>>Treg 2</option>
                        <option value="Treg 3" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 3") {
                                                    echo "selected";
                                                } ?>>Treg 3</option>
                        <option value="Treg 4" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 4") {
                                                    echo "selected";
                                                } ?>>Treg 4</option>
                        <option value="Treg 5" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 5") {
                                                    echo "selected";
                                                } ?>>Treg 5</option>
                        <option value="Treg 6" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 6") {
                                                    echo "selected";
                                                } ?>>Treg 6</option>
                        <option value="Treg 7" <?php if (!empty($lokasi_kerja) && $lokasi_kerja == "Treg 7") {
                                                    echo "selected";
                                                } ?>>Treg 7</option>
                    </select>
                </div>

                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Witel / Segmen
                </div>
                <div class="text__treg">
                    <div class="float-left col-sm-3">
                        <textarea name="witel" class="form-control"><?php if (!empty($detail_permintaan)) {
                                                                        echo $detail_permintaan;
                                                                    } ?></textarea>
                    </div>
                </div>

                <div class="select_segmen">
                    <div class="float-left col-sm-3">
                        <select class="form form-control" id="segmen" name="segmen">
                            <option value="">Pilih Segmen</option>
                            <?php
                            $key = $_GET['key'];
                            $data = mysqli_query($con, "select * from tb_pemenuhan_eos where id_pemenuhaneos = '" . $key . "'");

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option <?php if (!empty($segmen) && $segmen == $d['segmen'])  ?> value="<?php echo $d['segmen']; ?>" selected="selected"><?php echo $d['segmen']; ?></option>
                            <?php } ?>

                            <?php
                            $data = mysqli_query($con, "SELECT * FROM segmen INNER JOIN divisi ON segmen.id_divisi = divisi.id_divisi ORDER BY id_segmen");

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option class="<?php echo $d['divisi']; ?>" <?php if (!empty($segmen) && $segmen == $d['segmen']) ?> value="<?php echo $d['segmen']; ?>"><?php echo $d['segmen']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_lokasi_kerja_dan_witelsegmen'])) {
                        echo $error['data_lokasi_kerja_dan_witelsegmen'];
                    }
                    ?>
                </div>
            </div>

            <div class="textbox-wrapper">
                <div class="clearfix mb-2">
                    <div class="float-left py-2 pr-1 col-sm-3 text-right">
                        Nama Customer
                    </div>
                    <div class="float-left col-sm-8 input-group">
                        <input type="input" name="name_customer" class="form form-control" value="<?php if (!empty($name_customer)) {
                                                                                                        echo $name_customer;
                                                                                                    } ?>">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success add-textbox form-control"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    <div class="float-left text-left">
                        <?php
                        if (!empty($error['name_customer'])) {
                            echo $error['name_customer'];
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Kategori Pemenuhan EOS
                </div>
                <div class="float-left col-sm-8">
                    <select name="kategori_pemenuhan_eos" class="form form-control" id="sel1">
                        <option value=""></option>
                        <option value="Customer/Area dengan Reveune 1 Milyar Perbulan" <?php if (!empty($kategori_pemenuhan_eos) && $kategori_pemenuhan_eos == "Customer/Area dengan Reveune 1 Milyar Perbulan") {
                                                                                            echo "selected";
                                                                                        } ?>>Customer/Area dengan Reveune 1 Milyar Perbulan</option>
                        <option value="Customer/Area Memiliki h3 tiket melebihi tolok ukur dalam 3 bulan terakhir akibat ketiadaan teknis" <?php if (!empty($kategori_pemenuhan_eos) && $kategori_pemenuhan_eos == "Customer/Area Memiliki h3 tiket melebihi tolok ukur dalam 3 bulan terakhir akibat ketiadaan teknis") {
                                                                                                                                                echo "selected";
                                                                                                                                            } ?>>Customer/Area Memiliki h3 tiket melebihi tolok ukur dalam 3 bulan terakhir akibat ketiadaan teknis</option>
                        <option value="Customer/Area Memiliki minimal 400 link yang di tangani EOS" <?php if (!empty($kategori_pemenuhan_eos) && $kategori_pemenuhan_eos == "Customer/Area Memiliki minimal 400 link yang di tangani EOS") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Customer/Area Memiliki minimal 400 link yang di tangani EOS</option>
                        <option value="Pengalokasian EOS dengan pengalokasian khusus" <?php if (!empty($kategori_pemenuhan_eos) && $kategori_pemenuhan_eos == "Pengalokasian EOS dengan pengalokasian khusus") {
                                                                                            echo "selected";
                                                                                        } ?>>Pengalokasian EOS dengan pengalokasian khusus</option>
                    </select>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['kategori_pemenuhan_eos'])) {
                        echo $error['kategori_pemenuhan_eos'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Nama EOS
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="nama_eos" class="form form-control" placeholder="" value="<?php if (!empty($nama_eos)) {
                                                                                                            echo $nama_eos;
                                                                                                        } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Telp
                </div>
                <div class="float-left col-sm-3">
                    <input type="input" name="kontak_eos" class="form form-control" placeholder="" value="<?php if (!empty($kontak_eos)) {
                                                                                                                echo $kontak_eos;
                                                                                                            } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_nama_kontak_eos'])) {
                        echo $error['data_nama_kontak_eos'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    PIC Penanggung Jawab
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="pic_eos" class="form form-control" placeholder="" value="<?php if (!empty($pic_eos)) {
                                                                                                            echo $pic_eos;
                                                                                                        } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Telp
                </div>
                <div class="float-left col-sm-3">
                    <input type="input" name="pic_kontak_eos" class="form form-control" placeholder="" value="<?php if (!empty($pic_kontak_eos)) {
                                                                                                                    echo $pic_kontak_eos;
                                                                                                                } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_penanggung_jawab'])) {
                        echo $error['data_penanggung_jawab'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Tanggal Nodin/Permintaan
                </div>
                <div class="float-left col-sm-8">
                    <input type="date" name="tgl_nodin" class="form form-control" value="<?php if (!empty($tgl_nodin)) {
                                                                                                echo $tgl_nodin;
                                                                                            } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['tgl_nodin'])) {
                        echo $error['tgl_nodin'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Nomor Nodin
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="no_nodin" class="form form-control" placeholder="" value="<?php if (!empty($no_nodin)) {
                                                                                                            echo $no_nodin;
                                                                                                        } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Dokumen Nodin
                </div>
                <div class="float-left col-sm-3">
                    <input type="file" name="document_nodin" class="form form-control" placeholder="" value="<?php if (!empty($document_nodin)) {
                                                                                                                    echo $document_nodin;
                                                                                                                } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_nodin'])) {
                        echo $error['data_nodin'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Judul Nodin
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="judul_nodin" class="form form-control" placeholder="" value="<?php if (!empty($judul_nodin)) {
                                                                                                                echo $judul_nodin;
                                                                                                            } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Dokumen Pendukung
                </div>
                <div class="float-left col-sm-3">
                    <input type="file" name="document_judul_nodin" class="form form-control" placeholder="" value="<?php if (!empty($document_judul_nodin)) {
                                                                                                                        echo $document_judul_nodin;
                                                                                                                    } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_judul_nodin'])) {
                        echo $error['data_judul_nodin'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Detail Permintaan
                </div>
                <div class="float-left col-sm-8">
                    <textarea name="detail_permintaan" class="form-control"><?php if (!empty($detail_permintaan)) {
                                                                                echo $detail_permintaan;
                                                                            } ?></textarea>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['detail_permintaan'])) {
                        echo $error['detail_permintaan'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Request By
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="request_by" class="form form-control" placeholder="" value="<?php if (!empty($request_by)) {
                                                                                                                echo $request_by;
                                                                                                            } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    NIK
                </div>
                <div class="float-left col-sm-3">
                    <input type="input" name="nik_request_by" class="form form-control" placeholder="" value="<?php if (!empty($nik_request_by)) {
                                                                                                                    echo $nik_request_by;
                                                                                                                } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_rquest_by'])) {
                        echo $error['data_rquest_by'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Approval By
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="approval" class="form form-control" placeholder="" value="<?php if (!empty($approval)) {
                                                                                                            echo $approval;
                                                                                                        } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    NIK
                </div>
                <div class="float-left col-sm-3">
                    <input type="input" name="nik_approval" class="form form-control" placeholder="" value="<?php if (!empty($nik_approval)) {
                                                                                                                echo $nik_approval;
                                                                                                            } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_approval'])) {
                        echo $error['data_approval'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Status Permintaan
                </div>
                <div class="float-left col-sm-8 input-group">
                    <select name="status_permintaan" class="form form-control" id="ReviewCriteria">
                        <option value="null">Pilih Status Permintaan</option>
                        <option value="Request on review" <?php if (!empty($status_permintaan) && $status_permintaan == "Request on review") {
                                                                echo "selected";
                                                            } ?>>Request on review</option>
                        <option value="Accepted" <?php if (!empty($status_permintaan) && $status_permintaan == "Accepted") {
                                                        echo "selected";
                                                    } ?>>Accepted</option>
                        <option value="Rejected" <?php if (!empty($status_permintaan) && $status_permintaan == "Rejected") {
                                                        echo "selected";
                                                    } ?>>Rejected</option>
                    </select>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['status_permintaan'])) {
                        echo $error['status_permintaan'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2 NotAcceptedReason">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Detail Alasan
                </div>
                <div class="float-left col-sm-8">
                    <textarea name="alasan_rejected" class="form-control"></textarea>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Sudah ada EOS eksisting
                </div>
                <div class="ml-3 mt-2 custom-control custom-radio custom-control-inline">
                    <input type="radio" id="eos_eksiting" name="eos_eksiting" class="custom-control-input" value="YES">
                    <label class="custom-control-label" for="eos_eksiting">Yes</label>
                </div>
                <div class="mt-2 custom-control custom-radio custom-control-inline">
                    <input type="radio" id="eos_eksiting" name="eos_eksiting" class="custom-control-input" value="NO">
                    <label class="custom-control-label" for="eos_eksiting">No</label>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_eos_eksiting'])) {
                        echo $error['data_eos_eksiting'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Revenue eksisting/bulan
                </div>
                <div class="float-left col-sm-4">
                    <input type="input" name="revenue_eksisting" id="tanpa-rupiah" class="form form-control" placeholder="" value="<?php if (!empty($revenue_eksisting)) {
                                                                                                                                        echo $revenue_eksisting;
                                                                                                                                    } ?>">
                </div>
                <div class="float-left col-sm-1 py-1 text-right" style="font-size:10px">
                    Potensi Revenue
                </div>
                <div class="float-left col-sm-3">
                    <input type="input" name="potensi_revenue" id="tanpa-rupiah_" class="form form-control" placeholder="" value="<?php if (!empty($potensi_revenue)) {
                                                                                                                                        echo $potensi_revenue;
                                                                                                                                    } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_potensi_revenue'])) {
                        echo $error['data_potensi_revenue'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Jumlah Tiket Gangguan Per bulan
                </div>
                <div class="float-left col-sm-8">
                    <input type="input" name="jum_tiket" class="form form-control" placeholder="" value="<?php if (!empty($jum_tiket)) {
                                                                                                                echo $jum_tiket;
                                                                                                            } ?>">
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_jum_tiket'])) {
                        echo $error['data_jum_tiket'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Lokasi EOS Terdekat
                </div>
                <div class="float-left col-sm-8">
                    <textarea name="lokasi_terdekat" class="form-control"><?php if (!empty($lokasi_terdekat)) {
                                                                                echo $lokasi_terdekat;
                                                                            } ?></textarea>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_lokasi_terdekat'])) {
                        echo $error['data_lokasi_terdekat'];
                    }
                    ?>
                </div>
            </div>

            <div class="clearfix mb-2">
                <div class="float-left py-2 pr-1 col-sm-3 text-right">
                    Catatan Pendukung Lain
                </div>
                <div class="float-left col-sm-8">
                    <textarea name="catatan_pendukung" class="form-control"><?php if (!empty($catatan_pendukung)) {
                                                                                echo $catatan_pendukung;
                                                                            } ?></textarea>
                </div>
                <div class="float-left text-left">
                    <?php
                    if (!empty($error['data_catatan_pendukung'])) {
                        echo $error['data_catatan_pendukung'];
                    }
                    ?>
                </div>
            </div>
            <div class="text-right" style="width:90%">
                <!-- <a href="index.php?link=detail_inventory&dt_proman=<?php echo $key; ?>" class="btn btn-warning" style="font-size:12px;">Cancel</a> -->
                <input type="submit" value="Submit" name="Submit" class="btn btn-success">
            </div>

            <input type="hidden" value="<?php echo !empty($key) ? $key : ""; ?>" name="key">
            <input type="hidden" value="<?php echo !empty($upload_name_nodin) ? $upload_name_nodin : ""; ?>" name="upload_name_nodin">
            <input type="hidden" value="<?php echo !empty($upload_judul_nodin) ? $upload_judul_nodin : ""; ?>" name="upload_judul_nodin">
        </form>
    </div>

    <div class="card-footer bg-dark">
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="js/jquery.chained.min.js"></script>
<script>
    $("#segmen").chained("#divisi_bud");
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    var tanpa_rupiah_ = document.getElementById('tanpa-rupiah_');
    tanpa_rupiah_.addEventListener('keyup', function(e) {
        tanpa_rupiah_.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $(document).ready(function() {
        var max = 10;
        var cnt = 1;
        $(".add-textbox").on("click", function(e) {
            e.preventDefault();
            if (cnt < max) {
                cnt++;
                $(".textbox-wrapper").append('<div class="clearfix"><div class="float-left py-2 pr-1 col-sm-3 text-right"></div><div class="float-left col-sm-8 input-group"><input type="text" name="name_customer[]" class="form form-control" /><span class="input-group-btn"><button type="button" class="form-control btn btn-danger remove-textbox"><i class="fa fa-minus-square" aria-hidden="true"></i></button></span></div></div>');
            }
        });

        $(".textbox-wrapper").on("click", ".remove-textbox", function(e) {
            e.preventDefault();
            $(this).parents(".input-group").remove();
            cnt--;
        });
    });

    $(function() {
        collapseSelct($('#divisi_bud').val());

        $('body').on('change', '#divisi_bud', function() {
            collapseSelct($(this).val());
        })
    })

    function collapseSelct(opt) {
        if (opt === "null" || opt === "DES" || opt === "DBS" || opt === "DGS") {
            $('.text__treg').slideUp();
        } else {
            $('.text__treg').slideDown();
        }

        if (opt === "null" || opt === "Treg 1" || opt === "Treg 2" || opt === "Treg 3" || opt === "Treg 4" || opt === "Treg 5" || opt === "Treg 6" || opt === "Treg 7") {
            $('.select_segmen').slideUp();
        } else {
            $('.select_segmen').slideDown();
        }
    }

    $(function() {
        collapseDiv($('#ReviewCriteria').val());

        $('body').on('change', '#ReviewCriteria', function() {
            collapseDiv($(this).val());
        })
    })

    function collapseDiv(opt) {
        if (opt === "null" || opt === "Request on review" || opt === "Accepted") {
            $('.NotAcceptedReason').slideUp();
        } else {
            $('.NotAcceptedReason').slideDown();
        }
    }
</script>