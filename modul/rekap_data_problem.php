<script src="datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css" >
<script type="text/javascript">
    $(document).ready(function () 
				{
                	$('#tgl_permintaan_start').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });

    $(document).ready(function ()
				{
                	$('#tgl_permintaan_end').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });
</script>

<?php
if(!empty($_GET['search']))
{
	$key_words = $_GET['key_words'];
	$tgl_permintaan_starts = $_GET['tgl_permintaan_starts'];
	$tgl_permintaan_ends = $_GET['tgl_permintaan_ends'];

	if(!empty($key_words))
	{
		$search01 = " CORPORATE_CUSTOMER LIKE '%".$key_words."%'";
	}
	else
	{
		$search01 = "";
	}

	if(!empty($tgl_permintaan_starts) && !empty($tgl_permintaan_ends))
	{
		$m = explode("-",$tgl_permintaan_starts);
		$tgl_start = $m[2]."-".$m[1]."-".$m[0];

		$n = explode("-",$tgl_permintaan_ends);
		$tgl_end = $n[2]."-".$n[1]."-".$n[0];

		$search_tgl = " TANGGAL_PERMINTAAN between '".$tgl_start."' AND '".$tgl_end."'";
	}
	else
	{
		$search_tgl = "";
	}

	if(!empty($search01) && !empty($search_tgl))
	{
		$and = " AND ";
	}
	else
	{
		$and = "";
	}

	if(!empty($search01) || !empty($search_tgl))
	{
		$search_full = " where".$search01.$and.$search_tgl;
	}
	else
	{
		$search_full = "";
	}
}
?>

<div style="" class="text-center text-white">
	<form action="index.php?link=rekap_data_problem" method="GET" name="problem_search" class="">
		<input type="hidden" name="link" value="rekap_data_problem">
		<input type="hidden" name="search" value="yes"> 
		<div class="clearfix container rounded p-2 bg-dark" style="width:800px">
			<input type="text" name="key_words" class="form-control float-left" placeholder="Nama CC" style="width:150px; font-size:12px" value="<?php if(!empty($key_words)){ echo $key_words;}?>">

			<div class="float-left p-2">By Tgl permintaan : </div>

			<input type="text" name="tgl_permintaan_starts" id="tgl_permintaan_start" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_permintaan_starts)){echo $tgl_permintaan_starts;}?>">

			<div class="float-left p-2">-</div>

			<input type="text" name="tgl_permintaan_ends" id="tgl_permintaan_end" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_permintaan_ends)){echo $tgl_permintaan_ends;}?>">

			<input type="submit" name="submit" value="Search" class="btn btn-danger float-left" style="margin-left:5px">
			<a href="to_excel_problem.php?key_words=<?php echo $key_words;?>&tgl_permintaan_starts=<?php echo $tgl_permintaan_starts;?>&tgl_permintaan_ends=<?php echo $tgl_permintaan_ends;?>&search=yes">
				<input type="button" name="Excel" value="Excel" class="btn btn-danger float-left" style="margin-left:5px">
			</a>
		</div>
	</form>
</div>

<table style="font-size:10px; width:97%; margin:0px auto 10px auto" class="table table-striped table-bordered">
	<thead class="text-center bg-dark text-white">
		<tr class="bg-dark text-white">
			<th>No</th>
			<th>Service ID</th>
			<th>Layanan</th>
			<th>Corporate Customer</th>
			<th>Nodin</th>
			<th>Order</th>
			<th>Lokasi</th>
			<th>Regional</th>
			<th>Witel</th>
			<th>Status</th>
			<th>Tgl Permintaan</th>
			<th>Last Update</th>
		</tr>
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

			$rekap_problemdb = mysqli_query($con, "select * from tb_proman ".$search_full."  order by no desc limit ".$offset.",".$dataPerPage."");
			$cek_problemdb = mysqli_num_rows($rekap_problemdb);

			if($cek_problemdb <= 0)
			{
				echo "<tr>";
				echo "<td colspan='13' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = $offset + 1;

				while($sh_problemdb = mysqli_fetch_array($rekap_problemdb))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_problemdb['SERVICE_ID']."</td>";
					echo "<td>".$sh_problemdb['LAYANAN']."</td>";
					echo "<td>".$sh_problemdb['CORPORATE_CUSTOMER']."</td>";
					echo "<td>".$sh_problemdb['NODIN']."</td>";
					echo "<td>".$sh_problemdb['ORDERS']."</td>";
					echo "<td>".$sh_problemdb['LOKASI']."</td>";
					echo "<td align='center'>".$sh_problemdb['REGIONAL']."</td>";
					echo "<td>".$sh_problemdb['WITEL']."</td>";
					echo "<td>".$sh_problemdb['STATUS']."</td>";
					echo "<td>";
						if($sh_problemdb['TANGGAL_PERMINTAAN'] == "0000-00-00")
						{
							echo "";
						}
						else
						{
							$x = explode("-",$sh_problemdb['TANGGAL_PERMINTAAN']);
							$y = $x[2]."-".$x[1]."-".$x[0];
							echo $y;
						}
					echo "</td>";
					echo "<td>";
						if($sh_problemdb['LAST_UPDATE'] == "0000-00-00")
						{
							echo "";
						}
						else
						{
							$trans_date = explode("-",$sh_problemdb['LAST_UPDATE']);
							$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
							echo $trans_done;
						}
					echo "</td>";
					echo "</tr>";
					$no++;
				}
			}

			?>

	</tbody>
</table>

<div id="paging-cover" class="container text-center">
		<?php
			$jum_dt_problem = mysqli_query($con,"select count(*) as jumData from tb_proman ".$search_full."");
			$show_jum = mysqli_fetch_array($jum_dt_problem);
			$jumData = $show_jum['jumData'];
			
			$jumPage = ceil($jumData/$dataPerPage);
			
			if($noPage > 1)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_permintaan_starts=".$tgl_permintaan_starts."&tgl_permintaan_ends=".$tgl_permintaan_ends."&search=yes&link=rekap_data_problem&noPage=".($noPage-1)."'><label id='halaman' class='btn'>&lt;&lt;</label></a>";
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
										echo "<a href='index.php?key_words=".$key_words."&tgl_permintaan_starts=".$tgl_permintaan_starts."&tgl_permintaan_ends=".$tgl_permintaan_ends."&search=yes&link=rekap_data_problem&noPage=".$page."' class=''><label id='halaman' class='btn'>".$page."</label></a>";
									}
									
									$showPage = $page;	
						}
				}
			
			if($noPage < $jumPage)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_permintaan_starts=".$tgl_permintaan_starts."&tgl_permintaan_ends=".$tgl_permintaan_ends."&search=yes&link=rekap_data_problem&noPage=".($noPage+1)."'><label id='halaman' class='btn'>&gt;&gt;</label></a>";
				}
		?>
</div>