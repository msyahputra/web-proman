<script src="datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css" />
<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css">
<script type="text/javascript">
  $(document).ready(function() {
    $('#tanggal_plug').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true
    });
  });

  $(document).ready(function() {
    $('#tanggal_plug2').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true
    });
  });
  // $(document).ready(function() {
  //   $('#tanggal_plug_awal').datepicker({
  //     format: "dd-mm-yyyy",
  //     autoclose: true
  //   });
  // });
  // $(document).ready(function() {
  //   $('#tanggal_plug_akhir').datepicker({
  //     format: "dd-mm-yyyy",
  //     autoclose: true
  //   });
  // });
</script>
<?php
if ($_POST) {
  include("modul/action/inventory_act.php");
}

if (!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit") {
  $act = "Edit";
  $key = $_GET['key'];
  $lock = "readonly";

  $query_edit_inventory = mysqli_query($con, "select * from tb_inventory_imes where id_inventory = '" . $key . "'");
  $dt_edit = mysqli_fetch_array($query_edit_inventory);


  $corporate_account = ucwords(strtolower($dt_edit['corporate_account']));
  $nama_corporate = ucwords(strtolower($dt_edit['nama_corporate']));
  $order_ncx_ticares = $dt_edit['order_ncx_ticares'];
  $divisi_bud = $dt_edit['divisi_bud'];
  $segmen = $dt_edit['segmen'];
  $sid = $dt_edit['sid'];
  $nomor_kb       = $dt_edit['nomor_kb'];
  $nomor_spk       = $dt_edit['nomor_spk'];
  $no_kl = $dt_edit['no_kl'];
  $availability   = $dt_edit['availability'];
  $mttr_recovery = $dt_edit['mttr_recovery'];
  $mttr_response = $dt_edit['mttr_response'];
  $pola_pembayaran       = $dt_edit['pola_pembayaran'];
  $jangka_waktu_awal       = $dt_edit['jangka_waktu_awal'];
  $jangka_waktu_akhir       = $dt_edit['jangka_waktu_akhir'];
  // if ($dt_edit['jangka_waktu_awal'] != "0000-00-00") {
  //   $j = explode("-", $dt_edit['jangka_waktu_awal']);
  //   $jangka_waktu_awal = $j[2] . "-" . $j[1] . "-" . $j[0];
  // }

  // if ($dt_edit['jangka_waktu_akhir'] != "0000-00-00") {
  //   $L = explode("-", $dt_edit['jangka_waktu_akhir']);
  //   $jangka_waktu_akhir = $L[2] . "-" . $L[1] . "-" . $L[0];
  // }
  $tgl_spk       = $dt_edit['tgl_spk'];
  $tgl_nodin       = $dt_edit['tgl_nodin'];
  $produk       = $dt_edit['produk'];
  $tipe_produk       = $dt_edit['tipe_produk'];
  $kategori_produk       = $dt_edit['kategori_produk'];
  $nama_projek = ucwords(strtolower($dt_edit['nama_projek']));
  $deskripsi_project       = $dt_edit['deskripsi_project'];
  $nilai_project       = $dt_edit['nilai_project'];
  $nama_am       = $dt_edit['nama_am'];
  $kontak_am       = $dt_edit['kontak_am'];
  $nama_mitra       = $dt_edit['nama_mitra'];
  $pic_assurance     = $dt_edit['pic_assurance'];
  $pic_mitra_op       = $dt_edit['pic_mitra_op'];
  $kontak_mitra_op       = $dt_edit['kontak_mitra_op'];
  $pic_mitra_del       = $dt_edit['pic_mitra_del'];
  $kontak_mitra_del       = $dt_edit['kontak_mitra_del'];
  $overhandle_by       = $dt_edit['overhandle_by'];
  $verifikasi_by       = $dt_edit['verifikasi_by'];
  $catatan       = $dt_edit['catatan'];
  // $upload_name2 = $dt_edit['upload_file'];
  // $upload_name_topologi2 = $dt_edit['upload_topologi'];
  $status_handcover = explode(",", $dt_edit['status_handcover']);

  // $slg = $dt_edit['slg'];


}

