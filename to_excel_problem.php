<?php
date_default_timezone_set("Asia/Krasnoyarsk");
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Problem_".$nama.".xls");

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
			</thead>

			<tbody>
			<?php
			if(!empty($_GET['search']))
			{
				$key_words = $_GET['key_words'];
				$tgl_permintaan_starts = $_GET['tgl_permintaan_starts'];
				$tgl_permintaan_ends = $_GET['tgl_permintaan_ends'];

				if(!empty($key_words))
				{
					$search01 = " CORPORATE_CUSTOMER LIKE '%".$key_words."%'";
				}
				else
				{
					$search01 = "";
				}

				if(!empty($tgl_permintaan_starts) && !empty($tgl_permintaan_ends))
				{
					$m = explode("-",$tgl_permintaan_starts);
					$tgl_start = $m[2]."-".$m[1]."-".$m[0];

					$n = explode("-",$tgl_permintaan_ends);
					$tgl_end = $n[2]."-".$n[1]."-".$n[0];

					$search_tgl = " TANGGAL_PERMINTAAN between '".$tgl_start."' AND '".$tgl_end."'";
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

			$query_problem = mysqli_query($con,"select * from tb_proman ".$search_full."");
			$cek_data = mysqli_num_rows($query_problem);

			if($cek_data <= 0)
			{
				echo "<tr>";
				echo "<td colspan='17' align='center'>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = 1;
				while($sh_data = mysqli_fetch_array($query_problem))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_data['SERVICE_ID']."</td>";
					echo "<td>".$sh_data['LAYANAN']."</td>";
					echo "<td>".$sh_data['CORPORATE_CUSTOMER']."</td>";
					echo "<td>".$sh_data['NODIN']."</td>";
					echo "<td>".$sh_data['ORDERS']."</td>";
					echo "<td>".$sh_data['REQUEST_BY']."</td>";
					echo "<td>";
						$q = explode("-",$sh_data['TANGGAL_PERMINTAAN']);
						$w = $q[2]."-".$q[1]."-".$q[0];
						echo $w;
					echo "</td>";
					echo "<td>".strip_tags($sh_data['DETAIL_PERMINTAAN'])."</td>";
					echo "<td>".$sh_data['HISTORY_TICKET']."</td>";
					echo "<td>".$sh_data['SEGMEN']."</td>";
					echo "<td>".$sh_data['LOKASI']."</td>";
					echo "<td>".$sh_data['REGIONAL']."</td>";
					echo "<td>".$sh_data['WITEL']."</td>";
					echo "<td>".$sh_data['STATUS']."</td>";
					echo "<td>";
						if($sh_data['LAST_UPDATE'] == "0000-00-00")
						{
							echo "";
						}
						else
						{
							$trans_date = explode("-",$sh_data['LAST_UPDATE']);
							$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
							echo $trans_done;
						}
					echo "</td>";
					echo "<td>";
						$query_last_info = mysqli_query($con,"select * from tb_update_proman where ID_PROBLEM ='".$sh_data['ID_PROBLEM']."' order by NO desc limit 0,5");
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
			}
			?>
			</tbody>

		</table>
	</body>
</html>