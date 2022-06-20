<?php
if($_POST)
{
	include("modul/action/failover_act.php");
}

if(!empty($_GET['dt_proman']))
{
	$proman = $_GET['dt_proman'];

	$query_failover = mysqli_query($con,"select * from tb_failover_proman where id_failover = '".$proman."'");
	$dt_proman = mysqli_fetch_array($query_failover);

	$transform_tgl_failover = explode("-",$dt_proman['tgl_failover']);
	$tgl_failover_fix = $transform_tgl_failover[2]."-".$transform_tgl_failover[1]."-".$transform_tgl_failover[0];

	$transform_tgl_rollback = explode("-",$dt_proman['tgl_rollback']);
	$tgl_rollback_fix = $transform_tgl_rollback[2]."-".$transform_tgl_rollback[1]."-".$transform_tgl_rollback[0];

	$transform_create_date = explode("-",$dt_proman['create_date']);
	$tgl_create_date = $transform_create_date[2]."-".$transform_create_date[1]."-".$transform_create_date[0];
}

?>

<div class="w-50 container clearfix">
	<div style="position:fixed;border: thin black;font-size:12px;width:350px;z-index:100;" class="alert bg-success bg-dark p-1 text-center float-right"> 
	
		<?php
		if($_SESSION['level_pro'] <= 2)
		{
		?>
		<a href="index.php?link=form_failover&act_detail=Edit&key=<?php echo $dt_proman['id_failover']?>" class="btn btn-success p-1" style="width:80px">Edit</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#update_modal" style="width:80px" style="width:100px">Update</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>
		<?php
		}
		?>
		
		<a href="index.php?link=data_failover" class="btn btn-warning p-1" style="width:80px">Back</a>
	</div>
</div>

<div class="card w-50 container p-0 border-dark" style="margin-top:50px;">

	<div class="card-head bg-dark text-white m-0">
		<div class="clearfix">
			<div class="float-left text-left pl-2">
				<?php
				echo "<b>Customer : </b>".$dt_proman['nama_customer']." / ".$dt_proman['create_by'];
				?>
			</div>
			<div class="float-right text-right pr-2">
				<?php
				echo "<b>Tanggal Input : </b>".$tgl_create_date;
				?>
			</div>
		</div>
	</div>

	<div class="card-body" style="font-size:12px">

		<div class="clearfix">

			<div class="float-left col-sm-6 p-0">

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Service ID</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['sid'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Layanan</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['layanan'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Bandwidth</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['bandwidth'];?> Kbps</div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Routing Type</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['routing_type'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Nama STO</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nama_sto'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Segmen</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['segmen'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Router PE</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['pe'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Interface</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['interface'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Metro End 1</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['me_end1'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Metro End 2</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['me_end2'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Akses</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['akses'];?></div>
				</div>
			
			</div>

			<div class="float-right col-sm-6 p-0">
				
				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Tanggal Failover</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $tgl_failover_fix;?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Tanggal Rollback</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $tgl_rollback_fix;?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Status Failover</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['status_failover'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Type Link</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['type_link'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Document</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0">
						<?php 
						if(!empty($dt_proman['size_doc']) && $dt_proman['size_doc'] > 0)
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

		<div class="card" style="margin-top:10px;">
			<div class="card-head bg-success p-1 text-white">
				Deskripsi Link
			</div>
			<div class="card-body" style="overflow-y:auto">
				<?php echo $dt_proman['deskripsi_link'];?>
			</div>
		</div>

		<div class="card" style="margin-top:10px">
			<div class="card-head bg-info text-white p-1">
				Update Progress
			</div>
			<div class="card-body" style="">

				<?php
				$query_update = mysqli_query($con,"select * from tb_update_failover where id_failover = '".$dt_proman['id_failover']."' order by no desc");
				$cek_data_update = mysqli_num_rows($query_update);

				if($cek_data_update <= 0)
				{
					echo "Belum ada update progress !";
				}
				else
				{
					while($sh_update = mysqli_fetch_array($query_update))
					{
						$td = explode("-",$sh_update['update_date']);
						$td_real = $td[2]."-".$td[1]."-".$td[0];
						echo "<div class='card mt-2'>";
						echo "<div class='card-head bg-dark text-white p-1'>";
						echo "<div class='clearfix p-0 m-0'>";
						echo "<div class='float-left col-6 text-left'>Tanggal Update : ".$td_real." ".$sh_update['update_time']."</div>";
						echo "<div class='float-left col-6 text-right'>Update By : ".$sh_update['update_by']."</div>";
						echo "</div>";
						echo "</div>";
						echo "<div class='card-body p-1'>".$sh_update['update_info']."</div>";
						echo "</div>";
					}
				}
				?>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function validateForm() {
  var x = document.forms["myForm"]["update_info"].value;
  if (x == "") {
    alert("Kolom update tidak boleh kosong !");
    return false;
  }
} 
</script>
<div class="modal" id="update_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center bg-info p-0">
				<h3 class="text-white text-center container">Form Update</h3>
				<button type="button" class="close mr-1" data-dismiss="modal" style="">&times;</button>
			</div>
			<div class="modal-body">
				<form name="myForm" method="POST" action="index.php?link=detail_failover&act=Update" onsubmit="return validateForm()">
					<textarea name="update_info" rows="10" placeholder="Update Progress" class="form form-control" id="update_info"></textarea>
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_failover'];?>">
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
				<form name="myForm" method="POST" action="index.php?link=detail_failover&act=Delete">
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_failover'];?>">
					<input type="hidden" name="nama_doc" value="<?php echo $dt_proman['nama_doc'];?>">
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
				<?php
				if(!empty($dt_proman['nama_doc']))
				{
					$embed_file = $failover_path.$dt_proman['nama_doc'];
				?>
					<embed class="container" src="<?php echo $embed_file;?>" width="1024px" height="600"></embed>
				<?php
				}
				?>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  $('#update_info').summernote({
  height: 200,                 
  minHeight: null,            
  maxHeight: null,             
  focus: true
});
});
</script>