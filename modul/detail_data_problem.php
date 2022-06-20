<?php
if($_POST)
{
	include("modul/action/update_progress_act.php");
}

if(!empty($_GET['dt_proman']))
{
	$proman = $_GET['dt_proman'];

	$query_proman = mysqli_query($con,"select * from tb_proman where ID_PROBLEM = '".$proman."'");
	$dt_proman = mysqli_fetch_array($query_proman);

	$transform_tgl_permintaan = explode("-",$dt_proman['TANGGAL_PERMINTAAN']);
	$tgl_permin_fix = $transform_tgl_permintaan[2]."-".$transform_tgl_permintaan[1]."-".$transform_tgl_permintaan[0];
}

?>

<div class="w-50 container clearfix">
	<div style="position:fixed;border: thin black;font-size:12px;width:350px;z-index:100;" class="alert bg-success bg-dark p-1 text-center float-right"> 
		<a href="index.php?petunjuk=<?php echo $petunjuk;?>&link=form_data_problem&act_detail=Edit&key=<?php echo $dt_proman['ID_PROBLEM']?>" class="btn btn-success p-1" style="width:80px">Edit</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#update_modal" style="width:80px" style="width:100px">Update</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>
		<a href="index.php?petunjuk=<?php echo $petunjuk;?>&link=data_problem" class="btn btn-warning p-1" style="width:80px">Back</a>
	</div>
</div>

<div class="card w-50 container p-0 border-dark" style="margin-top:50px;">

	<div class="card-head bg-dark text-white m-0">
		<div class="clearfix">
			<div class="float-left text-left pl-2 col-8" style="font-size:14px">
				<?php
				echo "<b>Customer : </b>".$dt_proman['CORPORATE_CUSTOMER']." / ".$dt_proman['USERNAME'];
				?>
			</div>
			<div class="float-right text-right pr-2 col-4" style="font-size:14px">
				<?php
				echo "<b>Tanggal Permintaan : </b>".$tgl_permin_fix;
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
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['SERVICE_ID'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Layanan</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['LAYANAN'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">History Ticket</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['HISTORY_TICKET'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Segment</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['SEGMEN'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Regional</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['REGIONAL'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Witel</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['WITEL'];?></div>
				</div>
			
			</div>

			<div class="float-right col-sm-6 p-0">
				
				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Nodin</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0">
						<?php 
						if(empty($dt_proman['NODIN']))
						{
							echo " -";
						}
						else
						{
							echo $dt_proman['NODIN'];
						}
						?>
							
						</div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Order</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0">
						<?php 
						if(empty($dt_proman['ORDERS']))
						{
							echo " -";
						}
						else
						{
							echo $dt_proman['ORDERS'];
						}
						?>		
					</div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Request By</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['REQUEST_BY'];?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-3 float-left p-0 m-0">Lokasi</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['LOKASI'];?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-sm-3 float-left p-0 m-0">Status</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><b><?php echo $dt_proman['STATUS'];?></b></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Document</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0">
						<?php
						if(!empty($dt_proman['DOC_SIZE']) && $dt_proman['DOC_SIZE'] > 0)
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
			<div class="card-head bg-success text-white p-1">
				Detail Permintaan :
			</div>
			<div class="card-body p-1" style="overflow-x: auto; height:300px; font-size:12px">
				<?php echo $dt_proman['DETAIL_PERMINTAAN'];?>
			</div>
		</div>

		<div class="card" style="margin-top:10px">
			<div class="card-head bg-info text-white p-1">
				Update Progress
			</div>
			<div class="card-body" style="">

				<?php
				$query_update = mysqli_query($con,"select up.*, u.nama, u.jabatan from tb_update_proman as up inner join tb_user_proman as u on up.USERNAME = u.username where ID_PROBLEM = '".$dt_proman['ID_PROBLEM']."' order by NO desc");
				$cek_data_update = mysqli_num_rows($query_update);

				if($cek_data_update <= 0)
				{
					echo "Belum ada update progress !";
				}
				else
				{
					while($sh_update = mysqli_fetch_array($query_update))
					{
						$td = explode("-",$sh_update['UPDATE_DATE']);
						$td_real = $td[2]."-".$td[1]."-".$td[0];
						echo "<div class='card mt-2'>";
						echo "<div class='card-head bg-dark text-white p-1'>";
						echo "<div class='clearfix p-0 m-0'>";
						echo "<div class='float-left col-6 text-left'>Tanggal Update : ".$td_real." ".$sh_update['JAM']."</div>";
						echo "<div class='float-left col-6 text-right' title ='".$sh_update['nama']."-".$sh_update['jabatan']."' style='cursor:pointer'>Update By : ".$sh_update['USERNAME']."</div>";
						echo "</div>";
						echo "</div>";
						echo "<div class='card-body p-1'>".$sh_update['UPDATE_INFO']."</div>";
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
  var x = document.forms["myForm"]["update_progress"].value;
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
				<form name="myForm" method="POST" action="index.php?petunjuk=<?php echo $petunjuk;?>&link=detail_problem&act=input_file" onsubmit="return validateForm()">
					<textarea name="update_progress" rows="10" placeholder="Update Progress" class="form form-control" id="update_info"></textarea>
					<input type="hidden" name="key" value="<?php echo $dt_proman['ID_PROBLEM'];?>">
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
				<form name="myForm" method="POST" action="index.php?link=detail_problem&act=delete_file">
					<input type="hidden" name="key" value="<?php echo $dt_proman['ID_PROBLEM'];?>">
					<input type="hidden" name="key_1" value="<?php echo $dt_proman['DOC_SIZE'];?>">
					<input type="hidden" name="key_2" value="<?php echo $dt_proman['DOC_NAME'];?>">
					<input type="submit" name="button" value="Yes" class="btn btn-warning">
					<input type="button" name="button" value="No" class="btn btn-warning" data-dismiss="modal">
				</form>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>

<div class="modal p-0 container" id="file_modal" style="width:800px;margin-top:100px;margin-bottom:10px">
	<div class="modal-dialog m-0 p-0" style="width:800px;">
		<div class="modal-content m-0 p-0" style="width:800px;">
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
				<embed class="container" src="<?php echo $problem_path.$dt_proman['DOC_NAME'];?>" width="600px" height="600"></embed>
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