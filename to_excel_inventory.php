<?php
date_default_timezone_set("Asia/Krasnoyarsk");
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_inventory_".$nama.".xls");

$host = "10.60.176.72";
$username_db ="admdb";
$password_db ="T3p00ll@20";
$db_name = "proman";
$con = mysqli_connect($host,$username_db,$password_db,$db_name);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if(!empty($_GET['search_full']))
{
	$search_full = $_GET['search_full'];
}else{
	$search_full = " ";
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
					<th>KL Document</th>
				</tr>
			</thead>

			<tbody>
			<?php
			$query_inventory = mysqli_query($con,"select * from tb_inventory_imes ".$search_full."");
			$cek_data = mysqli_num_rows($query_inventory);

			if($cek_data <= 0)
			{
				echo "<tr>";
				echo "<td colspan='22'>Tidak ada data untuk di tampilkan !</td>";
				echo "</tr>";
			}
			else
			{
				$no = 1;
				while($sh_data = mysqli_fetch_array($query_inventory))
				{
					echo "<tr class=''>";
					echo "<td align='center'>".$no."</td>";
					echo "<td>".$sh_data['no_kl']."</a></td>";
					echo "<td>".$sh_data['nama_corporate']."</td>";
					echo "<td align='center'>".$sh_data['segmen']."</td>";
					echo "<td>".$sh_data['nama_projek']."</td>";
					echo "<td>".$sh_data['produk']."</td>";
					echo "<td>".$sh_data['nama_mitra']."</td>";
					echo "<td>".$sh_data['pic_mitra']." ".$sh_data['kontak_pic_mitra']."</td>";
					echo "<td>".$sh_data['slg']."</td>";
					echo "<td align='center'>".$sh_data['mtt_rec']."</td>";
					echo "<td>";
						$n = explode("-",$sh_data['akhir_kontrak']);
						echo $n[2]."-".$n[1]."-".$n[0];
					echo "</td>";
					echo "<td>";
						if(!empty($sh_data['upload_size']))
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
	</body>
</html>