<?php
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Problem_".$nama.".xls");

$host = "localhost";
$username_db ="root";
$password_db ="lovelmimokti";
$db_name = "proman";
$con = mysqli_connect($host,$username_db,$password_db,$db_name);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<html>
	<head></head>
	<title></title>
	<body>

			<table border="1">
				<thead>
					<tr>
						<th>No</th>
						<th>Service ID</th>
						<th>Layanan</th>
						<th>Corporate Customer</th>
						<th>Nodin</th>
						<th>Order</th>
						<th>Request By</th>
						<th>Tanggal Permintaan</th>
						<th>Detail Permintaan</th>
						<th>History Ticket</th>
						<th>Segment</th>
						<th>Lokasi</th>
						<th>Regional</th>
						<th>Witel</th>
						<th>Status</th>
						<th>Last Update</th>
						<th>Update Info</th>
					</tr>
				</thead>
			<?php
				$query_data_problem = mysqli_query($con,"select * from tb_proman order by no desc");
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
						echo "<td>".$data_proman['CORPORATE_CUSTOMER']."</td>";
						echo "<td>".$data_proman['NODIN']."</td>";
						echo "<td>".$data_proman['ORDERS']."</td>";
						echo "<td>".$data_proman['REQUEST_BY']."</td>";
						echo "<td>".$data_proman['TANGGAL_PERMINTAAN']."</td>";
						echo "<td>".strip_tags($data_proman['DETAIL_PERMINTAAN'])."</td>";
						echo "<td>".$data_proman['HISTORY_TICKET']."</td>";
						echo "<td>".$data_proman['SEGMEN']."</td>";
						echo "<td>".$data_proman['LOKASI']."</td>";
						echo "<td>".$data_proman['REGIONAL']."</td>";
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
						echo "<td>";
							$query_last_info = mysqli_query($con,"select * from tb_update_proman where ID_PROBLEM ='".$data_proman['ID_PROBLEM']."' order by NO desc limit 0,5");
							$cek_last_info = mysqli_num_rows($query_last_info);
							$sh_last_info = mysqli_fetch_array($query_last_info);

							if($cek_last_info <= 0)
							{
								echo "";
							}
							else
							{
								$stripdulu = strip_tags($sh_last_info['UPDATE_INFO']);
								echo $stripdulu;
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