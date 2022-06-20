<script type="text/javascript">

      WYSIWYG.attach('area1'); 

</script>
<?php
  if($_POST)
  {
    include("modul/action/data_problem_act.php");
  }

  if(!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit")
  {
    $act = "Edit";
    $key = $_GET['key'];
    $query_edit_proman = mysqli_query($con,"select * from tb_proman where ID_PROBLEM = '".$key."'");
    $dt_edit = mysqli_fetch_array($query_edit_proman);
    $sid = $dt_edit['SERVICE_ID'];
    $layanan = $dt_edit['LAYANAN'];
    $corporate_customer = $dt_edit['CORPORATE_CUSTOMER'];
    $request_by = $dt_edit['REQUEST_BY'];
    $tanggal_permintaan = $dt_edit['TANGGAL_PERMINTAAN'];
    $detail_permintaan = $dt_edit['DETAIL_PERMINTAAN'];
    $history_tiket = $dt_edit['HISTORY_TICKET'];
    $segment = $dt_edit['SEGMEN'];
    $regional = $dt_edit['REGIONAL'];
    $witel = $dt_edit['WITEL'];
    $lokasi = $dt_edit['LOKASI'];
    $status = ucwords(strtolower($dt_edit['STATUS']));
    $detail_act = $_GET['act_detail'];

    if(empty($dt_edit['NODIN']))
    {
      $nodin = "";
    }
    else
    {
      $nodin = $dt_edit['NODIN'];
    }

    if(empty($dt_edit['ORDERS']))
    {
      $order = "";
    }
    else
    {
      $order = $dt_edit['ORDERS'];
    }
  }

if(empty($act))
{
  $act = "Input";
}
?>

<div id="form_wraper" class="w-50 container card p-0 border border-dark" style="margin-top:20px;">
  <div class="card-head bg-dark text-white text-center">
    <h3>
      Form <?php echo $act;?> Data Problem
    </h3>
  </div>

  <div class="card-body">
    <form id="form_data_problem" class="" method="POST" enctype="multipart/form-data" action="index.php?petunjuk=<?php echo $petunjuk;?>&link=form_data_problem&act=<?php echo $act;?>">

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Service ID
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
          Corporate Customer
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="corporate_customer" class="form form-control" value="<?php if(!empty($corporate_customer)){echo $corporate_customer;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['corporate_customer']))
          {
            echo $error['corporate_customer'];
          } 
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nodin
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nodin" class="form form-control" value="<?php if(!empty($nodin)){echo $nodin;}?>">
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Order
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="order" class="form form-control" value="<?php if(!empty($order)){echo $order;}?>">
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Request By
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="request_by" class="form form-control" value="<?php if(!empty($request_by)){echo $request_by;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['request_by']))
          {
            echo $error['request_by'];
          }
          ?>
        </div>
      </div>

       <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Tanggal Permintaan
        </div>
        <div class="float-left col-sm-8">
          <input type="date" name="tanggal_permintaan" class="form form-control" value="<?php if(!empty($tanggal_permintaan)){echo $tanggal_permintaan;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['tanggal_permintaan']))
          {
            echo $error['tanggal_permintaan'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Detail Permintaan
        </div>
        <div class="float-left col-sm-8">
          <div >
          <textarea id="summernote" class="form form-control" rows="20" name="detail_permintaan" style="font-size:12px;"><?php if(!empty($detail_permintaan)){echo $detail_permintaan;}?></textarea>
        </div>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['detail_permintaan']))
          {
            echo $error['detail_permintaan'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          History Tiket
        </div>
        <div class="float-left col-sm-8">
          <input type="text" name="history_tiket" class="form form-control" value="<?php if(!empty($history_tiket)){echo $history_tiket;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['history_tiket']))
          {
            echo $error['history_tiket'];
          } 
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Segment
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="segment" >
            <option value=""></option>
            <option <?php if(!empty($segment) && $segment == "BMS1"){echo "selected";}?> value="BMS1">BMS1</option>
            <option <?php if(!empty($segment) && $segment == "BMS2"){echo "selected";}?> value="BMS2">BMS2</option>
            <option <?php if(!empty($segment) && $segment == "FMS"){echo "selected";}?> value="FMS">FMS</option>
            <option <?php if(!empty($segment) && $segment == "TMS"){echo "selected";}?> value="TMS">TMS</option>
            <option <?php if(!empty($segment) && $segment == "MLS"){echo "selected";}?> value="MLS">MLS</option>
            <option <?php if(!empty($segment) && $segment == "MAS"){echo "selected";}?> value="MAS">MAS</option>
            <option <?php if(!empty($segment) && $segment == "IBS"){echo "selected";}?> value="IBS">IBS</option>
            <option <?php if(!empty($segment) && $segment == "HWS"){echo "selected";}?> value="HWS">HWS</option>
            <option <?php if(!empty($segment) && $segment == "PCS"){echo "selected";}?> value="PCS">PCS</option>
            <option <?php if(!empty($segment) && $segment == "DTS"){echo "selected";}?> value="DTS">DTS</option>
            <option <?php if(!empty($segment) && $segment == "ERS"){echo "selected";}?> value="ERS">ERS</option>
            <option <?php if(!empty($segment) && $segment == "MCS"){echo "selected";}?> value="MCS">MCS</option>
            <option <?php if(!empty($segment) && $segment == "THS"){echo "selected";}?> value="THS">THS</option>
            <option <?php if(!empty($segment) && $segment == "EMS"){echo "selected";}?> value="EMS">EMS</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['segment']))
          {
            echo $error['segment'];
          } 
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Regional
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="regional" >
            <option value=""></option>
            <option <?php if(!empty($regional) && $regional == "1"){echo "selected";}?> value="1">1</option>
            <option <?php if(!empty($regional) && $regional == "2"){echo "selected";}?> value="2">2</option>
            <option <?php if(!empty($regional) && $regional == "3"){echo "selected";}?> value="3">3</option>
            <option <?php if(!empty($regional) && $regional == "4"){echo "selected";}?> value="4">4</option>
            <option <?php if(!empty($regional) && $regional == "5"){echo "selected";}?> value="5">5</option>
            <option <?php if(!empty($regional) && $regional == "6"){echo "selected";}?> value="6">6</option>
            <option <?php if(!empty($regional) && $regional == "7"){echo "selected";}?> value="7">7</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['regional']))
          {
            echo $error['regional'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Witel
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="witel" class="form form-control" value="<?php if(!empty($witel)){echo $witel;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['witel']))
          {
            echo $error['witel'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Lokasi
        </div>
        <div class="float-left col-sm-8">
          <textarea class="form form-control" rows="5" name="lokasi" style="font-size:12px"><?php if(!empty($lokasi)){echo $lokasi;}?></textarea>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['witel']))
          {
            echo $error['witel'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Status
        </div>
        <div class="float-left col-sm-8">
          <select class="form form-control" id="sel1" name="status" >
            <option value=""></option>
            <option <?php if(!empty($status) && $status == "On Progress"){echo "selected";}?> value="On Progress">On Progress</option>
            <option <?php if(!empty($status) && $status == "Pending"){echo "selected";}?> value="Pending">Pending</option>
            <option <?php if(!empty($status) && $status == "Close"){echo "selected";}?> value="Close">Close</option>
          </select>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['status']))
          {
            echo $error['status'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Document
        </div>
        <div class="float-left col-sm-8">
          <input type="file" name="upload_document" value="" class="form form-control-file border p-2 rounded">
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

      <div class="text-right">
          <input type="submit" value="Submit" name="Submit" class="btn btn-success">
      </div>

      <input type="hidden" value="<?php echo $key;?>" name="key">
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