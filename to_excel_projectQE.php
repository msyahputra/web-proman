<?php
date_default_timezone_set("Asia/Krasnoyarsk");
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_projectQE_".$nama.".xls");

$host = "10.60.176.72";
$username_db ="admdb";
$password_db ="T3p00ll@20";
$db_name = "proman";
$con = mysqli_connect($host,$username_db,$password_db,$db_name);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if(!empty($_GET['search']))
{
	$key_words = $_GET['key_words'];
	echo $tgl_starts = $_GET['tgl_starts'];
	$tgl_ends = $_GET['tgl_ends'];

	if(!empty($key_words))
	{
		$search01 = " nama_corporate LIKE '%".$key_words."%' OR sid LIKE '%".$key_words."%' ";
	}
	else
	{
		$search01 = "";
	}

	if(!empty($tgl_starts) && !empty($tgl_ends))
	{
		$m = explode("-",$tgl_starts);
		$tgl_start = $m[2]."-".$m[1]."-".$m[0];

		$n = explode("-",$tgl_ends);
		$tgl_end = $n[2]."-".$n[1]."-".$n[0];

		$search_tgl = " tgl_input between '".$tgl_start."' AND '".$tgl_end."'";
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
		echo $search_full = "";
	}
}

?>
<html>
	<head></head>
	<title></title>
	<body>

		<table border="1">
			<thead>
				<tr>
					<th rowspan="3">No</th>
					<th rowspan="3">Customer Account</th>
					<th rowspan="3">Nama Customer</th>
					<th rowspan="3">SID</th>
					<th rowspan="3">Nama AM</th>
					<th rowspan="3">Kontak AM</th>
					<th rowspan="3">Email AM</th>
					<th rowspan="3">Nama EOS</th>
					<th rowspan="3">Kontak EOS</th>
					<th rowspan="3">Email EOS</th>
					<th rowspan="3">Alamat Lokasi</th>
					<th rowspan="3">Detail Permintaan</th>
					<th rowspan="3">Update Progress</th>
					<th colspan="18">Topologi</th>
				</tr>
				<tr>
					<th colspan="9">Eksisting</th>
					<th colspan="9">Baru</th>
				</tr>
				<tr>
					<th>Router PE</th>
					<th>Interface PE</th>
					<th>Node Metro A</th>
					<th>Port Metro A</th>
					<th>Node Metro B</th>
					<th>Port Metro B</th>
					<th>Vcid</th>
					<th>Vlan</th>
					<th>Access</th>
					<th>Router PE</th>
					<th>Interface PE</th>
					<th>Node Metro A</th>
					<th>Port Metro A</th>
					<th>Node Metro B</th>
					<th>Port Metro B</th>
					<th>Vcid</th>
					<th>Vlan</th>
					<th>Access</th>
				</tr>
			</thead>

			<tbody>
			<?php
			$query_projectQE = mysqli_query($con,"select * from tb_project_qe ".$search_full."");
			$cek_data = mysqli_num_rows($query_projectQE);

			if($cek_data <= 0)
			{
				echo "<tr>";
				echo "<td colspan='22'>Tidak ada data untuk di tampilkan !</td>";
				echo "</tr>";
			}
			else
			{
				$no = 1;
				while($sh_data = mysqli_fetch_array($query_projectQE))
				{
					echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$sh_data['corporate_account']."</td>";
					echo "<td>".$sh_data['nama_corporate']."</td>";
					echo "<td>".$sh_data['sid']."</td>";
					echo "<td>".$sh_data['nama_am']."</td>";
					echo "<td>'".$sh_data['kontak_am']."</td>";
					echo "<td>".$sh_data['email_am']."</td>";
					echo "<td>".$sh_data['nama_eos']."</td>";
					echo "<td>'".$sh_data['kontak_eos']."</td>";
					echo "<td>".$sh_data['email_eos']."</td>";
					echo "<td>".$sh_data['alamat']."</td>";
					echo "<td>".$sh_data['detail_permintaan']."</td>";
					echo "<td>";
						$query_progress = mysqli_query($con,"select info_update from tb_update_projectqe where id_projectqe = '".$sh_data['id_projectQE']."' order by no desc limit 0,3");
						$cek_progress = mysqli_num_rows($query_progress);
						$sh_progress = mysqli_fetch_array($query_progress);

						if($cek_progress <= 0)
						{
							echo "'-";
						}
						else
						{
							echo $sh_progress[0];
						}
					echo "</td>";

					if(!empty($sh_data['id_topologi_eksisting']))
					{
					$topo_eks = mysqli_query($con,"select * from tb_topologi where id_topologi = '".$sh_data['id_topologi_eksisting']."'");
					$topo_eks_cek = mysqli_num_rows($topo_eks);


						while($shtopo_eks = mysqli_fetch_array($topo_eks))
						{		
							echo "<td>".$shtopo_eks['router_pe']."</td>";
							echo "<td>".$shtopo_eks['interface_pe']."</td>";
							echo "<td>".$shtopo_eks['node_metro_1']."</td>";
							echo "<td>'".$shtopo_eks['port_metro_1']."</td>";
							echo "<td>".$shtopo_eks['node_metro_2']."</td>";
							echo "<td>'".$shtopo_eks['port_metro_2']."</td>";
							echo "<td>".$shtopo_eks['vcid']."</td>";
							echo "<td>".$shtopo_eks['vlan']."</td>";
							echo "<td>".$shtopo_eks['akses']."</td>";
						}
					}
					else
					{
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
					}

					if(!empty($sh_data['id_topologi_baru']))
					{
					$topo_baru = mysqli_query($con,"select * from tb_topologi where id_topologi = '".$sh_data['id_topologi_baru']."'");
					$topo_baru_cek = mysqli_num_rows($topo_baru);


						while($shtopo_baru = mysqli_fetch_array($topo_baru))
						{		
							echo "<td>".$shtopo_baru['router_pe']."</td>";
							echo "<td>".$shtopo_baru['interface_pe']."</td>";
							echo "<td>".$shtopo_baru['node_metro_1']."</td>";
							echo "<td>'".$shtopo_baru['port_metro_1']."</td>";
							echo "<td>".$shtopo_baru['node_metro_2']."</td>";
							echo "<td>'".$shtopo_baru['port_metro_2']."</td>";
							echo "<td>".$shtopo_baru['vcid']."</td>";
							echo "<td>".$shtopo_baru['vlan']."</td>";
							echo "<td>".$shtopo_baru['akses']."</td>";
						}
					}
					else
					{
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
						echo "<td>Null</td>";
					}

					echo "</tr>";
					$no++;
				}
			}
			?>
			</tbody>

		</table>
	</body>
</html>