if (empty($act)) {
  $act = "Input";
}
?>
<br>
<br>
<center>
  <div class="container-fluid">
    <div class="card w-75 shadow mb-4">
      <div class="card-header py-3 bg-dark text-white center d-flex justify-content-center h2">
        Form <?php echo $act; ?> Data Project
      </div>
      <br>
      <div class="row m-2">
        <div class="col mb-4">
          <div class="card-body">
            <form id="form_data_input" class="" method="POST" enctype="multipart/form-data" action="index.php?link=form_inventory&act=<?php echo $act; ?>">
              <div id="tabel_warp" class="text-white table-responsive-lg">

                <table id="tb_proman" border="0">
                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row" width="13%">Corporate Account/NIPNAS</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="corporate_account" class="form form-control" value="<?php if (!empty($corporate_account)) {
                                                                                                        echo $corporate_account;
                                                                                                      } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['corporate_account'])) {
                          echo $error['corporate_account'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row" width="5%"></th>
                    <th scope="row" width="13%">Tipe Produk</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <select class="form form-control" id="sel1" name="tipe_produk">
                          <option value="" selected="selected" disabled="disabled">Pilih Tipe Produk</option>
                          <option <?php if (!empty($tipe_produk) && $tipe_produk == "Manage Service") {
                                    echo "selected";
                                  } ?> value="Manage Service">Manage Service</option>
                          <option <?php if (!empty($tipe_produk) && $tipe_produk == "Non Manage Service") {
                                    echo "selected";
                                  } ?> value="Non Manage Service">Non Manage Service</option>
                        </select>
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['tipe_produk'])) {
                          echo $error['tipe_produk'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Nama Corporate</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="nama_corporate" class="form form-control" value="<?php if (!empty($nama_corporate)) {
                                                                                                      echo $nama_corporate;
                                                                                                    } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nama_corporate'])) {
                          echo $error['nama_corporate'];
                        }
                        ?>
                      </div>
                    </td>

                    <th scope="row"></th>
                    <th scope="row">Kategori Produk</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <select class="form form-control" id="sel1" name="kategori_produk">
                          <option value="" selected="selected" disabled="disabled">Plih Kategori Produk</option>
                          <option <?php if (!empty($kategori_produk) && $kategori_produk == "Critical") {
                                    echo "selected";
                                  } ?> value="Critical">Critical</option>
                          <option <?php if (!empty($kategori_produk) && $kategori_produk == "Non Critical") {
                                    echo "selected";
                                  } ?> value="Non Critical">Non Critical</option>
                        </select>
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['kategori_produk'])) {
                          echo $error['kategori_produk'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Order NCX / Ticares</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="order_ncx_ticares" class="form form-control" value="<?php if (!empty($order_ncx_ticares)) {
                                                                                                        echo $order_ncx_ticares;
                                                                                                      } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['order_ncx_ticares'])) {
                          echo $error['order_ncx_ticares'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row"> Nama Project</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="input" name="nama_projek" class="form form-control" value="<?php if (!empty($nama_projek)) {
                                                                                                  echo $nama_projek;
                                                                                                } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nama_projek'])) {
                          echo $error['nama_projek'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">SID</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="sid" class="form form-control" value="<?php if (!empty($sid)) {
                                                                                          echo $sid;
                                                                                        } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['sid'])) {
                          echo $error['sid'];
                        }
                        ?>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Deskripsi Project (SOW)</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <textarea class="form-control" name="deskripsi_project"><?php echo !empty($deskripsi_project) ? $deskripsi_project : ""; ?></textarea>
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['deskripsi_project'])) {
                          echo $error['deskripsi_project'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Divisi / BUD</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <select class="form form-control" id="divisi_bud" name="divisi_bud">
                          <option selected="selected" disabled="disabled">Pilih Divisi</option>

                          <?php
                          $data = mysqli_query($con, "select * FROM divisi ORDER BY id_divisi");
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <!-- <option value="<?php echo $d['divisi']; ?>"><?php echo $d['divisi']; ?></option> -->
                            <option <?php if (!empty($divisi_bud) && $divisi_bud == $d['divisi']) {
                                      echo "selected";
                                    } ?> value="<?php echo $d['divisi']; ?>"><?php echo $d['divisi']; ?></option>

                          <?php } ?>

                        </select>

                        <div class="float-left text-left">
                          <?php
                          if (!empty($error['divisi_bud'])) {
                            echo $error['divisi_bud'];
                          }
                          ?>
                        </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Nilai Project</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="input" name="nilai_project" class="form form-control" value="<?php if (!empty($nilai_project)) {
                                                                                                    echo $nilai_project;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nilai_project'])) {
                          echo $error['nilai_project'];
                        }
                        ?>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Segmen</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <select class="form form-control" id="segmen" name="segmen">
                          <option value="">Pilih Segmen</option>
                          <?php
                          $key = $_GET['key'];
                          $data = mysqli_query($con, "select * from tb_inventory_imes where id_inventory = '" . $key . "'");

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
                        <div class="float-left text-left">
                          <?php
                          if (!empty($error['segmen'])) {
                            echo $error['segmen'];
                          }
                          ?>
                        </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Nama AM</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <input type="input" name="nama_am" class="form form-control" placeholder="Nama AM" value="<?php if (!empty($nama_am)) {
                                                                                                                    echo $nama_am;
                                                                                                                  } ?>" size="2">
                      </div>
                      <div class="float-left col-sm-2 py-2" style="font-size:10px">
                        Telp
                      </div>
                      <div class="float-left col-sm-3">
                        <input type="input" name="kontak_am" class="form form-control" placeholder="Nomor Kontak AM" value="<?php if (!empty($kontak_am)) {
                                                                                                                              echo $kontak_am;
                                                                                                                            } ?>" maxlength="12">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['data_am'])) {
                          echo $error['data_am'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Nomor KB / PKS</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="nomor_kb" class="form form-control" value="<?php if (!empty($nomor_kb)) {
                                                                                                echo $nomor_kb;
                                                                                              } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nomor_kb'])) {
                          echo $error['nomor_kb'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Nama Mitra</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="input" name="nama_mitra" class="form form-control" value="<?php if (!empty($nama_mitra)) {
                                                                                                  echo $nama_mitra;
                                                                                                } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nama_mitra'])) {
                          echo $error['nama_mitra'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row"> Nomor SPK</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="nomor_spk" class="form form-control" value="<?php if (!empty($nomor_spk)) {
                                                                                                echo $nomor_spk;
                                                                                              } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['nomor_spk'])) {
                          echo $error['nomor_spk'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">PIC Pengelola Assurance </th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <select class="form form-control" id="sel1" name="pic_assurance">
                          <option value="" selected="selected" disabled="disabled">Plih Pengelola Assurance</option>
                          <option <?php if (!empty($pic_assurance) && $pic_assurance == "Service Assurance") {
                                    echo "selected";
                                  } ?> value="Service Assurance">Service Assurance</option>
                          <option <?php if (!empty($pic_assurance) && $pic_assurance == "Service Operation") {
                                    echo "selected";
                                  } ?> value="Service Operation">Service Operation</option>
                        </select>
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['pic_assurance'])) {
                          echo $error['pic_assurance'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Nomor KL</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" <?php echo !empty($lock) ? $lock : ""; ?> name="no_kl" class="form form-control" value="<?php if (!empty($no_kl)) {
                                                                                                                                      echo $no_kl;
                                                                                                                                    } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['no_kl'])) {
                          echo $error['no_kl'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row"> PIC Mitra (Operation)</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <input type="input" name="pic_mitra_op" class="form form-control" placeholder="Nama PIC" value="<?php if (!empty($pic_mitra_op)) {
                                                                                                                          echo $pic_mitra_op;
                                                                                                                        } ?>">
                      </div>
                      <div class="float-left col-sm-2 py-2" style="font-size:10px">
                        Telp Mitra (Operation)
                      </div>
                      <div class="float-left col-sm-3">
                        <input type="input" name="kontak_mitra_op" class="form form-control" placeholder="Nomor Kontak PIC" value="<?php if (!empty($kontak_mitra_op)) {
                                                                                                                                      echo $kontak_mitra_op;
                                                                                                                                    } ?>" maxlength="12">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['data_mitra_op'])) {
                          echo $error['data_mitra_op'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Nama Produk</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="produk" class="form form-control" value="<?php if (!empty($produk)) {
                                                                                              echo $produk;
                                                                                            } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['produk'])) {
                          echo $error['produk'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row"> PIC Mitra (Delivery)</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <input type="input" name="pic_mitra_del" class="form form-control" placeholder="Nama PIC" value="<?php if (!empty($pic_mitra_del)) {
                                                                                                                            echo $pic_mitra_del;
                                                                                                                          } ?>">
                      </div>
                      <div class="float-left col-sm-2 py-2" style="font-size:10px">
                        Telp Mitra (Delivery)
                      </div>
                      <div class="float-left col-sm-3">
                        <input type="input" name="kontak_mitra_del" class="form form-control" placeholder="Nomor Kontak PIC" value="<?php if (!empty($kontak_mitra_del)) {
                                                                                                                                      echo $kontak_mitra_del;
                                                                                                                                    } ?>" maxlength="12">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['data_mitra_del'])) {
                          echo $error['data_mitra_del'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Availability</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <input type="input" name="availability" class="form form-control" value="<?php if (!empty($availability)) {
                                                                                                    echo $availability;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['availability'])) {
                          echo $error['availability'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row"> Overhandle by</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="text" name="overhandle_by" class="form form-control" value="<?php if (!empty($overhandle_by)) {
                                                                                                    echo $overhandle_by;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['overhandle_by'])) {
                          echo $error['overhandle_by'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row"> Mttr Recovery</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-7">
                        <input type="input" name="mttr_recovery" class="form form-control" value="<?php if (!empty($mttr_recovery)) {
                                                                                                    echo $mttr_recovery;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left col-sm-2 p-2">
                        Jam
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['mttr_recovery'])) {
                          echo $error['mttr_recovery'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row"> Verifikasi by</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="text" name="verifikasi_by" class="form form-control" value="<?php if (!empty($verifikasi_by)) {
                                                                                                    echo $verifikasi_by;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['verifikasi_by'])) {
                          echo $error['verifikasi_by'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Mttr Respone</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-7">
                        <input type="input" name="mttr_response" class="form form-control" value="<?php if (!empty($mttr_response)) {
                                                                                                    echo $mttr_response;
                                                                                                  } ?>">
                      </div>
                      <div class="float-left col-sm-2 p-2">
                        Jam
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['mttr_response'])) {
                          echo $error['mttr_response'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Catatan</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <textarea name="catatan" class="form-control"><?php if (!empty($catatan)) {
                                                                        echo $catatan;
                                                                      } ?></textarea>
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['catatan'])) {
                          echo $error['catatan'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row"> Pola Pembayaran</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-11">
                        <select class="form form-control" id="sel1" name="pola_pembayaran">
                          <option value="" selected="selected" disabled="disabled">Pilih Pola Pembayaran</option>
                          <option <?php if (!empty($pola_pembayaran) && $pola_pembayaran == "OTC") {
                                    echo "selected";
                                  } ?> value="OTC">OTC</option>
                          <option <?php if (!empty($pola_pembayaran) && $pola_pembayaran == "Recurring") {
                                    echo "selected";
                                  } ?> value="Recurring">Recurring</option>
                          <option <?php if (!empty($pola_pembayaran) && $pola_pembayaran == "Termin") {
                                    echo "selected";
                                  } ?> value="Termin">Termin</option>

                        </select>
                        <div class="float-right text-left">
                          <?php
                          if (!empty($error['pola_pembayaran'])) {
                            echo $error['pola_pembayaran'];
                          }
                          ?>
                        </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Document Handover</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="file" name="upload_file" value="" class="form form-control-file border p-2 rounded">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['upload_file'])) {
                          echo $error['upload_file'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <!-- <th scope="row" width="5%"></th>
                  <th scope="row">Tanggal Nodin</th>
                  <td>:</td>
                  <td>
                    <div class="float-left col-sm-4">
                      <div class="float-left"> <input type="date" id="" name="tgl_nodin" class="form form-control" value="<?php if (!empty($tgl_nodin)) {
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
                  </td> -->
                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Jangka Waktu Kontrak</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-6">
                        <input type="date" id="tanggal_plug_awal" placeholder="Waktu Awal" name="jangka_waktu_awal" class="form form-control" value="<?php if (!empty($jangka_waktu_awal)) {
                                                                                                                                                        echo $jangka_waktu_awal;
                                                                                                                                                      } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['jangka_waktu_awal'])) {
                          echo $error['jangka_waktu_awal'];
                        }
                        ?>
                      </div>

                      <div class="float-left col-sm-6">
                        <input type="date" id="tanggal_plug_akhir" placeholder="Waktu Akhir" name="jangka_waktu_akhir" class="form form-control" value="<?php if (!empty($jangka_waktu_akhir)) {
                                                                                                                                                          echo $jangka_waktu_akhir;
                                                                                                                                                        } ?>">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['jangka_waktu_akhir'])) {
                          echo $error['jangka_waktu_akhir'];
                        }
                        ?>
                      </div>
                    </td>
                    <th scope="row"></th>
                    <th scope="row">Document Topologi</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-9">
                        <input type="file" name="upload_topologi" value="" class="form form-control-file border p-2 rounded">
                      </div>
                      <div class="float-left text-left">
                        <?php
                        if (!empty($error['upload_topologi'])) {
                          echo $error['upload_topologi'];
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Tanggal SPK</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <div class="float-left"> <input type="date" id="" name="tgl_spk" class="form form-control" value="<?php if (!empty($tgl_spk)) {
                                                                                                                            echo $tgl_spk;
                                                                                                                          } ?>">
                        </div>
                        <div class="float-left text-left">
                          <?php
                          if (!empty($error['tgl_spk'])) {
                            echo $error['tgl_spk'];
                          }
                          ?>
                        </div>
                    </td>

                    <th scope="row"></th>
                    <th scope="row">Status Handover</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <div class="">
                          <div class="form-check pt-2 pr-2">
                            <label class="form-check-label">
                              <input type="checkbox" name="status_handcover[]" id="status_handcover" value="1. Data Sudah Lengkap" <?php if (!empty($status_handcover) && $status_handcover == in_array("1. Data Sudah Lengkap", $status_handcover)) {
                                                                                                                                      echo "checked";
                                                                                                                                    } ?> class="form-check-input" /> 1. Data Sudah Lengkap
                            </label>
                          </div>

                          <div class="form-check pt-2">
                            <label class="form-check-label">
                              <input type="checkbox" name="status_handcover[]" id="status_handcover" value="2. Data Sudah Verifikasi" <?php if (!empty($status_handcover) && $status_handcover == in_array("2. Data Sudah Verifikasi", $status_handcover)) {
                                                                                                                                        echo "checked";
                                                                                                                                      } ?> class="form-check-input" /> 2. Data Sudah Verifikasi
                            </label>
                          </div>

                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" width="5%"></th>
                    <th scope="row">Tanggal Nodin</th>
                    <td>:</td>
                    <td>
                      <div class="float-left col-sm-4">
                        <div class="float-left"> <input type="date" id="" name="tgl_nodin" class="form form-control" value="<?php if (!empty($tgl_nodin)) {
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
                    </td>
                  </tr>
                </table>
              </div>
              <div class="text-right" style="width:90%">
                <a href="index.php?link=detail_inventory&dt_proman=<?php echo $key; ?>" class="btn btn-warning" style="font-size:12px;">Cancel</a>
                <input type="submit" value="Submit" name="Submit" class="btn btn-success">
              </div>

              <input type="hidden" value="<?php echo !empty($key) ? $key : ""; ?>" name="key">
              <input type="hidden" value="<?php echo !empty($upload_name2) ? $upload_name2 : ""; ?>" name="upload_name2">
              <input type="hidden" value="<?php echo !empty($upload_name_topologi2) ? $upload_name_topologi2 : ""; ?>" name="upload_name_topologi2">
            </form>
          </div>


        </div>

</center>

<script src="js/jquery-1.10.2.min.js"></script>
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
</script>