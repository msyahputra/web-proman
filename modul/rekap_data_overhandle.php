<script src="datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css" >
<script type="text/javascript">
    $(document).ready(function () 
				{
                	$('#tgl_bast_start').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });

    $(document).ready(function () 
				{
                	$('#tgl_bast_end').datepicker({
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
	
	if(!empty($_GET['tgl_bast_starts']) && !empty($_GET['tgl_bast_ends']))
	{
		$tgl_bast_starts = $_GET['tgl_bast_starts'];
		$tgl_bast_ends = $_GET['tgl_bast_ends'];
	}
	else
	{
		$tgl_bast_starts = "";
		$tgl_bast_ends = "";
	}

	if(!empty($key_words))
	{
		$search01 = " nama_cc LIKE '%".$key_words."%'";
	}
	else
	{
		$search01 = "";
	}

	if(!empty($tgl_bast_starts) && !empty($tgl_bast_ends))
	{
		$m = explode("-",$tgl_bast_starts);
		$tgl_start = $m[2]."-".$m[1]."-".$m[0];

		$n = explode("-",$tgl_bast_ends);
		$tgl_end = $n[2]."-".$n[1]."-".$n[0];

		$search_tgl = " tanggal_bast between '".$tgl_start."' AND '".$tgl_end."'";
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
	<form action="index.php?link=rekap_data_overhandle" method="GET" name="overhandle_search" class="">
		<input type="hidden" name="link" value="rekap_data_overhandle">
		<input type="hidden" name="search" value="yes"> 
		<div class="clearfix container rounded p-2 bg-dark" style="width:800px">
			<input type="text" name="key_words" class="form-control float-left" placeholder="Nama CC" style="width:150px; font-size:12px" value="<?php if(!empty($key_words)){ echo $key_words;}?>">

			<div class="float-left p-2">By Tanggal BAST : </div>

			<input type="text" name="tgl_bast_starts" id="tgl_bast_start" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_bast_starts)){echo $tgl_bast_starts;}?>">

			<div class="float-left p-2">-</div>

			<input type="text" name="tgl_bast_ends" id="tgl_bast_end" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_bast_ends)){echo $tgl_bast_ends;}?>">

			<input type="submit" name="submit" value="Search" class="btn btn-danger float-left" style="margin-left:5px">
			<a href="to_excel_overhandle.php?key_words=<?php echo $key_words;?>&tgl_bast_starts=<?php echo $tgl_bast_starts;?>&tgl_bast_ends=<?php echo $tgl_bast_ends;?>&search=yes">
				<input type="button" name="Excel" value="Excel" class="btn btn-danger float-left" style="margin-left:5px">
			</a>
		</div>
	</form>
</div>

<table style="font-size:10px; width:97%; margin:0px auto 10px auto" class="table table-striped table-bordered">
	<thead class="text-center bg-dark text-white">
		<th>No</th>
			<th>SID</th>
			<th>Nama Project</th>
			<th>Nama CC</th>
			<th>Segmen</th>
			<th>Nama Mitra</th>
			<th>Tanggal BAST</th>
			<th>Layanan</th>
			<th>Metode Pemabayaran</th>
			<th>SLG</th>
			<th>Mttr Recovery</th>
			<th>Mttr Respone</th>
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

			$rekap_overhandledb = mysqli_query($con, "select * from tb_overhandle_proman ".$search_full."  order by no desc limit ".$offset.",".$dataPerPage."");
			$cek_overhandledb = mysqli_num_rows($rekap_overhandledb);

			if($cek_overhandledb <= 0)
			{
				echo "<tr>";
				echo "<td colspan='13' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = $offset + 1;

				while($sh_overhandledb = mysqli_fetch_array($rekap_overhandledb))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_overhandledb['sid']."</td>";
					echo "<td>".$sh_overhandledb['nama_project']."</td>";
					echo "<td>".$sh_overhandledb['nama_cc']."</td>";
					echo "<td align='center'>".$sh_overhandledb['segmen']."</td>";
					echo "<td>".$sh_overhandledb['nama_mitra']."</td>";
					echo "<td align='center'>";
						if($sh_overhandledb['tanggal_bast'] == "0000-00-00")
						{
							echo "";
						}
						else
						{
							$trans_date = explode("-",$sh_overhandledb['tanggal_bast']);
							$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
							echo $trans_done;
						}
					echo "</td>";
					echo "<td>".$sh_overhandledb['layanan']."</td>";
					echo "<td>".$sh_overhandledb['metode_pembayaran']."</td>";
					echo "<td align='center'>".$sh_overhandledb['slg']."%</td>";
					echo "<td align='center'>".$sh_overhandledb['mttr_recovery']."</td>";
					echo "<td align='center'>".$sh_overhandledb['mttr_respone']."</td>";
					echo "</tr>";
					$no++;
				}
			}

			?>

	</tbody>
</table>

<div id="paging-cover" class="container text-center">
		<?php
			$jum_dt_overhandle = mysqli_query($con,"select count(*) as jumData from tb_overhandle_proman ".$search_full."");
			$show_jum = mysqli_fetch_array($jum_dt_overhandle);
			$jumData = $show_jum['jumData'];
			
			$jumPage = ceil($jumData/$dataPerPage);
			
			if($noPage > 1)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_bast_starts=".$tgl_bast_starts."&tgl_bast_ends=".$tgl_bast_ends."&search=yes&link=rekap_data_overhanlde&noPage=".($noPage-1)."'><label id='halaman' class='btn'>&lt;&lt;</label></a>";
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
										echo "<label id='halamanActive' class='btn'><b>".$page."</d></label>";
									}
								else
									{
										echo "<a href='index.php?key_words=".$key_words."&tgl_bast_starts=".$tgl_bast_starts."&tgl_bast_ends=".$tgl_bast_ends."&search=yes&link=rekap_data_overhandle&noPage=".$page."' class='btn'><label id='halaman' class=''>".$page."</label></a>";
									}
									
									$showPage = $page;	
						}
				}
			
			if($noPage < $jumPage)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_bast_starts=".$tgl_bast_starts."&tgl_bast_ends=".$tgl_bast_ends."&search=yes&link=rekap_data_failover&noPage=".($noPage+1)."'><label id='halaman' class='btn'>&gt;&gt;</label></a>";
				}
		?>
</div>