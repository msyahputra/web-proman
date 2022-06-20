<?php
if($_POST)
{
	include("modul/action/user_act.php");
}
if(!empty($_GET['dt_user']))
{
	$dt_user = $_GET['dt_user'];
}

$query_dt_user = mysqli_query($con,"select * from tb_user_proman where id_user = '".$dt_user."'");
$sh_data = mysqli_fetch_array($query_dt_user);
?>
<div id="contain_detail_user" class="container w-50" style="margin-top:10px">
	<div class="card" style="border:none">
		<div class="card-head p-1 bg-dark text-white">
			<div class="clearfix">
				<div class="float-left">
					Detail User <i><?php echo $sh_data['id_user'];?></i>
				</div>
				<div class="float-right">
					<div class="text-right text-black">
					<a href="index.php?link=edit_user&key=<?php echo $sh_data['id_user'];?>" class="mr-1 btn btn-success p-0 pl-1 pr-1" style="width:65px">Edit</a>
					<a href="index.php?link=data_user" style="width:65px" class="mr-1 btn btn-warning p-0 pl-1 pr-1">Cancel</a>
					<a href="#" class="mr-1 btn btn-danger p-0 pl-1 pr-1" style="width:65px;" data-toggle="modal" data-target="#delete_modal" >Delete</a>
				</div>
			</div>
		</div>
	</div>

		<div class="card-body pt-0">
			
			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Nama Lengkap
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['nama'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Jabatan
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['jabatan'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Telepon
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['no_telepon'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Gender
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['gender'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Email
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['email'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Alamat
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['alamat'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Nik/ID Perner
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['nik_id_perner'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Status User
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['status_user'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Level User
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['level_user'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Username
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['username'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Create Date
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['create_date'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Create By
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['create_by'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Last Modify By
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					echo $sh_data['modify_by'];
					?>
				</div>
			</div>

			<div class="clearfix p-0">
				<div class="float-left p-0 m-0 col-3 text-right">
					Last Modify Date
				</div>
				<div class="float-left text-center m-0 col-1">
					:
				</div>
				<div class="float-left p-0 m-0 col-8">
					<?php
					if($sh_data['modify_date'] == "0000-00-00")
					{
						echo "";
					}
					else
					{
						$pisah = explode("-",$sh_data['modify_date']);
						$fix_tgl = $pisah[2]."-".$pisah[1]."-".$pisah[0];
						echo $fix_tgl;
					}
					?>
				</div>
			</div>
		</div>

		<div class="card-footer bg-dark">

		</div>
	</div>
</div>

<div class="modal" id="delete_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center bg-danger p-0">
				<h3 class="text-white text-center container">Warning !</h3>
			</div>
			<div class="modal-body text-center">
				<p class="mb-1">Peringatan user akan di hapus secara permanen,</p>
				<p class="mb-2">Apakah anda yakin ingin menghapus user ini ?</p>
				<form name="myForm" method="POST" action="index.php?link=detail_user&clue=deletes">
					<input type="text" name="key" value="<?php echo $sh_data['id_user'];?>">
					<input type="submit" name="button" value="Yes" class="btn btn-warning">
					<input type="button" name="button" value="No" class="btn btn-warning" data-dismiss="modal">
				</form>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>