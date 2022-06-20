<?php
date_default_timezone_set("Asia/Krasnoyarsk");
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Failover_".$nama.".xls");

$host = "10.60.176.72";
$username_db ="admdb";
$password_db ="T3p00ll@20";
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
				<th>No</th>
				<th>Nama Customer</th>
				<th>SID</th>
				<th>Layanan</th>
				<th>Type Link</th>
				<th>Deskripsi Link</th>
				<th>Bandwidth</th>
				<th>PE</th>
				<th>Interface</th>
				<th>ME End 1</th>
				<th>ME End 2</th>
				<th>Akses</th>
				<th>Routing Type</th>
				<th>Nama STO</th>
				<th>Segment</th>
				<th>Tanggal Failover</th>
				<th>Tanggal Rollback</th>
				<th>Status Failover</th>
			</thead>

			<tbody>
			<?php
			if(!empty($_GET['search_clue']))
			{
				$search_clue = $_GET['search_clue'];
			}
			else
			{
				$search_clue = "";
			}

			$query_failover = mysqli_query($con,"select * from tb_failover_proman ".$search_clue."");
			$cek_data = mysqli_num_rows($query_failover);

			if($cek_data <= 0)
			{
				echo "<tr>";
				echo "<td>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = 1;
				while($sh_data = mysqli_fetch_array($query_failover))
				{
					echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$sh_data['nama_customer']."</td>";
					echo "<td>".$sh_data['sid']."</td>";
					echo "<td>".$sh_data['layanan']."</td>";
					echo "<td>".$sh_data['type_link']."</td>";
					echo "<td>".$sh_data['deskripsi_link']."</td>";
					echo "<td>".$sh_data['bandwidth']."</td>";
					echo "<td>".$sh_data['pe']."</td>";
					echo "<td>".$sh_data['interface']."</td>";
					echo "<td>".$sh_data['me_end1']."</td>";
					echo "<td>".$sh_data['me_end2']."</td>";
					echo "<td>".$sh_data['akses']."</td>";
					echo "<td>".$sh_data['routing_type']."</td>";
					echo "<td>".$sh_data['nama_sto']."</td>";
					echo "<td>".$sh_data['segmen']."</td>";
					echo "<td>".$sh_data['tgl_failover']."</td>";
					echo "<td>".$sh_data['tgl_rollback']."</td>";
					echo "<td>".$sh_data['status_failover']."</td>";
					echo "</tr>";
					$no++;
				}
			}
			?>
			</tbody>

		</table>
	</body>
</html>