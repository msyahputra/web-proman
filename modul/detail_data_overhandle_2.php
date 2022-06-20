<?php
if($_POST)
{
	include("modul/action/overhandle_act.php");
}

if(!empty($_GET['dt_proman']))
{
	$proman = $_GET['dt_proman'];

	$query_proman = mysqli_query($con,"select * from tb_overhandle_proman where id_project = '".$proman."'");
	$dt_proman = mysqli_fetch_array($query_proman);

	$transform_tgl_bast = explode("-",$dt_proman['tanggal_bast']);
	$tgl_bast_fix = $transform_tgl_bast[2]."-".$transform_tgl_bast[1]."-".$transform_tgl_bast[0];

	if(!empty($dt_proman['slg']) && $dt_proman['slg'] > 0)
	{
		$persen_mark = " %";
	}
	else
	{
		$persen_mark = "";
	}

	if(!empty($dt_proman['mttr_recovery']))
	{
		$jam_mark1 = " Jam";
	}
	else
	{
		$jam_mark1 = "";
	}

	if(!empty($dt_proman['mttr_respone']) && $dt_proman['mttr_respone'] > 0)
	{
		$jam_mark2 = " Jam";
	}
	else
	{
		$jam_mark2 = "";
	}

	if(!empty($dt_proman['nilai_project']))
	{
		$rupiah = "Rp ".number_format($dt_proman['nilai_project'],2,",",".");
	}
	else
	{
		$rupiah = "";
	}
}

?>

<div class="w-50 container clearfix">
	<div style="position:fixed;border: thin black;font-size:12px;width:350px;z-index:100;" class="alert bg-success bg-dark p-1 text-center float-right"> 
		<a href="index.php?link=form_overhandle&act_detail=Edit&key=<?php echo $dt_proman['id_project']?>" class="btn btn-success p-1" style="width:80px">Edit</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#update_modal" style="width:80px" style="width:100px">Note</a>
		<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#delete_modal" style="width:80px">Delete</a>
		<a href="index.php?link=data_overhandle" class="btn btn-warning p-1" style="width:80px">Back</a>
	</div>
</div>

