<div id="tabel_warp" class="text-white">
	<table id="tb_proman" class="table table-striped table-bordered">
		<thead>
			<tr class="bg-dark text-white text-center">
				<th>No</th>
				<th>SID</th>
				<th>Nama Customer</th>
				<th>Layanan</th>
				<th>Type Link</th>
				<th>Bandwidth</th>
				<th>Router PE</th>
				<th>Akses</th>
				<th>Segmen</th>
				<th>Tanggal Fail Over</th>
				<th>Tanggal Rollback</th>
				<th>Status Failover</th>
			</tr>
		</thead>

		<tfoot class="bg-dark text-white text-center" style="">
			<tr>
				<th>No</th>
				<th>SID</th>
				<th>Nama Customer</th>
				<th>Layanan</th>
				<th>Type Link</th>
				<th>Bandwidth</th>
				<th>Router PE</th>
				<th>Akses</th>
				<th>Segmen</th>
				<th>Tanggal Fail Over</th>
				<th>Tanggal Rollback</th>
				<th>Status Failover</th>
			</tr>
		</tfoot>

	<?php
		$query_data_failover = mysqli_query($con,"select * from tb_failover_proman order by no desc");
		$cek_data_failover = mysqli_num_rows($query_data_failover);

		if($cek_data_failover <= 0)
		{
			echo "<tr class='bg-white'>";
			echo "<td colspan='12' align='center'>Tidak ada data yang di tampilkan !</td>";
			echo "</tr>";
		}
		else
		{	
			?>
			<tbody style="background-color:#ffffff">
			<?php
			$no = 1;
			while($data_proman = mysqli_fetch_array($query_data_failover))
			{
				echo "<tr class=''>";
				echo "<td align='center'>".$no."</td>";
				echo "<td><a href=index.php?link=detail_failover&dt_proman=".$data_proman['id_failover'].">".$data_proman['sid']."</a></td>";
				echo "<td>".$data_proman['nama_customer']."</td>";
				echo "<td align='center'>".$data_proman['layanan']."</td>";
				echo "<td>".$data_proman['type_link']."</td>";
				echo "<td align='center'>".$data_proman['bandwidth']."</td>";
				echo "<td>".$data_proman['pe']."</td>";
				echo "<td>".$data_proman['akses']."</td>";
				echo "<td align='center'>".$data_proman['segmen']."</td>";
				echo "<td align='center'>";
					$fix_tgl_1 = explode("-",$data_proman['tgl_failover']);
					$fix_failover = $fix_tgl_1[2]."-".$fix_tgl_1[1]."-".$fix_tgl_1[0];
					
					if($fix_failover == "00-00-0000")
					{
						echo "-";
					}
					else
					{
						echo $fix_failover;
					}
				echo "</td>";
				echo "<td align='center'>";
					$fix_tgl_2 = explode("-",$data_proman['tgl_rollback']);
					$fix_rollback = $fix_tgl_2[2]."-".$fix_tgl_2[1]."-".$fix_tgl_2[0];
					
					if($fix_rollback == "00-00-0000")
					{
						echo "-";
					}
					else
					{
						echo $fix_rollback;
					}
				echo "</td>";
				echo "<td align='center'>".$data_proman['status_failover']."</td>";
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
    		$('#tb_proman').DataTable();
			} 
		);
</script>