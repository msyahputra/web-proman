<?php
if($_POST)
{
  include("modul/action/user_act.php");
}

if(!empty($_GET['key']))
{
  $key = $_GET['key'];

  $query_data_edit = mysqli_query($con,"select * from tb_user_proman where id_user = '".$key."'");
  $sh_data_edit = mysqli_fetch_array($query_data_edit);

  $nama_user = $sh_data_edit['nama'];
  $nik_id_perner = $sh_data_edit['nik_id_perner'];
  $jabatan = $sh_data_edit['jabatan'];
  $no_telepon = $sh_data_edit['no_telepon'];
  $gender = $sh_data_edit['gender'];
  $email = $sh_data_edit['email'];
  $alamat = $sh_data_edit['alamat'];
  $status_user = $sh_data_edit['status_user'];
  $level_user = $sh_data_edit['level_user'];
  $username = $sh_data_edit['username'];
}

?>
    <div id="contain_user_form" class="mt-3 mb-2">

      <div class="card container p-0" style="width: 850px;border:none">

        <div class="card-head bg-dark text-white text-center">
          <h3>Form User Baru</h3>
        </div>

        <div class="card-body">
          <form class="container" style="width:800px" action="index.php?link=edit_user&clue=edit" method="POST">

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Nama Lengkap
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" name="nama_user" class="form form-control"  value="<?php if(!empty($nama_user)){echo $nama_user;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['nama_user']))
                {
                  echo $error['nama_user'];
                }
                ?>
              </div>
            </div>

             <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                NIK / ID Perner
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" name="nik_id_perner" class="form form-control" value="<?php if(!empty($nik_id_perner)){echo $nik_id_perner;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['nik_id_perner']))
                {
                  echo $error['nik_id_perner'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Jabatan
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" name="jabatan" class="form form-control" value="<?php if(!empty($jabatan)){echo $jabatan;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['jabatan']))
                {
                  echo $error['jabatan'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Nomor Telepon
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" name="no_telepon" class="form form-control" value="<?php if(!empty($no_telepon)){echo $no_telepon;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['no_telepon']))
                  {
                    echo $error['no_telepon'];
                  }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Gender
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <select name="gender" class="form form-control" id="sel1">
                  <option value=""></option>
                  <option value="Pria" <?php if(!empty($gender) && $gender == "Pria"){echo "selected";}?> >Pria</option>
                  <option value="Wanita" <?php if(!empty($gender) && $gender == "Wanita"){echo "selected";}?> >Wanita</option>
                </select>
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['gender']))
                  {
                    echo $error['gender'];
                  }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Email
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" name="email" class="form form-control" value="<?php if(!empty($email)){echo $email;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['email']))
                {
                  echo $error['email'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Alamat
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <textarea style="font-size:12px" name="alamat" class="form form-control" rows="3" cols=""><?php if(!empty($alamat)){echo $alamat;}?></textarea>
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['alamat']))
                {
                  echo $error['alamat'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Status User
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <select name="status_user" class="form form-control" id="sel1">
                  <option value=""></option>
                  <option value="Active" <?php if(!empty($status_user) && $status_user == "Active"){echo "selected";}?> >Active</option>
                  <option value="Deactive" <?php if(!empty($status_user) && $status_user == "Deactive"){echo "selected";}?> >Deactive</option>
                </select>
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['status_user']))
                {
                  echo $error['status_user'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Level User
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <select name="level_user" class="form form-control" id="sel1">
                  <option value=""></option>
                  <option value="1" <?php if(!empty($level_user) && $level_user == "1"){echo "selected";}?>>1</option>
                  <option value="2" <?php if(!empty($level_user) && $level_user == "2"){echo "selected";}?>>2</option>
                  <option value="3" <?php if(!empty($level_user) && $level_user == "3"){echo "selected";}?>>3</option>
                  <option value="4" <?php if(!empty($level_user) && $level_user == "4"){echo "selected";}?>>4</option>
                  <option value="5" <?php if(!empty($level_user) && $level_user == "5"){echo "selected";}?>>5</option>
                </select>
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['level_user']))
                {
                  echo $error['level_user'];
                }
                ?>
              </div>
            </div>

            <div class="clearfix mb-2">
              <div class="col-3 float-left text-right p-2">
                Username
              </div>
              <div class="col-1 float-left text-center p-2">
                :
              </div>
              <div class="float-left col-7">
                <input type="text" readonly name="username" class="form form-control" value="<?php if(!empty($username)){echo $username;}?>">
              </div>
              <div class="float-left">
                <?php
                if(!empty($error['username']))
                {
                  echo $error['username'];
                }
                ?>
              </div>
            </div>

            <div class="text-right container" style="width: 700px">
              <input class="btn btn-success" type="submit" name="submit" value="Submit">
              <input type="hidden" name="key" value="<?php if(!empty($key)){echo $key;}?>">
            </div>

          </form>
        </div>

        <div class="card-footer bg-dark">
        </div>

      </div>

    </div>