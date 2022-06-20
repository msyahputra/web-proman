<div id="tabel_warp" class="text-white">
	<table id="tb_proman" class="table table-striped table-bordered">
		<thead>
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
				<th>Last Update</th>
			</tr>
		</thead>

		<tfoot class="bg-dark text-white" style="">
			<tr>
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
				<th>Last Update</th>
			</tr>
		</tfoot>

	<?php
		if(!empty($_GET['petunjuk']))
		{
			if($_GET['petunjuk'] == "OnProgress")
			{
				$item = "On Progress";
			}
			else
			{
				$item = $_GET['petunjuk'];
			}

			$petunjuk_query = "where status = '".$item."' ";
		}
		else
		{
			$petunjuk_query = "";
		}

		$query_data_problem = mysqli_query($con,"select * from tb_proman ".$petunjuk_query." order by no desc");
		$cek_data_problem = mysqli_num_rows($query_data_problem);

		if($cek_data_problem <= 0)
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
			while($data_proman = mysqli_fetch_array($query_data_problem))
			{
				echo "<tr class=''>";
				echo "<td align='center'>".$no."</td>";
				echo "<td>".$data_proman['SERVICE_ID']."</td>";
				echo "<td>".$data_proman['LAYANAN']."</td>";
				echo "<td><a href=index.php?petunjuk=".$petunjuk."&link=detail_problem&dt_proman=".$data_proman['ID_PROBLEM'].">".$data_proman['CORPORATE_CUSTOMER']."</a></td>";
				echo "<td>".$data_proman['NODIN']."</td>";
				echo "<td>".$data_proman['ORDERS']."</td>";
				echo "<td>".$data_proman['LOKASI']."</td>";
				echo "<td align='center'>".$data_proman['REGIONAL']."</td>";
				echo "<td>".$data_proman['WITEL']."</td>";
				echo "<td>".$data_proman['STATUS']."</td>";
				echo "<td>";
					if($data_proman['LAST_UPDATE'] == "0000-00-00")
					{
						echo "";
					}
					else
					{
						$trans_date = explode("-",$data_proman['LAST_UPDATE']);
						$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
						echo $trans_done;
					}
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
    		$('#tb_proman').DataTable();
			} 
		);
</script>