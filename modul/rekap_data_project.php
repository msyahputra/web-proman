<script src="datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css" >
<script type="text/javascript">
    $(document).ready(function () 
				{
                	$('#tgl_start').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                }
			);
           });

    $(document).ready(function ()
				{
                	$('#tgl_end').datepicker({
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
	$tgl_starts = $_GET['tgl_starts'];
	$tgl_ends = $_GET['tgl_ends'];

	if(!empty($key_words))
	{
		$search01 = " nama_corporate LIKE '%".$key_words."%' OR sid LIKE '%".$key_words."%' ";
	}
	else
	{
		$search01 = "";
	}

	if(!empty($tgl_starts) && !empty($tgl_ends))
	{
		$m = explode("-",$tgl_starts);
		$tgl_start = $m[2]."-".$m[1]."-".$m[0];

		$n = explode("-",$tgl_ends);
		$tgl_end = $n[2]."-".$n[1]."-".$n[0];

		$search_tgl = " tgl_input between '".$tgl_start."' AND '".$tgl_end."'";
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
	<form action="index.php" method="GET" name="project_search" class="">
		<input type="hidden" name="link" value="rekap_projectQE">
		<input type="hidden" name="search" value="yes"> 
		<div class="clearfix container rounded p-2 bg-dark" style="width:800px">
			<input type="text" name="key_words" class="form-control float-left" placeholder="by Cust Name / SID" style="width:150px; font-size:12px" value="<?php if(!empty($key_words)){ echo $key_words;}?>">

			<div class="float-left p-2">By Tanggal: </div>

			<input type="text" name="tgl_starts" id="tgl_start" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_starts)){echo $tgl_starts;}?>">

			<div class="float-left p-2">-</div>

			<input type="text" name="tgl_ends" id="tgl_end" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php if(!empty($tgl_ends)){echo $tgl_ends;}?>">

			<input type="submit" name="submit" value="Search" class="btn btn-danger float-left" style="margin-left:5px">
			<a href="to_excel_projectQE.php?key_words=<?php echo $key_words;?>&tgl_starts=<?php echo !empty($tgl_starts) ? $tgl_starts : "";?>&tgl_ends=<?php echo !empty($tgl_ends) ? $tgl_ends : "";?>&search=yes">
				<input type="button" name="Excel" value="Excel" class="btn btn-danger float-left" style="margin-left:5px">
			</a>
		</div>
	</form>
</div>

<table style="font-size:10px; width:97%; margin:0px auto 10px auto" class="table table-striped table-bordered">
	<thead class="text-center bg-dark text-white">
		<tr class="bg-dark text-white">
			<th>No</th>
			<th>Customer Account</th>
			<th>Nama Customer</th>
			<th>SID</th>
			<th>Nama AM</th>
			<th>Kontak AM</th>
			<th>Email AM</th>
			<th>Nama EOS</th>
			<th>Kontak EOS</th>
			<th>Email EOS</th>
			<th>Alamat Lokasi</th>
			<th>Detail Permintaan</th>
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

			$rekap_projectQE = mysqli_query($con, "select * from tb_project_qe ".$search_full."  order by no desc limit ".$offset.",".$dataPerPage."");
			$cek_projectQE = mysqli_num_rows($rekap_projectQE);

			if($cek_projectQE <= 0)
			{
				echo "<tr>";
				echo "<td colspan='13' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = $offset + 1;

				while($sh_projectQE = mysqli_fetch_array($rekap_projectQE))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_projectQE['corporate_account']."</td>";
					echo "<td>".$sh_projectQE['nama_corporate']."</td>";
					echo "<td>".$sh_projectQE['sid']."</td>";
					echo "<td>".$sh_projectQE['nama_am']."</td>";
					echo "<td>".$sh_projectQE['kontak_am']."</td>";
					echo "<td>".$sh_projectQE['email_am']."</td>";
					echo "<td>".$sh_projectQE['nama_eos']."</td>";
					echo "<td>".$sh_projectQE['kontak_eos']."</td>";
					echo "<td>".$sh_projectQE['email_eos']."</td>";
					echo "<td>".$sh_projectQE['alamat']."</td>";
					echo "<td>".$sh_projectQE['detail_permintaan']."</td>";
					echo "</tr>";
					$no++;

				}
			}

			?>

	</tbody>
</table>

<div id="paging-cover" class="container text-center">
		<?php
			$jum_dt_projectQE = mysqli_query($con,"select count(*) as jumData from tb_project_qe ".$search_full."");
			$show_jum = mysqli_fetch_array($jum_dt_projectQE);
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