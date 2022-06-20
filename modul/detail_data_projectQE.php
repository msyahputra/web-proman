<?php
$line = "<span style='font-size:20px;font-weight:bold'>-</span>";
if($_POST)
{
	include("modul/action/project_qe_act.php");
}

if(!empty($_GET['dt_proman']))
{
	$proman = $_GET['dt_proman'];

	$query_proman = mysqli_query($con,"select * from tb_project_qe where id_projectQE = '".$proman."'");
	$dt_proman = mysqli_fetch_array($query_proman);

	$transform_tgl_input = explode("-",$dt_proman['tgl_input']);
	$tgl_input_fix = $transform_tgl_input[2]."-".$transform_tgl_input[1]."-".$transform_tgl_input[0];
}

?>

<div class="w-50 container clearfix">
	<div style="position:fixed;border: thin black;font-size:12px;width:350px;z-index:100;" class="alert bg-success bg-dark p-1 text-center float-right"> 
	
		<?php
		if($_SESSION['level_pro'] <= 2)
		{
		?>
		<a href="index.php?link=form_projectQE&act_detail=Edit&key=<?php echo $dt_proman['id_projectQE']?>" class="btn btn-success p-1" style="width:80px">Edit</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#update_modal" style="width:80px" style="width:100px">Update</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>
		<?php
		}
		?>
		
		
		<a href="index.php?link=data_projectQE" class="btn btn-warning p-1" style="width:80px">Back</a>
	</div>
</div>

