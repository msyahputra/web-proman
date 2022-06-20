<script src="datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css" >
<script type="text/javascript">
    $(document).ready(function () 
				{
                	$('#tgl_failover_start').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });

    $(document).ready(function () 
				{
                	$('#tgl_failover_end').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });
</script>

<?php
if(!empty($_GET['search']) && $_GET['search'] == "yes")
{

$tgl_cari_1 = $_GET['tgl_failover_starts'];
$tgl_cari_2 = $_GET['tgl_failover_ends'];
$cari_status = $_GET['status_failovers'];
$search = $_GET['search'];

	if(!empty($_GET['tgl_failover_starts']) && !empty($_GET['tgl_failover_starts']))
	{
		$t1 = explode("-",$_GET['tgl_failover_starts']);
		$failover_awal = $t1[2]."-".$t1[1]."-".$t1[0];
		
		$t2 = explode("-",$_GET['tgl_failover_ends']);
		$failover_akhir = $t2[2]."-".$t2[1]."-".$t2[0];
		
		$search_tgl = "tgl_failover between '".$failover_awal."' AND '".$failover_akhir."' ";
	}
	else
	{
		$search_tgl = "";
	}
	
	if(!empty($_GET['status_failovers']))
	{
		$failover_status = $_GET['status_failovers'];
		
		$search_status = "status_failover = '".$failover_status."' ";
	}
	else
	{
		$search_status = "";
	}
	
	if(empty($search_status) && empty($search_tgl))
	{
		$search_full = " ";
	}
	else
	{
		if(!empty($search_status) && !empty($search_tgl))
		{
			$dan = " AND ";
		}
		else
		{
			$dan = "";
		}
		
		$search_full = " where ".$search_status.$dan.$search_tgl." ";
	}
}
else
{
	$tgl_cari_1 = "";
	$tgl_cari_2 = "";
	$cari_status = "";
	$search = "";
	$search_full = " ";
}
?>

<div style="" class="text-center text-white">
	<form action="index.php?link=rekap_data_failover" method="GET" name="failover_search" class="">
		<input type="hidden" name="link" value="rekap_data_failover">
		<input type="hidden" name="search" value="yes"> 
		<div class="clearfix container rounded p-2 bg-dark" style="width:800px">

			<select name="status_failovers" class="form-control float-left" id="sel1" style="width:150px; font-size:12px">
				<option value="">By Failover Status</option>
				<option value="Succeed" <?php if(!empty($failover_status) && $failover_status == "Succeed"){ echo "selected";}?>>Succeed</option>
				<option value="Failed" <?php if(!empty($failover_status)  && $failover_status == "Failed"){ echo "selected";}?>>Failed</option>
				<option value="Pending" <?php if(!empty($failover_status) && $failover_status == "Pending"){ echo "selected";}?>>Pending</option>
				<option value="Monitoring" <?php if(!empty($failover_status) && $failover_status == "Monitoring"){ echo "selected";}?>>Monitoring</option>
			</select>

			<div class="float-left p-2">By Tanggal Failover : </div>

			<input type="text" name="tgl_failover_starts" id="tgl_failover_start" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php echo !empty($tgl_cari_1) ? $tgl_cari_1 : "";?>">

			<div class="float-left p-2">-</div>

			<input type="text" name="tgl_failover_ends" id="tgl_failover_end" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php echo !empty($tgl_cari_2) ? $tgl_cari_2 : "";?>">

			<input type="submit" name="submit" value="Search" class="btn btn-danger float-left" style="margin-left:5px">
			<a href="to_excel_failover.php?search_clue=<?php echo $search_full;?>">
				<input type="button" name="Excel" value="Excel" class="btn btn-danger float-left" style="margin-left:5px">
			</a>
		</div>
	</form>
</div>

