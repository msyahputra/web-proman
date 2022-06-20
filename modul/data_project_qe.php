<div id="tabel_warp" class="text-white">
	<table id="tb_proman" class="table table-striped table-bordered">
		<thead>
			<tr class="bg-dark text-white text-center">
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

		<tfoot class="bg-dark text-white text-center" style="">
			<tr>
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
		</tfoot>

	<?php
		$query_data_projectQE = mysqli_query($con,"select * from tb_project_qe order by no desc");
		$cek_data_projectQE = mysqli_num_rows($query_data_projectQE);

		if($cek_data_projectQE <= 0)
		{
			echo "<tr class='bg-white'>";
			echo "<td colspan='13' align='center'>Tidak ada data yang di tampilkan !</td>";
			echo "</tr>";
		}
		else
		{	
			?>
			<tbody style="background-color:#ffffff">
			<?php
			$no = 1;
			while($data_projectQE = mysqli_fetch_array($query_data_projectQE))
			{
				echo "<tr class=''>";
				echo "<td align='center'>".$no."</td>";
				echo "<td><a href='index.php?link=detail_projectQE&dt_proman=".$data_projectQE['id_projectQE']."'>".$data_projectQE['corporate_account']."</a></td>";
				echo "<td>".$data_projectQE['nama_corporate']."</td>";
				echo "<td>".$data_projectQE['sid']."</td>";
				echo "<td>".$data_projectQE['nama_am']."</td>";
				echo "<td>".$data_projectQE['kontak_am']."</td>";
				echo "<td>".$data_projectQE['email_am']."</td>";
				echo "<td>".$data_projectQE['nama_eos']."</td>";
				echo "<td>".$data_projectQE['kontak_eos']."</td>";
				echo "<td>".$data_projectQE['email_eos']."</td>";
				echo "<td>".$data_projectQE['alamat']."</td>";
				echo "<td>".$data_projectQE['detail_permintaan']."</td>";
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