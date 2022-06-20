<div id="tabel_warp" class="text-white">
	<table id="tb_proman_user" class="table table-striped table-bordered">
		<thead>
			<tr class="bg-dark text-white">
				<th>No</th>
				<th>ID User</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Telepon</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Nik/ID Perner</th>
				<th>Status User</th>
				<th>Username</th>
				<th>Create Date</th>
			</tr>
		</thead>

		<tfoot class="bg-dark text-white" style="">
			<tr>
				<th>No</th>
				<th>ID User</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Telepon</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Nik/ID Perner</th>
				<th>Status User</th>
				<th>Username</th>
				<th>Create Date</th>
			</tr>
		</tfoot>

	<?php
		$query_data_user = mysqli_query($con,"select * from tb_user_proman order by no desc");
		$cek_data_user = mysqli_num_rows($query_data_user);

		if($cek_data_user <= 0)
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
			while($data_user = mysqli_fetch_array($query_data_user))
			{
				if($_SESSION['level_pro'] < $data_user['level_user'] || $_SESSION['username_pro'] == $data_user['username'])
				{
				echo "<tr class=''>";
				echo "<td align='center'>".$no."</td>";
				echo "<td><a href=index.php?link=detail_user&dt_user=".$data_user['id_user'].">".$data_user['id_user']."</a></td>";
				echo "<td>".$data_user['nama']."</td>";
				echo "<td>".$data_user['jabatan']."</td>";
				echo "<td>".$data_user['no_telepon']."</td>";
				echo "<td>".$data_user['gender']."</td>";
				echo "<td>".$data_user['email']."</td>";
				echo "<td>".$data_user['nik_id_perner']."</td>";
				echo "<td>".$data_user['status_user']."</td>";
				echo "<td>".$data_user['username']."</td>";
				echo "<td>";
					if($data_user['create_date'] == "0000-00-00")
					{
						echo "";
					}
					else
					{
						$trans_date = explode("-",$data_user['create_date']);
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
			<?php
		}
	?>
	</table>
</div>
<script type="text/javascript">
	$(document).ready( 
		function () {
    		$('#tb_proman_user').DataTable();
			} 
		);
</script>