<table style="font-size:10px; width:97%; margin:0px auto 10px auto" class="table table-striped table-bordered">
	<thead class="text-center bg-dark text-white">
		<th>No</th>
		<th>Nama Customer</th>
		<th>SID</th>
		<th>Layanan</th>
		<th>Type Link</th>
		<th>Bandwidth</th>
		<th>PE</th>
		<th>Interface</th>
		<th>ME End 1</th>
		<th>ME End 2</th>
		<th>Tanggal Failover</th>
		<th>Tanggal Rollback</th>
		<th>Status Failover</th>
	</thead>

	<tbody style="background-color:#ffffff;">

		<?php
		if(empty($_GET['noPage']))
				{
					$noPage = "1";
				}
			else
				{
					$noPage = $_GET['noPage'];
				}
			
			$dataPerPage = "15";
			
			$offset = ($noPage - 1) * $dataPerPage;

			$rekap_failoverdb = mysqli_query($con, "select * from tb_failover_proman ".$search_full." order by no desc limit ".$offset.",".$dataPerPage."");
			$cek_failoverdb = mysqli_num_rows($rekap_failoverdb);

			if($cek_failoverdb <= 0)
			{
				echo "<tr>";
				echo "<td colspan='13' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = $offset + 1;

				while($sh_failoverdb = mysqli_fetch_array($rekap_failoverdb))
				{
					echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$sh_failoverdb['nama_customer']."</td>";
					echo "<td>".$sh_failoverdb['sid']."</td>";
					echo "<td>".$sh_failoverdb['layanan']."</td>";
					echo "<td>".$sh_failoverdb['type_link']."</td>";
					echo "<td>".$sh_failoverdb['bandwidth']."</td>";
					echo "<td>".$sh_failoverdb['pe']."</td>";
					echo "<td>".$sh_failoverdb['interface']."</td>";
					echo "<td>".$sh_failoverdb['me_end1']."</td>";
					echo "<td>".$sh_failoverdb['me_end2']."</td>";
					echo "<td>".$sh_failoverdb['tgl_failover']."</td>";
					echo "<td>".$sh_failoverdb['tgl_rollback']."</td>";
					echo "<td>".$sh_failoverdb['status_failover']."</td>";
					echo "</tr>";
					$no++;
				}
			}

			?>

	</tbody>
</table>

<div id="paging-cover" class="container text-center">
		<?php
			$jum_dt_failover = mysqli_query($con,"select count(*) as jumData from tb_failover_proman ".$search_full."");
			$show_jum = mysqli_fetch_array($jum_dt_failover);
			$jumData = $show_jum['jumData'];
			
			$jumPage = ceil($jumData/$dataPerPage);
			
			if($noPage > 1)
				{
					echo "<a href='index.php?status_failovers=".$cari_status."&tgl_failover_starts=".$tgl_cari_1."&tgl_failover_ends=".$tgl_cari_2."&search=".$search."&link=rekap_data_failover&noPage=".($noPage-1)."'><label id='halaman' class='btn'>&lt;&lt;</label></a>";
				}
					
			for($page=1;$page<=$jumPage;$page++)
				{	
					if(($page >= ($noPage-3)) && ($page <= ($noPage+3)) || ($page == "1") || ($page == $jumPage))
						{
								if(($showPage == 1) && ($page != 2))
									{
										echo "...";
									}
								if(($showPage != ($jumPage - 1)) && ($page == $jumPage))
									{
										echo "...";
									}
								if($page == $noPage)
									{
										echo "<label id='halamanActive' class='rounded btn'><b>".$page."</d></label>";
									}
								else
									{
										echo "<a href='index.php?status_failovers=".$cari_status."&tgl_failover_starts=".$tgl_cari_1."&tgl_failover_ends=".$tgl_cari_1."&search=".$search."&link=rekap_data_failover&noPage=".$page."' class=''><label id='halaman' class='btn'>".$page."</label></a>";
									}
									
									$showPage = $page;	
						}
				}
			
			if($noPage < $jumPage)
				{
					echo "<a href='index.php?status_failovers=".$cari_status."&tgl_failover_starts=".$tgl_cari_1."&tgl_failover_ends=".$tgl_cari_1."&search=".$search."&link=rekap_data_failover&noPage=".($noPage+1)."'><label id='halaman' class='btn'>&gt;&gt;</label></a>";
				}
		?>
</div>