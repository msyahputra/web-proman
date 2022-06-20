<?php
  if($_POST)
  {
    include("modul/action/overhandle_act.php");
  }

  if(!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit")
  {
    $act = "Edit";
    $key = $_GET['key'];

    $query_edit_overhandle = mysqli_query($con,"select * from tb_overhandle_proman where id_project = '".$key."'");
    $dt_edit = mysqli_fetch_array($query_edit_overhandle);

    $corporate_account = ucwords(strtolower($dt_edit['corporate_account']));
    $nama_project = ucwords(strtolower($dt_edit['nama_project']));
    $nilai_project = $dt_edit['nilai_project'];
    $nama_cc = ucwords(strtolower($dt_edit['nama_cc']));
    $order_ncx_ticares = $dt_edit['order_ncx_ticares'];
    $sid = $dt_edit['sid'];
    $segmen = $dt_edit['segmen'];
    $divisi = $dt_edit['divisi'];
    $status_overhandle = $dt_edit['status_overhandle'];
    $nomor_kb_pks =  $dt_edit['nomor_kb_pks'];
    $nama_am = $dt_edit['nama_am'];
    $nomor_kontak_am = $dt_edit['nomor_kontak_am'];
    $nama_mitra = $dt_edit['nama_mitra'];
    $pic_mitra = $dt_edit['pic_mitra'];
    $no_pic_mitra = $dt_edit['no_pic_mitra'];
    $nomor_kl = $dt_edit['nomor_kl'];
    $tanggal_bast = $dt_edit['tanggal_bast'];
    $layanan = $dt_edit['layanan'];
    $metode_pembayaran = $dt_edit['metode_pembayaran'];
    $slg = $dt_edit['slg'];
    $mttr_recovery = $dt_edit['mttr_recovery'];
    $mttr_respone = $dt_edit['mttr_respone'];
    $pic_penyerah = $dt_edit['pic_penyerah'];
    $nik_penyerah = $dt_edit['nik_penyerah'];
    $pic_penerima = $dt_edit['pic_penerima'];
    $nik_penerima = $dt_edit['nik_penerima'];
    $upload_name2 = $dt_edit['upload_name'];
  }

if(empty($act))
{
  $act = "Input";
}
?>

<div id="form_wraper" class="w-50 container card p-0 border border-dark mb-2" style="margin-top:20px;">
  <div class="card-head bg-dark text-white text-center">
    <h3>
      Form <?php echo $act;?> Overhandle
    </h3>
  </div>

  <div class="card-body">
    <form id="form_data_input" class="" method="POST" enctype="multipart/form-data" action="index.php?link=form_overhandle&act=<?php echo $act;?>">

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Corporate Account
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="corporate_account" class="form form-control" value="<?php if(!empty($corporate_account)){echo $corporate_account;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['corporate_account']))
          {
            echo $error['corporate_account'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama Project
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_project" class="form form-control" value="<?php if(!empty($nama_project)){echo $nama_project;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_project']))
          {
            echo $error['nama_project'];
          }
          ?>
        </div>
      </div>

       <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nilai Project
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nilai_project" class="form form-control" value="<?php if(!empty($nilai_project)){echo $nilai_project;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nilai_project']))
          {
            echo $error['nilai_project'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama CC
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_cc" class="form form-control" value="<?php if(!empty($nama_cc)){echo $nama_cc;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_cc']))
          {
            echo $error['nama_cc'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Order NCX/Ticares
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="order_ncx_ticares" class="form form-control" value="<?php if(!empty($order_ncx_ticares)){echo $order_ncx_ticares;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['order_ncx_ticares']))
          {
            echo $error['order_ncx_ticares'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          SID
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="sid" class="form form-control" value="<?php if(!empty($sid)){echo $sid;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['sid']))
          {
            echo $error['sid'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Segmen
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="segmen" >
            <option value=""></option>
            <option <?php if(!empty($segmen) && $segmen == "BMS1"){echo "selected";}?> value="BMS1">BMS1</option>
            <option <?php if(!empty($segmen) && $segmen == "BMS2"){echo "selected";}?> value="BMS2">BMS2</option>
            <option <?php if(!empty($segmen) && $segmen == "FMS"){echo "selected";}?> value="FMS">FMS</option>
            <option <?php if(!empty($segmen) && $segmen == "TMS"){echo "selected";}?> value="TMS">TMS</option>
            <option <?php if(!empty($segmen) && $segmen == "MLS"){echo "selected";}?> value="MLS">MLS</option>
            <option <?php if(!empty($segmen) && $segmen == "MAS"){echo "selected";}?> value="MAS">MAS</option>
            <option <?php if(!empty($segmen) && $segmen == "IBS"){echo "selected";}?> value="IBS">IBS</option>
            <option <?php if(!empty($segmen) && $segmen == "HWS"){echo "selected";}?> value="HWS">HWS</option>
            <option <?php if(!empty($segmen) && $segmen == "PCS"){echo "selected";}?> value="PCS">PCS</option>
            <option <?php if(!empty($segmen) && $segmen == "DTS"){echo "selected";}?> value="DTS">DTS</option>
            <option <?php if(!empty($segmen) && $segmen == "ERS"){echo "selected";}?> value="ERS">ERS</option>
            <option <?php if(!empty($segmen) && $segmen == "MCS"){echo "selected";}?> value="MCS">MCS</option>
            <option <?php if(!empty($segmen) && $segmen == "THS"){echo "selected";}?> value="THS">THS</option>
            <option <?php if(!empty($segmen) && $segmen == "EMS"){echo "selected";}?> value="EMS">EMS</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['segmen']))
          {
            echo $error['segmen'];
          }
          ?>
        </div>
      </div>

        <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Divisi
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="divisi" >
            <option value=""></option>
            <?php
            $parameter_divisi = mysqli_query($con,"select * from tb_parameter_detail where PARAMETER_TYPE = 'DIVISI'");
            $cek_divisi = mysqli_num_rows($parameter_divisi);

            if($cek_divisi > 0){
              while($data_divisi = mysqli_fetch_array($parameter_divisi)){

                if(!empty($divisi) && $divisi == $data_divisi['PARAMETER_VALUE']){
                  $div_pilih = " selected ";
                }else{
                  $div_pilih = " ";
                }

                echo "<option value='".$data_divisi['PARAMETER_VALUE']."' ".$div_pilih.">".$data_divisi['PARAMETER_VALUE']."</option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['divisi']))
          {
            echo $error['divisi'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Status Overhandle
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="status_overhandle" >
            <option value=""></option>
            <option <?php if(!empty($status_overhandle) && $status_overhandle == "On Progress"){echo "selected";}?> value="On Progress">On Progress</option>
            <option <?php if(!empty($status_overhandle) && $status_overhandle == "Over Due"){echo "selected";}?> value="Over Due">Over Due</option>
            <option <?php if(!empty($status_overhandle) && $status_overhandle == "Close"){echo "selected";}?> value="Close">Close</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['status_overhandle']))
          {
            echo $error['status_overhandle'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nomor KB/PKS
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nomor_kb_pks" class="form form-control" value="<?php if(!empty($nomor_kb_pks)){echo $nomor_kb_pks;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nomor_kb_pks']))
          {
            echo $error['nomor_kb_pks'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama AM
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="nama_am" class="form form-control" placeholder="" value="<?php if(!empty($nama_am)){echo $nama_am;}?>" size="2">
        </div>
        <div class="float-left col-sm-1 py-2" style="font-size:10px">
          Telp
        </div>
        <div class="float-left col-sm-3">
          <input type="input" name="nomor_kontak_am" class="form form-control" placeholder="Nomor Kontak AM" value="<?php if(!empty($nomor_kontak_am)){echo $nomor_kontak_am;}?>" maxlength="12">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['data_am']))
          {
            echo $error['data_am'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama Mitra
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_mitra" class="form form-control" value="<?php if(!empty($nama_mitra)){echo $nama_mitra;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_mitra']))
          {
            echo $error['nama_mitra'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          PIC Mitra
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="pic_mitra" class="form form-control" placeholder="Nama PIC" value="<?php if(!empty($pic_mitra)){echo $pic_mitra;}?>">
        </div>
        <div class="float-left col-sm-1 py-2" style="font-size:10px">
          Telp
        </div>
        <div class="float-left col-sm-3">
          <input type="input" name="no_pic_mitra" class="form form-control" placeholder="Nomor Kontak PIC" value="<?php if(!empty($no_pic_mitra)){echo $no_pic_mitra;}?>" maxlength="12">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['data_mitra']))
          {
            echo $error['data_mitra'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nomor KL
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nomor_kl" class="form form-control" value="<?php if(!empty($nomor_kl)){echo $nomor_kl;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['no_kl']))
          {
            echo $error['no_kl'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Tanggal BAST
        </div>
        <div class="float-left col-sm-8">
          <input type="date" name="tanggal_bast" class="form form-control" value="<?php if(!empty($tanggal_bast)){echo $tanggal_bast;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['tanggal_bast']))
          {
            echo $error['tanggal_bast'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Layanan
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="layanan" class="form form-control" value="<?php if(!empty($layanan)){echo $layanan;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['layanan']))
          {
            echo $error['layanan'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Metode Pembayaran
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="metode_pembayaran" >
            <option value=""></option>
            <option <?php if(!empty($metode_pembayaran) && $metode_pembayaran == "Recuring"){echo "selected";}?> value="Recuring">Recuring</option>
            <option <?php if(!empty($metode_pembayaran) && $metode_pembayaran == "Termin"){echo "selected";}?> value="Termin">Termin</option>
            <option <?php if(!empty($metode_pembayaran) && $metode_pembayaran == "OTC"){echo "selected";}?> value="OTC">OTC (One Time Charge)</option>
            <option <?php if(!empty($metode_pembayaran) && $metode_pembayaran == "Transaksional"){echo "selected";}?> value="Transaksional">Transaksional</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['metode_pembayaran']))
          {
            echo $error['metode_pembayaran'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          SLG
        </div>
        <div class="float-left col-sm-7">
          <input type="input" name="slg" class="form form-control" value="<?php if(!empty($slg)){echo $slg;}?>">
        </div>
        <div class="float-left col-sm-1 p-2">
          %
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['slg']))
          {
            echo $error['slg'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Mttr Recovery
        </div>
        <div class="float-left col-sm-7">
          <input type="input" name="mttr_recovery" class="form form-control" value="<?php if(!empty($mttr_recovery)){echo $mttr_recovery;}?>">
        </div>
        <div class="float-left col-sm-1 p-2">
          Jam
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['mttr_recovery']))
          {
            echo $error['mttr_recovery'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Mttr Respone
        </div>
        <div class="float-left col-sm-7">
          <input type="input" name="mttr_respone" class="form form-control" value="<?php if(!empty($mttr_respone)){echo $mttr_respone;}?>">
        </div>
        <div class="float-left col-sm-1 p-2">
          Jam
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['mttr_respone']))
          {
            echo $error['mttr_respone'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          PIC Penyerah Overhandle
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="pic_penyerah" class="form form-control" placeholder="Nama PIC" value="<?php if(!empty($pic_penyerah)){echo $pic_penyerah;}?>">
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="nik_penyerah" class="form form-control" placeholder="NIK PIC" value="<?php if(!empty($nik_penyerah)){echo $nik_penyerah;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['data_penyerah']))
          {
            echo $error['data_penyerah'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          PIC Penerima Overhandle
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="pic_penerima" class="form form-control" placeholder="Nama PIC" value="<?php if(!empty($pic_penerima)){echo $pic_penerima;}?>">
        </div>
        <div class="float-left col-sm-4">
          <input type="input" name="nik_penerima" class="form form-control" placeholder="NIK PIC" value="<?php if(!empty($nik_penerima)){echo $nik_penerima;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['data_penerima']))
          {
            echo $error['data_penerima'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Upload Document
        </div>
        <div class="float-left col-sm-8">
          <input type="file" name="upload_file" value="" class="form form-control-file border p-2 rounded">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['upload_file']))
          {
            echo $error['upload_file'];
          }
          ?>
        </div>
      </div>

      <div class="text-right" style="width:90%">
          <a href="index.php?link=detail_overhandle&dt_proman=<?php echo $key;?>" class="btn btn-warning" style="font-size:12px;">Cancel</a>
          <input type="submit" value="Submit" name="Submit" class="btn btn-success">
      </div>

      <input type="hidden" value="<?php if(!empty($key)){echo $key;}?>" name="key">
      <input type="hidden" value="<?php if(!empty($upload_name2)){echo $upload_name2;}?>" name="upload_name2">
    </form>
  </div>

  <div class="card-footer bg-dark">
  </div>
</div> 

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