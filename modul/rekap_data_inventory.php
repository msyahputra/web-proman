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
if(!empty($_GET['search']) && $_GET['search'] == "yes")
{
	$tgl_cari_1 = $_GET['tgl_starts'];
	$tgl_cari_2 = $_GET['tgl_ends'];
	$search = $_GET['search'];
	$key_words = $_GET['key_words'];

	if(!empty($key_words))
	{
		$search_words = " nama_corporate like '%".$key_words."%' OR segmen like '%".$key_words."%' ";
	}
	else
	{
		$search_words = "";
	}

	if(!empty($tgl_cari_1) && !empty($tgl_cari_2))
	{
		$t1 = explode("-",$tgl_cari_1);
		$tgl_awal = $t1[2]."-".$t1[1]."-".$t1[0];

		$t2 = explode("-",$tgl_cari_2);
		$tgl_akhir = $t2[2]."-".$t2[1]."-".$t2[0];

		$search_tgl = " akhir_kontrak between '".$tgl_awal."' AND '".$tgl_akhir."' ";
	}
	else
	{
		$search_tgl = "";
	}

	if(!empty($search_words) && !empty($search_tgl))
	{
		$dan = " AND ";
	}
	else
	{
		$dan = "";
	}

	if(empty($search_words) && empty($search_tgl))
	{
		$search_full = "";
	}
	else
	{
		$search_full = "where ".$search_words." ".$dan." ".$search_tgl;
	}
}
else
{
	$tgl_cari_1 = "";
	$tgl_cari_2 = "";
	$search_full = "";
}
?>

<div style="" class="text-center text-white">
	<form action="index.php" method="GET" name="inventory_search" class="">
		<input type="hidden" name="link" value="rekap_inventory">
		<input type="hidden" name="search" value="yes"> 
		<div class="clearfix container rounded p-2 bg-dark" style="width:800px">
			<input type="text" name="key_words" class="form-control float-left" placeholder="Cust Name / Segmen" style="width:150px; font-size:12px" value="<?php if(!empty($key_words)){ echo $key_words;}?>">

			<div class="float-left p-2">By Tanggal: </div>

			<input type="text" name="tgl_starts" id="tgl_start" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php echo !empty($tgl_cari_1) ? $tgl_cari_1 : "";?>">

			<div class="float-left p-2">-</div>

			<input type="text" name="tgl_ends" id="tgl_end" placeholder="" class="form-control float-left" style="width:150px;cursor:pointer; font-size:12px" value="<?php echo !empty($tgl_cari_2) ? $tgl_cari_2 : "";?>">

			<input type="submit" name="submit" value="Search" class="btn btn-danger float-left" style="margin-left:5px">
			<a href="to_excel_inventory.php?search_full=<?php echo $search_full;?>" target="_blank">
				<input type="button" name="Excel" value="Excel" class="btn btn-danger float-left" style="margin-left:5px">
			</a>
		</div>
	</form>
</div>

<table style="font-size:10px; width:97%; margin:0px auto 10px auto" class="table table-striped table-bordered">
	<thead class="text-center bg-dark text-white">
		<tr class="bg-dark text-white">
			<th>No</th>
			<th>No KL</th>
			<th>Nama Corporate</th>
			<th>Segmen</th>
			<th>Nama Project</th>
			<th>Produk</th>
			<th>Mitra</th>
			<th>PIC Mitra</th>
			<th>Slg</th>
			<th>MTT Rec</th>
			<th>Akhir Kontrak</th>
			<th>Document</th>
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

			$rekap_inventory = mysqli_query($con, "select * from tb_inventory_imes ".$search_full."  order by akhir_kontrak asc limit ".$offset.",".$dataPerPage."");
			$cek_inventory = mysqli_num_rows($rekap_inventory);

			if($cek_inventory <= 0)
			{
				echo "<tr>";
				echo "<td colspan='13' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = $offset + 1;

				while($sh_inventory = mysqli_fetch_array($rekap_inventory))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_inventory['no_kl']."</a></td>";
					echo "<td>".$sh_inventory['nama_corporate']."</td>";
					echo "<td align='center'>".$sh_inventory['segmen']."</td>";
					echo "<td>".$sh_inventory['nama_projek']."</td>";
					echo "<td>".$sh_inventory['produk']."</td>";
					echo "<td>".$sh_inventory['nama_mitra']."</td>";
					echo "<td>".$sh_inventory['pic_mitra']." ".$sh_inventory['kontak_pic_mitra']."</td>";
					echo "<td>".$sh_inventory['slg']."</td>";
					echo "<td align='center'>".$sh_inventory['mtt_rec']."</td>";
					echo "<td>";
						if($sh_inventory['akhir_kontrak'] != "0000-00-00")
						{
							$n = explode("-",$sh_inventory['akhir_kontrak']);
							echo $n[2]."-".$n[1]."-".$n[0];
						}
						else
						{
							echo "-";
						}
					echo "</td>";
					echo "<td>";
						if(!empty($sh_inventory['upload_size']))
						{
							echo "Available";
						}
						else
						{
							echo "Not Available";
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
			$jum_dt_inventory = mysqli_query($con,"select count(*) as jumData from tb_inventory_imes ".$search_full."");
			$show_jum = mysqli_fetch_array($jum_dt_inventory);
			$jumData = $show_jum['jumData'];
			
			$jumPage = ceil($jumData/$dataPerPage);
			
			if($noPage > 1)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_starts=".$tgl_cari_1."&tgl_ends=".$tgl_cari_2."&search=yes&link=rekap_inventory&noPage=".($noPage-1)."'><label id='halaman' class='btn'>&lt;&lt;</label></a>";
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
										echo "<a href='index.php?key_words=".$key_words."&tgl_starts=".$tgl_cari_1."&tgl_ends=".$tgl_cari_2."&search=yes&link=rekap_inventory&noPage=".$page."' class=''><label id='halaman' class='btn'>".$page."</label></a>";
									}
									
									$showPage = $page;	
						}
				}
			
			if($noPage < $jumPage)
				{
					echo "<a href='index.php?key_words=".$key_words."&tgl_starts=".$tgl_cari_1."&tgl_ends=".$tgl_cari_2."&search=yes&link=rekap_inventory&noPage=".($noPage+1)."'><label id='halaman' class='btn'>&gt;&gt;</label></a>";
				}
		?>
</div>