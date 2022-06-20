<?php
  if($_POST)
  {
    include("modul/action/project_qe_act.php");
  }

  if(!empty($_GET['act_detail']) && $_GET['act_detail'] == "Edit")
  {
    $act = "Edit";
    $key = $_GET['key'];

    $query_edit_projectQE = mysqli_query($con,"select * from tb_project_qe where id_projectQE = '".$key."'");
    $dt_edit = mysqli_fetch_array($query_edit_projectQE);

    $corporate_account = $dt_edit['corporate_account'];
    $nama_corporate = ucwords(strtolower($dt_edit['nama_corporate']));
    $sid = $dt_edit['sid'];
    $layanan = $dt_edit['layanan'];
    $nama_am = $dt_edit['nama_am'];
    $kontak_am =  $dt_edit['kontak_am'];
    $email_am = $dt_edit['email_am'];
    $nama_eos = $dt_edit['nama_eos'];
    $kontak_eos = $dt_edit['kontak_eos'];
    $email_eos = $dt_edit['email_eos'];
    $alamat = $dt_edit['alamat'];
    $detail_permintaan = $dt_edit['detail_permintaan'];
    $update_progress = $dt_edit['update_progress'];
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
      Form <?php echo $act;?> Project QE
    </h3>
  </div>

  <div class="card-body">
    <form id="form_data_input" class="" method="POST" enctype="multipart/form-data" action="index.php?link=form_projectQE&act=<?php echo $act;?>">

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
          Nama Corporate
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_corporate" class="form form-control" value="<?php if(!empty($nama_corporate)){echo $nama_corporate;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_corporate']))
          {
            echo $error['nama_corporate'];
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
          Nama AM
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_am" class="form form-control" value="<?php if(!empty($nama_am)){echo $nama_am;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_am']))
          {
            echo $error['nama_am'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Kontak AM
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="kontak_am" class="form form-control" value="<?php if(!empty($kontak_am)){echo $kontak_am;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['kontak_am']))
          {
            echo $error['kontak_am'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Email AM
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="email_am" class="form form-control" value="<?php if(!empty($email_am)){echo $email_am;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['email_am']))
          {
            echo $error['email_am'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Nama EOS
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="nama_eos" class="form form-control" value="<?php if(!empty($nama_eos)){echo $nama_eos;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['nama_eos']))
          {
            echo $error['nama_eos'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Kontak EOS
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="kontak_eos" class="form form-control" value="<?php if(!empty($kontak_eos)){echo $kontak_eos;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['kontak_eos']))
          {
            echo $error['kontak_eos'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Email EOS
        </div>
        <div class="float-left col-sm-8">
          <input type="input" name="email_eos" class="form form-control" value="<?php if(!empty($email_eos)){echo $email_eos;}?>">
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['email_eos']))
          {
            echo $error['email_eos'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Alamat Lokasi
        </div>
        <div class="float-left col-sm-8">
          <textarea name="alamat" class="form form-control"><?php if(!empty($alamat)){echo $alamat;}?></textarea>
        </div>
        <div class="float-left text-left">
          <?php
          if(!empty($error['alamat']))
          {
            echo $error['alamat'];
          }
          ?>
        </div>
      </div>

      <div class="clearfix mb-2">
        <div class="float-left py-2 pr-1 col-sm-3 text-right">
          Detail Permintaan
        </div>
        <div class="float-left col-sm-8">
          <textarea id="summernote" name="detail_permintaan" class="form form-control"><?php if(!empty($detail_permintaan)){echo $detail_permintaan;}?></textarea>
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
          <a href="index.php?link=detail_projectQE&dt_proman=<?php echo $key;?>" class="btn btn-warning" style="font-size:12px;">Cancel</a>
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