<div class="card w-50 container p-0 border-dark" style="margin-top:50px;">

	<div class="card-head bg-dark text-white m-0">
		<div class="clearfix">
			<div class="float-left text-left pl-2 col-6">
				<?php
				echo $dt_proman['id_projectQE'];
				?>
			</div>
			<div class="float-left text-right pr-2 col-6" style="">
				<?php
				echo $dt_proman['input_by']." / ".$tgl_input_fix;
				?>
			</div>
		</div>
	</div>

	<div class="card-body" style="font-size:12px">

		<div class="clearfix">

			<div class="float-left col-sm-6 p-0">

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Corporate Account</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['corporate_account'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Nama Corporate</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nama_corporate'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">SID</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['sid'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Layanan</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['layanan'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Alamat Lokasi</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['alamat'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Nama AM</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nama_am'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Kontak AM</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['kontak_am'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Email AM</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['email_am'];?></div>
				</div>
			
			</div>

			<div class="float-right col-sm-6 p-0">
				
				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Nama EOS</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['nama_eos'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Kontak EOS</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['kontak_eos'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Email EOS</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['email_eos'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Document</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0">
						<?php
						if(!empty($dt_proman['upload_size']) && $dt_proman['upload_size'] > 0)
						{
							echo "<p class='btn btn-success p-1' style='font-size:9px'  data-toggle='modal' data-target='#file_modal'>Available</p>";
						}
						else
						{
							echo "<i>Not Available</i>";
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-2" style="margin-top:10px;">
			<div class="card-head bg-success text-white p-1">
				Detail Permintaan :
			</div>
			<div class="card-body p-1" style="overflow-x: auto; height:150px; font-size:12px">
				<?php echo $dt_proman['detail_permintaan'];?>
			</div>
		</div>

		<div id="topologi">
			<div class="card mb-2">
				<div class="card-head text-white p-1 bg-secondary" style="background-color:">
					<div class="clearfix">
						<div class="float-left">
							Topologi Eksisting
						</div>
						<div class="float-right">
							<?php
							$query_topoeks = mysqli_query($con,"select * from tb_topologi where id_topologi = '".$dt_proman['id_topologi_eksisting']."'");
							$cek_topoeks = mysqli_num_rows($query_topoeks);
							$topoeks_data = mysqli_fetch_array($query_topoeks);
							if($cek_topoeks <= 0)
							{
								echo "<a id='topo_btn' class='btn btn-danger' href='index.php?link=form_topologiQE&project_qe=".$dt_proman['id_projectQE']."&act=Input&kategori=eksisting'>";
								echo "Add";
								echo "</a>";
							}
							else
							{
								echo "<a id='topo_btn' class='btn btn-danger' href='index.php?link=form_topologiQE&project_qe=".$dt_proman['id_projectQE']."&act=Edit&kategori=eksisting&id_topologi=".$dt_proman['id_topologi_eksisting']."'>";
								echo "Edit";
								echo "</a>";
							}
							?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php
					if($cek_topoeks <= 0)
					{
						echo "Data topology eksisting tidak teredia !";
					}
					else
					{
						echo $topoeks_data['router_pe'].$line.$topoeks_data['interface_pe'].".".$topoeks_data['vlan'].$line.$topoeks_data['vlan'].":".$topoeks_data['port_metro_1'].$line.$topoeks_data['node_metro_1'].$line.$topoeks_data['vcid'].$line.$topoeks_data['node_metro_2'].$line.$topoeks_data['port_metro_2'].":".$topoeks_data['vlan'].$line.$topoeks_data['akses'];
					}
					?>
				</div>
			</div>

			<div class="card">
				<div class="card-head text-white p-1" style="background-color:#cc9900">
					<div class="clearfix">
						<div class="float-left">
							Topologi Baru
						</div>
						<div class="float-right">
							<?php
							$query_topobar = mysqli_query($con,"select * from tb_topologi where id_topologi = '".$dt_proman['id_topologi_baru']."'");
							$cek_topobar = mysqli_num_rows($query_topobar);
							$topobar_data = mysqli_fetch_array($query_topobar);
							if($cek_topobar <= 0)
							{
								echo "<a id='topo_btn' class='btn btn-danger' href='index.php?link=form_topologiQE&project_qe=".$dt_proman['id_projectQE']."&act=Input&kategori=baru'>";
								echo "Add";
								echo "</a>";
							}
							else
							{
								echo "<a id='topo_btn' class='btn btn-danger' href='index.php?link=form_topologiQE&project_qe=".$dt_proman['id_projectQE']."&act=Edit&kategori=baru&id_topologi=".$dt_proman['id_topologi_baru']."'>";
								echo "Edit";
								echo "</a>";
							}
							?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php
					if($cek_topobar <= 0)
					{
						echo "Data topology baru tidak tersedia !";
					}
					else
					{
						echo $topobar_data['router_pe'].$line.$topobar_data['interface_pe'].".".$topobar_data['vlan'].$line.$topobar_data['vlan'].":".$topobar_data['port_metro_1'].$line.$topobar_data['node_metro_1'].$line.$topobar_data['vcid'].$line.$topobar_data['node_metro_2'].$line.$topobar_data['port_metro_2'].":".$topobar_data['vlan'].$line.$topobar_data['akses'];
					}
					?>
				</div>
			</div>
		</div>

		<div class="card" style="margin-top:10px">
			<div class="card-head bg-info text-white p-1">
				Update Progress
			</div>
			<div class="card-body" style="">

				<?php
				$query_update_info = mysqli_query($con,"select * from tb_update_projectqe where id_projectqe = '".$dt_proman['id_projectQE']."' order by tanggal_update desc");
				$cek_data_update = mysqli_num_rows($query_update_info);

				if($cek_data_update <= 0)
				{
					echo "Belum ada update progress !";
				}
				else
				{
					while($sh_update = mysqli_fetch_array($query_update_info))
					{
						$td = explode("-",$sh_update['tanggal_update']);
						$td_real = $td[2]."-".$td[1]."-".$td[0];
						echo "<div class='card mt-2'>";
						echo "<div class='card-head bg-dark text-white p-1'>";
						echo "<div class='clearfix p-0 m-0'>";
						echo "<div class='float-left col-6 text-left'>".$td_real." ".$sh_update['jam_update']."</div>";
						echo "<div class='float-left col-6 text-right'>Update By : ".$sh_update['username']."</div>";
						echo "</div>";
						echo "</div>";
						echo "<div class='card-body p-1'>".$sh_update['info_update']."</div>";
						echo "</div>";
					}
				}
				?>

			</div>
		</div>

	</div>
	<div class="card-footer bg-dark">
	</div>
</div>


<script type="text/javascript">
	function validateForm() {
  var x = document.forms["myForm"]["update_note"].value;
  if (x == "") {
    alert("Update tidak boleh kosong!");
    return false;
  }
} 
</script>
<div class="modal" id="update_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center bg-info p-0">
				<h3 class="text-white text-center container">Update Info</h3>
				<button type="button" class="close mr-1" data-dismiss="modal" style="">&times;</button>
			</div>
			<div class="modal-body">
				<form name="myForm" method="POST" action="index.php?link=detail_projectQE&act=Update" onsubmit="return validateForm()">
					<textarea name="update_info" rows="10" placeholder="Update Info" class="form form-control" id="update_note"></textarea>
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_projectQE'];?>">
					<input type="submit" name="submit" value="Submit" class="btn btn-info mt-2">
				</form>
			</div>
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
				<p class="mb-1">Peringatan data akan di hapus secara permanen,</p>
				<p class="mb-2">Apakah anda yakin ingin menghapus data ini ?</p>
				<form name="myForm" method="POST" action="index.php?link=detail_projectQE&act=Delete">
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_projectQE'];?>">
					<input type="hidden" name="key_1" value="<?php echo $dt_proman['upload_size'];?>">
					<input type="hidden" name="key_2" value="<?php echo $dt_proman['upload_name'];?>">
					<input type="hidden" name="id_topologi_eks" value="<?php echo $dt_proman['id_topologi_eksisting'];?>">
					<input type="hidden" name="id_topologi_bar" value="<?php echo $dt_proman['id_topologi_baru'];?>">
					<input type="submit" name="button" value="Yes" class="btn btn-warning">
					<input type="button" name="button" value="No" class="btn btn-warning" data-dismiss="modal">
				</form>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>

<div class="modal p-0 container" id="file_modal" style="width:1100px;margin-top:100px;margin-bottom:10px">
	<div class="modal-dialog m-0 p-0" style="width:1100px;">
		<div class="modal-content m-0 p-0" style="width:1100px;">
			<div class="modal-head text-center bg-danger text-white p-0">
				<div class="clearfix p-0">
					<div class="float-left pl-3">
						<h4>Lampiran Document</h4>
					</div>
					<div class="float-right p-0 text-right">
						<button type="button" class="mr-1 btn btn-danger" data-dismiss="modal" style="">&times;</button>
					</div>
				</div>
			</div>
			<div class="modal-body p-0 m-0">
				<embed class="container" src="<?php echo $projectQE_path.$dt_proman['upload_name'];?>" width="1024px" height="600"></embed>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  $('#update_note').summernote({
  height: 200,                 
  minHeight: null,            
  maxHeight: null,             
  focus: true
});
});
</script>