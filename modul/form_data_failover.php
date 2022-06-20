<?php
  if($_POST)
  {
    include("modul/action/failover_act.php");
  }

  if(!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit")
  {
    $act = "Edit";
    $key = $_GET['key'];

    $query_edit_failover = mysqli_query($con,"select * from tb_failover_proman where id_failover  = '".$key."'");
    $dt_edit = mysqli_fetch_array($query_edit_failover);

    $nama_customer = $dt_edit['nama_customer'];
    $sid = $dt_edit['sid'];
    $layanan  = $dt_edit['layanan'];
    $type_link = $dt_edit['type_link'];
    $deskripsi_link = $dt_edit['deskripsi_link'];
    $bandwidth = $dt_edit['bandwidth'];
    $pe = $dt_edit['pe'];
    $interface = $dt_edit['interface'];
    $me_end1 = $dt_edit['me_end1'];
    $me_end2 = $dt_edit['me_end2'];
    $akses = $dt_edit['akses'];
    $routing_type = $dt_edit['routing_type'];
    $nama_sto = $dt_edit['nama_sto'];
    $divisi = $dt_edit['divisi'];
    $segmen = $dt_edit['segmen'];
    $tgl_failover = $dt_edit['tgl_failover'];
    $tgl_rollback = $dt_edit['tgl_rollback'];
    $status_failover = $dt_edit['status_failover'];
    $nama_doc = $dt_edit['nama_doc'];
  }

if(empty($act))
{
  $act = "Input";
}
?>

<div id="form_wraper" class="w-50 container card p-0 border border-dark" style="margin-top:20px;">
  <div class="card-head bg-dark text-white text-center">
    <h3>
      Form <?php echo $act;?> FailOver
    </h3>
  </div>

  <div class="card-body">
    <form id="form_data_failover" class="" method="POST" enctype="multipart/form-data" action="index.php?link=form_failover&act=<?php echo $act;?>">

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama Customer
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_customer" class="form form-control" value="<?php if(!empty($nama_customer)){echo $nama_customer;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_customer']))
          {
            echo $error['nama_customer'];
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
          Type Link
        </div>
        <div class="float-left col-sm-4">
          <div class="">
            <div class="form-check pt-2 pr-2">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type_link" value="Backhault" <?php if(!empty($type_link) && $type_link == "Backhaul"){ echo "checked";}?>>Backhaul
              </label>
            </div>
            <div class="form-check pt-2">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type_link" value="Backup Backhault" <?php if(!empty($type_link) && $type_link == "Backup Backhaul"){ echo "checked";}?>>Backup Backhaul
              </label>
            </div>
             <div class="form-check pt-2">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type_link" value="Main Link" <?php if(!empty($type_link) && $type_link == "Main Link"){ echo "checked";}?>>Main Link
              </label>
            </div>
             <div class="form-check pt-2">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type_link" value="Backup Link" <?php if(!empty($type_link) && $type_link == "Backup Link"){ echo "checked";}?>>Backup Link
              </label>
            </div>
          </div>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['type_link']))
          {
            echo $error['type_link'];
          }
          ?>
        </div>
      </div>
      
      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Deskripsi Link
        </div>
        <div class="float-left col-sm-8">
          <textarea name="deskripsi_link" class="form-control"><?php if(!empty($deskripsi_link)){echo $deskripsi_link;}?></textarea>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['deskripsi_link']))
          {
            echo $error['deskripsi_link'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Bandwidth
        </div>
        <div class="float-left col-sm-7">
          <input type="input" name="bandwidth" class="form form-control" placeholder="dalam satuan Kb" value="<?php if(!empty($bandwidth)){echo $bandwidth;}?>">
        </div>
        <div class="float-left col-1 p-2 m-0">
          Kb
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['bandwidth']))
          {
            echo $error['bandwidth'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Router PE
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="pe" class="form form-control" value="<?php if(!empty($pe)){echo $pe;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['pe']))
          {
            echo $error['pe'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Interface
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="interface" class="form form-control" value="<?php if(!empty($interface)){echo $interface;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['interface']))
          {
            echo $error['interface'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Metro End 1
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="me_end1" class="form form-control" value="<?php if(!empty($me_end1)){echo $me_end1;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['me_end1']))
          {
            echo $error['me_end1'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Metro End 2
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="me_end2" class="form form-control" value="<?php if(!empty($me_end2)){echo $me_end2;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['me_end2']))
          {
            echo $error['me_end2'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Akses
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="akses" class="form form-control" value="<?php if(!empty($akses)){echo $akses;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['akses']))
          {
            echo $error['akses'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Routing Type
        </div>
        <div class="float-left col-sm-8">
          <select name="routing_type" class="form form-control" id="sel1">
            <option value=""></option>
            <option value="Static" <?php if(!empty($routing_type) && $routing_type == "Static"){echo "selected";}?> >Static</option>
            <option value="RIP" <?php if(!empty($routing_type) && $routing_type == "RIP"){echo "selected";}?> >RIP</option>
            <option value="OSPF" <?php if(!empty($routing_type) && $routing_type == "OSPF"){echo "selected";}?> >OSPF</option>
            <option value="BGP" <?php if(!empty($routing_type) && $routing_type == "BGP"){echo "selected";}?> >BGP</option>
			<option value="EGRP" <?php if(!empty($routing_type) && $routing_type == "EGRP"){echo "selected";}?> >EGRP</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['routing_type']))
          {
            echo $error['routing_type'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama STO
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_sto" class="form form-control" value="<?php if(!empty($nama_sto)){echo $nama_sto;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_sto']))
          {
            echo $error['nama_sto'];
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
            <option <?php if(!empty($divisi) && $divisi == "DES"){echo "selected";}?> value="DES">DES</option>
            <option <?php if(!empty($divisi) && $divisi == "DGS"){echo "selected";}?> value="DGS">DGS</option>
            <option <?php if(!empty($divisi) && $divisi == "DBS"){echo "selected";}?> value="DBS">DBS</option>
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
          Segment
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="segmen" >
            <option value=""></option>
            <option <?php if(!empty($segmen) && $segmen == "BMS1"){echo "selected";}?> value="BMS1">DES-BMS1</option>
            <option <?php if(!empty($segmen) && $segmen == "BMS2"){echo "selected";}?> value="BMS2">DES-BMS2</option>
            <option <?php if(!empty($segmen) && $segmen == "FMS"){echo "selected";}?> value="FMS">DES-FMS</option>
            <option <?php if(!empty($segmen) && $segmen == "TMS"){echo "selected";}?> value="TMS">DES-TMS</option>
            <option <?php if(!empty($segmen) && $segmen == "MLS"){echo "selected";}?> value="MLS">DES-MLS</option>
            <option <?php if(!empty($segmen) && $segmen == "MAS"){echo "selected";}?> value="MAS">DES-MAS</option>
            <option <?php if(!empty($segmen) && $segmen == "IBS"){echo "selected";}?> value="IBS">DES-IBS</option>
            <option <?php if(!empty($segmen) && $segmen == "HWS"){echo "selected";}?> value="HWS">DES-HWS</option>
            <option <?php if(!empty($segmen) && $segmen == "PCS"){echo "selected";}?> value="PCS">DES-PCS</option>
            <option <?php if(!empty($segmen) && $segmen == "DTS"){echo "selected";}?> value="DTS">DES-DTS</option>
            <option <?php if(!empty($segmen) && $segmen == "ERS"){echo "selected";}?> value="ERS">DES-ERS</option>
            <option <?php if(!empty($segmen) && $segmen == "MCS"){echo "selected";}?> value="MCS">DES-MCS</option>
            <option <?php if(!empty($segmen) && $segmen == "THS"){echo "selected";}?> value="THS">DES-THS</option>
            <option <?php if(!empty($segmen) && $segmen == "EMS"){echo "selected";}?> value="EMS">DES-EMS</option>

            <option <?php if(!empty($segmen) && $segmen == "MPS"){echo "selected";}?> value="MPS">DGS-MPS</option>
            <option <?php if(!empty($segmen) && $segmen == "GAS"){echo "selected";}?> value="GAS">DGS-GAS</option>
            <option <?php if(!empty($segmen) && $segmen == "CGS"){echo "selected";}?> value="CGS">DGS-CGS</option>
            <option <?php if(!empty($segmen) && $segmen == "LGS"){echo "selected";}?> value="LGS">DGS-LGS</option>

            <option <?php if(!empty($segmen) && $segmen == "HBS"){echo "selected";}?> value="HBS">DBS-HBS</option>
            <option <?php if(!empty($segmen) && $segmen == "LBS"){echo "selected";}?> value="LBS">DBS-LBS</option>
            <option <?php if(!empty($segmen) && $segmen == "CCS"){echo "selected";}?> value="CCS">DBS-CCS</option>
            <option <?php if(!empty($segmen) && $segmen == "MBS"){echo "selected";}?> value="MBS">DBS-MBS</option>
            <option <?php if(!empty($segmen) && $segmen == "TBS"){echo "selected";}?> value="TBS">DBS-TBS</option>
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
          Tanggal Failover
        </div>
        <div class="float-left col-sm-8">
          <input type="date" name="tgl_failover" class="form form-control" value="<?php if(!empty($tgl_failover)){echo $tgl_failover;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['tgl_failover']))
          {
            echo $error['tgl_failover'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Tanggal Rollback
        </div>
        <div class="float-left col-sm-8">
          <input type="date" name="tgl_rollback" class="form form-control" value="<?php if(!empty($tgl_rollback)){echo $tgl_rollback;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['tgl_rollback']))
          {
            echo $error['tgl_rollback'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Status Failover
        </div>
        <div class="float-left col-sm-8">
          <select name="status_failover" class="form form-control" id="sel1">
            <option value=""></option>
            <option value="Succeed" <?php if(!empty($status_failover) && $status_failover == "Succeed"){echo "selected";}?> >Succeed</option>
            <option value="Failed" <?php if(!empty($status_failover) && $status_failover == "Failed"){echo "selected";}?> >Failed</option>
            <option value="Pending" <?php if(!empty($status_failover) && $status_failover == "Pending"){echo "selected";}?> >Pending</option>
            <option value="Monitoring" <?php if(!empty($status_failover) && $status_failover == "Monitoring"){echo "selected";}?> >Monitoring</option>
			<option value="Monitoring" <?php if(!empty($status_failover) && $status_failover == "Stanby"){echo "selected";}?> >Stanby</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['status_failover']))
          {
            echo $error['status_failover'];
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
          <a href="index.php?link=detail_failover&dt_proman=<?php echo $key;?>" class="btn btn-warning" style="font-size:12px;">Cancel</a>
          <input type="submit" value="Submit" name="Submit" class="btn btn-success">
      </div>

      <input type="hidden" value="<?php if(!empty($key)){echo $key;}?>" name="key">
      <input type="hidden" value="<?php if(!empty($nama_doc)){echo $nama_doc;}?>" name="nama_doc">
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