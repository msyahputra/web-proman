<div id="tabel_warp" class="text-white">
	<table id="tb_data" class="table table-striped table-bordered">
		<thead>
			<tr class="bg-dark text-white text-center">
				<th>No</th>
				<th>SID</th>
				<th>Nama Project</th>
				<th>Nama CC</th>
				<th>Segmen</th>
				<th>Nama Mitra</th>
				<th>Tanggal BAST</th>
				<th>Layanan</th>
				<th>Metode Pemabayaran</th>
				<th>Status</th>
				<th>SLG</th>
				<th>Mttr Recovery</th>
				<th>Mttr Respone</th>
			</tr>
		</thead>

		<tfoot class="bg-dark text-white text-center">
			<tr>
				<th>No</th>
				<th>SID</th>
				<th>Nama Project</th>
				<th>Nama CC</th>
				<th>Segmen</th>
				<th>Nama Mitra</th>
				<th>Tanggal BAST</th>
				<th>Layanan</th>
				<th>Metode Pembayaran</th>
				<th>Status</th>
				<th>SLG</th>
				<th>Mttr Recovery</th>
				<th>Mttr Respone</th>
			</tr>
		</tfoot>

	<?php
		$query_data_overhandle = mysqli_query($con,"select * from tb_overhandle_proman order by no desc");
		$cek_data_overhandle = mysqli_num_rows($query_data_overhandle);

		if($cek_data_overhandle <= 0)
		{
			echo "<tr class='bg-white'>";
			echo "<td colspan='11' align='center'>Tidak ada data yang di tampilkan !</td>";
			echo "</tr>";
		}
		else
		{	
			?>
			<tbody style="background-color:#ffffff">
			<?php
			$no = 1;
			while($data_proman = mysqli_fetch_array($query_data_overhandle))
			{
				echo "<tr class=''>";
				echo "<td align='center'>".$no."</td>";
				echo "<td>".$data_proman['sid']."</td>";
				echo "<td><a href=index.php?link=detail_overhandle&dt_proman=".$data_proman['id_project'].">".$data_proman['nama_project']."</a></td>";
				echo "<td>".$data_proman['nama_cc']."</td>";
				echo "<td align='center'>".$data_proman['segmen']."</td>";
				echo "<td>".$data_proman['nama_mitra']."</td>";
				echo "<td align='center'>";
					if($data_proman['tanggal_bast'] == "0000-00-00")
					{
						echo "";
					}
					else
					{
						$trans_date = explode("-",$data_proman['tanggal_bast']);
						$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
						echo $trans_done;
					}
				echo "</td>";
				echo "<td>".$data_proman['layanan']."</td>";
				echo "<td>".$data_proman['metode_pembayaran']."</td>";
				echo "<td class='text-center'>";
					if(!empty($data_proman['status_overhandle'])){

						switch($data_proman['status_overhandle']){
							case 'On Progress':
								$bg = 'bg-success';
								break;
							case 'Over Due':
								$bg = 'bg-danger';
								break;
							case 'Close':
								$bg = 'bg-secondary';
								break;
							default:
								$bg = '';
								break;
						}

						echo "<div class='rounded border p-1 text-center ".$bg." text-white' style='width:65px'>";
						echo $data_proman['status_overhandle'];
						echo "</div>";
					}else{
						echo "Unknown";
					}
				echo "</td>";
				echo "<td align='center'>";
				echo !empty($data_proman['slg']) ? $data_proman['slg']."%" : "-";
				echo "</td>";
				echo "<td align='center'>";
				echo !empty($data_proman['mttr_recovery']) ? $data_proman['mttr_recovery'] : "-";
				echo "</td>";
				echo "<td align='center'>";
				echo !empty($data_proman['mttr_respone']) ? $data_proman['mttr_respone'] : "-";
				echo "</td>";
				echo "</tr>";
				$no++;
			}
			?>
			</tbody>
			<?php
		}
	?>
	</table>
</div>
<script type="text/javascript">
	$(document).ready( 
		function () {
    		$('#tb_data').DataTable();
			} 
		);
</script>