<div class="card w-50 container p-0 border-dark" style="margin-top:50px;">

	<div class="card-head bg-dark text-white m-0">
		<div class="clearfix">
			<div class="float-left text-right pl-2 col-2">
				<b>Project : </b>
			</div>
			<div class="float-left text-left pr-2 col-8" style="">
				<?php
				echo $dt_proman['nama_project'];
				?>
			</div>
			<div class="float-right text-right col-2">
				<?php
				if(!empty($dt_proman['status_overhandle'])){
					switch($dt_proman['status_overhandle']){
						case 'On Progress':
							$color_st = '#00ff00';
							break;
						case 'Over Due':
							$color_st = '#ff4000';
							break;
						case 'Close':
							$color_st = '#ffffff';
							break;
						default:
							$color_st = '';
							break;
					}
					echo "<i class='fas fa-circle mr-1' style='color:".$color_st."''></i>";
					echo $dt_proman['status_overhandle'];
				}
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
					<div class="col-4 float-left p-0 m-0">Nama CC</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nama_cc'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Order NCX/Ticares</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['order_ncx_ticares'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">SID</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['sid'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Segmen</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['segmen'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Nomor KB/PKS</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nomor_kb_pks'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Nomor KL</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['nomor_kl'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Layanan</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['layanan'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">SLG</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['slg'].$persen_mark;?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Mttr Recovery</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['mttr_recovery'].$jam_mark1;?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-4 float-left p-0 m-0">Mttr Respone</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-7 p-0 m-0"><?php echo $dt_proman['mttr_respone'].$jam_mark2;?></div>
				</div>
			
			</div>

			<div class="float-right col-sm-6 p-0">
				
				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Nilai Project</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $rupiah;?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Pembayaran</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['metode_pembayaran'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Nama AM</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['nama_am']." ".$dt_proman['nomor_kontak_am'];?></div>
				</div>

				<div class="clearfix p-0">
					<div class="col-3 float-left p-0 m-0">Nama Mitra</div>
					<div class="col-1 float-left p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['nama_mitra'];?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-3 float-left p-0 m-0">PIC Mitra</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['pic_mitra']." ".$dt_proman['no_pic_mitra'];?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-sm-3 float-left p-0 m-0">Tanggal BAST</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $tgl_bast_fix;?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-sm-3 float-left p-0 m-0">Overhandle Oleh</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['pic_penyerah']." ".$dt_proman['nik_penyerah'];?></div>
				</div>

				<div class="clearfix p-0" style="">
					<div class="col-sm-3 float-left p-0 m-0">Diterima Oleh</div>
					<div class="float-left col-1 p-0 m-0">:</div>
					<div class="float-left col-8 p-0 m-0"><?php echo $dt_proman['pic_penerima']." ".$dt_proman['nik_penerima'];?></div>
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

		<div class="card" style="margin-top:10px;">
			<div class="card-head bg-success text-white p-1">
				Note :
			</div>
			<div class="card-body p-1" style="overflow-x: auto; height:150px; font-size:12px">
				<?php echo $dt_proman['note'];?>
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
    alert("Note harus di isi !, bila anda ingin batal klik X ");
    return false;
  }
} 
</script>
<div class="modal" id="update_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center bg-info p-0">
				<h3 class="text-white text-center container">Note</h3>
				<button type="button" class="close mr-1" data-dismiss="modal" style="">&times;</button>
			</div>
			<div class="modal-body">
				<form name="myForm" method="POST" action="index.php?link=detail_overhandle&act=Update" onsubmit="return validateForm()">
					<textarea name="update_note" rows="10" placeholder="Tambah Note" class="form form-control" id="update_note"></textarea>
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_project'];?>">
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
				<form name="myForm" method="POST" action="index.php?link=detail_overhandle&act=Delete">
					<input type="hidden" name="key" value="<?php echo $dt_proman['id_project'];?>">
					<input type="hidden" name="key_1" value="<?php echo $dt_proman['upload_size'];?>">
					<input type="hidden" name="key_2" value="<?php echo $dt_proman['upload_name'];?>">
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
						<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:10px">&times;</button>
					</div>
				</div>
			</div>
			<div class="modal-body p-0 m-0">
				<embed class="container" src="<?php echo $overhandle_path.$dt_proman['upload_name'];?>" width="1024px" height="600"></embed>
			</div>
			<div class="modal-footer bg-danger">

			</div>
		</div>
	</div>
</div>

<div class="mt-2 p-0 container w-50">
	<div class="card">
		<div class="card-header bg-dark text-white d-flex p-0">
			<div style="width:80%" class="p-1">
				Catatan Khusus
			</div>
			<div style="width:20%;" class="text-right p-1">
				<a href="#" class="btn btn-success p-1" data-toggle="modal" data-target="#catatan_khusus" style="">+More</a>
			</div>
		</div>

		<div class="card-body">
			<div id="accordion">
				<div class="card">
					<div class="card-header bg-danger">
						<a class="card-link text-white" data-toggle="collapse" href="#collapseOne">
							SDV
						</a>
					</div>
					<div id="collapseOne" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        <?php
						$query_ctt_sdv = mysqli_query($con,"select * from tb_note_ov where id_project = '".$dt_proman['id_project']."' and divisi = 'SDV' order by no asc");
						$cek_ctt_sdv = mysqli_num_rows($query_ctt_sdv);

						if($cek_ctt_sdv <= 0){
							echo "<p>Tidak ada catatan khusus!</p>";
						}else{
							echo "<ol style='font-size:12px'>";
							while($data_note_sdv = mysqli_fetch_array($query_ctt_sdv)){

								if($data_note_sdv['status'] > 0){
									$stat_sdv = 'On-Progress';
									$color_sdv = " text-danger ";
								}else{
									$stat_sdv = 'Solved';
									$color_sdv = " text-success ";
								}

								echo "<li class=''>";
								echo "<div class='d-flex mb-2' style='border-bottom:solid thin; padding-bottom:3px'>";
								echo "<div style='width:85%' class='m-0 p-0'>".$data_note_sdv['note']."</div>";
								echo "<span class='m-0 ".$color_sdv." text-center' style='width:12%'><i><b>".$stat_sdv."</b></i></span>";

								if($data_note_sdv['status'] > 0){
									echo "<form action='index.php?link=detail_overhandle&act=Update_Item_Catatan' method='POST'>";
									echo "<input type='submit' value='OK' class='ml-2'>";
									echo "<input type='hidden' name='id_note_ov' value='".$data_note_sdv['id_note_ov']."'>";
									echo "<input type='hidden' name='id_project' value='".$dt_proman['id_project']."'>";
									echo "</form>";
								}

								echo "</div>";
								echo "</li>";
							}
							echo "</ol>";
						}
						?>
				      </div>
				    </div>
				</div>

				<div class="card">
					<div class="card-header bg-danger">
						<a class="card-link text-white" data-toggle="collapse" href="#collapseBDM">
							BDM
						</a>
					</div>
					<div id="collapseBDM" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        <?php
						$query_ctt_bdm = mysqli_query($con,"select * from tb_note_ov where id_project = '".$dt_proman['id_project']."' and divisi = 'BDM' order by no asc");
						$cek_ctt_bdm = mysqli_num_rows($query_ctt_bdm);

						if($cek_ctt_bdm <= 0){
							echo "<p>Tidak ada catatan khusus!</p>";
						}else{
							echo "<ol style='font-size:12px'>";
							while($data_note_bdm = mysqli_fetch_array($query_ctt_bdm)){

								if($data_note_bdm['status'] > 0){
									$stat_bdm = 'On-Progress';
									$color_bdm = " text-danger ";
								}else{
									$stat_bdm = 'Solved';
									$color_bdm = " text-success ";
								}

								echo "<li class=''>";
								echo "<div class='d-flex mb-2' style='border-bottom:solid thin; padding-bottom:3px'>";
								echo "<div style='width:85%' class='m-0 p-0'>".$data_note_bdm['note']."</div>";
								echo "<span class='m-0 ".$color_bdm." text-center' style='width:12%'><i><b>".$stat_bdm."</b></i></span>";

								if($data_note_bdm['status'] > 0){
									echo "<form action='index.php?link=detail_overhandle&act=Update_Item_Catatan' method='POST'>";
									echo "<input type='submit' value='OK' class='ml-2'>";
									echo "<input type='hidden' name='id_note_ov' value='".$data_note_bdm['id_note_ov']."'>";
									echo "<input type='hidden' name='id_project' value='".$dt_proman['id_project']."'>";
									echo "</form>";
								}

								echo "</div>";
								echo "</li>";
							}
							echo "</ol>";
						}
						?>
				      </div>
				    </div>
				</div>

				<div class="card">
					<div class="card-header bg-danger">
						<a class="card-link text-white" data-toggle="collapse" href="#collapseSegmen">
							Segmen
						</a>
					</div>
					<div id="collapseSegmen" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        <?php
						$query_ctt_segmen = mysqli_query($con,"select * from tb_note_ov where id_project = '".$dt_proman['id_project']."' and divisi = 'Segmen' order by no asc");
						$cek_ctt_segmen = mysqli_num_rows($query_ctt_segmen);

						if($cek_ctt_segmen <= 0){
							echo "<p>Tidak ada catatan khusus!</p>";
						}else{
							echo "<ol style='font-size:12px'>";
							while($data_note_segmen = mysqli_fetch_array($query_ctt_segmen)){

								if($data_note_segmen['status'] > 0){
									$stat_segmen = 'On-Progress';
									$color_segmen = " text-danger ";
								}else{
									$stat_segmen = 'Solved';
									$color_segmen = " text-success ";
								}

								echo "<li class=''>";
								echo "<div class='d-flex mb-2' style='border-bottom:solid thin; padding-bottom:3px'>";
								echo "<div style='width:85%' class='m-0 p-0'>".$data_note_segmen['note']."</div>";
								echo "<span class='m-0 ".$color_segmen." text-center' style='width:12%'><i><b>".$stat_segmen."</b></i></span>";

								if($data_note_segmen['status'] > 0){
									echo "<form action='index.php?link=detail_overhandle&act=Update_Item_Catatan' method='POST'>";
									echo "<input type='submit' value='OK' class='ml-2'>";
									echo "<input type='hidden' name='id_note_ov' value='".$data_note_segmen['id_note_ov']."'>";
									echo "<input type='hidden' name='id_project' value='".$dt_proman['id_project']."'>";
									echo "</form>";
								}

								echo "</div>";
								echo "</li>";
							}
							echo "</ol>";
						}
						?>
				      </div>
				    </div>
				</div>

				<div class="card">
					<div class="card-header bg-danger">
						<a class="card-link text-white" data-toggle="collapse" href="#collapseMitra">
							Mitra
						</a>
					</div>
					<div id="collapseMitra" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        <?php
						$query_ctt_mitra = mysqli_query($con,"select * from tb_note_ov where id_project = '".$dt_proman['id_project']."' and divisi = 'Mitra' order by no asc");
						$cek_ctt_mitra = mysqli_num_rows($query_ctt_mitra);

						if($cek_ctt_mitra <= 0){
							echo "<p>Tidak ada catatan khusus!</p>";
						}else{
							echo "<ol style='font-size:12px'>";
							while($data_note_mitra = mysqli_fetch_array($query_ctt_mitra)){

								if($data_note_mitra['status'] > 0){
									$stat_mitra = 'On-Progress';
									$color_mitra = " text-danger ";
								}else{
									$stat_mitra = 'Solved';
									$color_mitra = " text-success ";
								}

								echo "<li class=''>";
								echo "<div class='d-flex mb-2' style='border-bottom:solid thin; padding-bottom:3px'>";
								echo "<div style='width:85%' class='m-0 p-0'>".$data_note_mitra['note']."</div>";
								echo "<span class='m-0 ".$color_mitra." text-center' style='width:12%'><i><b>".$stat_mitra."</b></i></span>";

								if($data_note_mitra['status'] > 0){
									echo "<form action='index.php?link=detail_overhandle&act=Update_Item_Catatan' method='POST'>";
									echo "<input type='submit' value='OK' class='ml-2'>";
									echo "<input type='hidden' name='id_note_ov' value='".$data_note_mitra['id_note_ov']."'>";
									echo "<input type='hidden' name='id_project' value='".$dt_proman['id_project']."'>";
									echo "</form>";
								}

								echo "</div>";
								echo "</li>";
							}
							echo "</ol>";
						}
						?>
				      </div>
				    </div>
				</div>
			</div>
		</div>

		<div class="card-footer bg-dark">

		</div>
	</div>
</div>



<script type="text/javascript">
	function validateForm2() {
  var y = document.forms["theForm"]["update_catatan"].value;
  var z = document.forms["theForm"]["sel1"].value;
  if (y == "" || z == "") {
    alert("Divisi & catatan tidak boleh kosong !");
    return false;
  }
} 
</script>

<div class="modal p-0 container" id="catatan_khusus" style="width:1100px;margin-top:100px;margin-bottom:10px">
	<div class="modal-dialog m-0 p-0" style="width:1100px;">
		<div class="modal-content m-0 p-0" style="width:1100px;">
			<div class="modal-head text-center bg-danger text-white p-0">
				<div class="clearfix p-0">
					<div class="float-left pl-3">
						<h4>Masukan Catatan Khusus</h4>
					</div>
					<div class="float-right p-0 text-right">
						<button type="button" class="mr-1 btn btn-danger" data-dismiss="modal" style="">&times;</button>
					</div>
				</div>
			</div>
			<div class="modal-body p-2 m-0">
				<form name="theForm" method="POST" action="index.php?link=detail_overhandle&act=Update_Catatan"  onsubmit="return validateForm2()">
					<div class="d-flex">
						<div class="p-2 mr-2">
							Divisi :
						</div>
						<select name="divisi" class="form-control mb-1 w-50" id="sel1" style="border:solid thin black">
							<option value=""></option>
							<option value="SDV">SDV</option>
							<option value="BDM">BDM</option>
							<option value="Segmen">Segmen</option>
							<option value="Mitra">Mitra</option>
						</select>
					</div>
					<div>
						<textarea name="catatan" class="form-control" style="border:solid black thin" placeholder="Catatan disini" id="update_catatan" cols="" rows="10"></textarea>
					</div>
					<input type="submit" value="Submit">
					<input type="hidden" name="id_project" value="<?php echo $dt_proman['id_project'];?>">
				</form>
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

 $(document).ready(function() {
  $('#update_').summernote({
  height: 200,                 
  minHeight: null,            
  maxHeight: null,             
  focus: true
});
});
</script>