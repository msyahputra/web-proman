<?php
if($_POST)
{
	include("modul/action/failover_act.php");
}

if(!empty($_GET['dt_proman']))
{
	$proman = $_GET['dt_proman'];

	$query_overhandle = mysqli_query($con,"select * from tb_overhandle_proman where id_project = '".$proman."'");
	$dt_proman = mysqli_fetch_array($query_overhandle);

	$rupiah = "Rp".number_format($dt_proman['nilai_project'],0,',','.');
}

?>

<div id="outer-overhandle">
	<div id="inner-overhandle" style="width:1028px; margin-top:20px; padding:0px; background-color: #ffffff; border:solid thin #000000;" class="container rounded">
		<div id="head-overhandle" class="clearfix" style="border-bottom:solid thin #000000">
			<div class="float-left col-3 text-center">
				<img src="image/web/Logo_Sva.png" width="200px" style="margin-top:30px">
			</div>
			<div class="float-left col-6 text-center">
				<p style="font-size:30px; font-weight: bold; margin:0; padding:0">FORM OVER HANDLE PROJECT</p>
				<p style="font-size:28px; font-weight: bold; margin:0; padding:0">MANAGE SERVICE / CPE</p>
				<p style="font-size:18px; font-weight: bold; margin:0; padding:0">Service Assurance Divisi Enterprise Service</p>
			</div>
			<div class="float-left col-3 text-center">
				<img src="image/web/logo_telkom.png" width="200px" height="100px">
			</div>
		</div>
		<div id="body-overhandle" style="text-align: justify; font-size:14px;" class="p-1">
			<p>Sehubungan dengan telah selesainya implementasi project di bawah ini, dan diperlukan penanganan untuk gangguan maupun peningkatan layanan purna jual.</p>
			<p>Dengan ini, kami lakukan penyerahan project kepada Unit Service Assurance detail data sebagai berikut :</p>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nama Project
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nama_project'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nilai Project
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $rupiah;
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nama CC
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nama_cc'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Order NCX/Ticares
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['order_ncx_ticares'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					SID
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['sid'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Segmen
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['segmen'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nomor KB/PKS
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nomor_kb_pks'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nama AM
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nama_am'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nomor Kontak AM
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nomor_kontak_am'];
					?>	
				</div>
			</div>
			<br>
			<p>Project manage service / CPE ini melibatkan mitra telkom dengan data sebagai berikut :</p>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nama Mitra
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nama_mitra'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					PIC Mitra
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['pic_mitra'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Nomor KL
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['nomor_kl'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Tanggal BAST
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['tanggal_bast'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					Layanan
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['layanan'];
					?>	
				</div>
			</div>
			<div class="clearfix">
				<div class="float-left col-3 text-left px-0">
					SLG
				</div>
				<div class="float-left text-left px-2">
					:
				</div>
				<div class="float-left col-8 text-left px-0">
					<?php
					echo $dt_proman['slg']." %";
					?>	
				</div>
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