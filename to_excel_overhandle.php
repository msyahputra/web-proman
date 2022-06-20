<?php
date_default_timezone_set("Asia/Krasnoyarsk");
$nama = date("dmYHis");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Overhandle_".$nama.".xls");

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
				<th>Corporate Account</th>
				<th>SID</th>
				<th>Nama Project</th>
				<th>Nilai Project</th>
				<th>Nama CC</th>
				<th>Order NCX Ticares</th>
				<th>Nomor KB PKS</th>
				<th>Nomor KL</th>
				<th>Nama AM</th>
				<th>Nama Mitra</th>
				<th>PIC Mitra</th>
				<th>Segmen</th>
				<th>Tanggal BAST</th>
				<th>Layanan</th>
				<th>Metode Pemabayaran</th>
				<th>SLG</th>
				<th>Mttr Recovery</th>
				<th>Mttr Respone</th>
				<th>PIC Penyerahan</th>
				<th>PIC Penerima</th>
			</thead>

			<tbody>
			<?php
			if(!empty($_GET['search']))
			{
				$key_words = $_GET['key_words'];
				
				if(!empty($_GET['tgl_bast_starts']))
				{
					$tgl_bast_starts = $_GET['tgl_bast_starts'];
				}
				else
				{
					$tgl_bast_starts = "";
				}	
				
				if(!empty($_GET['tgl_bast_ends']))
				{
					$tgl_bast_ends = $_GET['tgl_bast_ends'];
				}
				else
				{
					$tgl_bast_ends = "";
				}

				if(!empty($key_words))
				{
					$search01 = " nama_cc LIKE '%".$key_words."%'";
				}
				else
				{
					$search01 = "";
				}

				if(!empty($tgl_bast_starts) && !empty($tgl_bast_ends))
				{
					$m = explode("-",$tgl_bast_starts);
					$tgl_start = $m[2]."-".$m[1]."-".$m[0];

					$n = explode("-",$tgl_bast_ends);
					$tgl_end = $n[2]."-".$n[1]."-".$n[0];

					$search_tgl = " tanggal_bast between '".$tgl_start."' AND '".$tgl_end."'";
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
					echo $search_full = " where".$search01.$and.$search_tgl;
				}
				else
				{
					$search_full = "";
				}
			}

			$query_overhandle = mysqli_query($con,"select * from tb_overhandle_proman ".$search_full."");
			$cek_data = mysqli_num_rows($query_overhandle);

			if($cek_data <= 0)
			{
				echo "<tr>";
				echo "<td>Tidak ada data untuk ditampilkan!</td>";
				echo "</tr>";
			}
			else
			{
				$no = 1;
				while($sh_data = mysqli_fetch_array($query_overhandle))
				{
					echo "<tr class=''>";
					echo "<td>".$no."</td>";
					echo "<td>".$sh_data['corporate_account']."</td>";
					echo "<td>".$sh_data['sid']."</td>";
					echo "<td>".$sh_data['nama_project']."</td>";
					echo "<td>";
						$rupiah = "Rp".number_format($sh_data['nilai_project'],0,',','.');
						echo $rupiah;
					echo "</td>";
					echo "<td>".$sh_data['nama_cc']."</td>";
					echo "<td>".$sh_data['order_ncx_ticares']."</td>";
					echo "<td>".$sh_data['nomor_kb_pks']."</td>";
					echo "<td>".$sh_data['nomor_kl']."</td>";
					echo "<td>".$sh_data['nama_am']." ".$sh_data['nomor_kontak_am']."</td>";
					echo "<td>".$sh_data['nama_mitra']."</td>";
					echo "<td>".$sh_data['pic_mitra']." ".$sh_data['no_pic_mitra']."</td>";
					echo "<td>".$sh_data['segmen']."</td>";
					echo "<td>";
						if($sh_data['tanggal_bast'] == "0000-00-00")
						{
							echo "";
						}
						else
						{
							$trans_date = explode("-",$sh_data['tanggal_bast']);
							$trans_done = $trans_date[2]."-".$trans_date[1]."-".$trans_date[0];
							echo $trans_done;
						}
					echo "</td>";
					echo "<td>".$sh_data['layanan']."</td>";
					echo "<td>".$sh_data['metode_pembayaran']."</td>";
					echo "<td>";
						if($sh_data['slg'] == "-")
						{
							echo $sh_data['slg'];
						}
						else
						{
							echo $sh_data['slg']."%";
						}
					echo "</td>";
					echo "<td>".$sh_data['mttr_recovery']."</td>";
					echo "<td>".$sh_data['mttr_respone']."</td>";
					echo "<td>".$sh_data['pic_penyerah']." (".$sh_data['nik_penyerah'].")</td>";
					echo "<td>".$sh_data['pic_penerima']." (".$sh_data['nik_penerima'].")</td>";
					echo "</tr>";
					$no++;
				}
			}
			?>
			</tbody>

		</table>
	</body>
</html>