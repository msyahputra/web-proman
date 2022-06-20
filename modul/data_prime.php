<div id="tabel_warp">
	<div class="container p-0" style="width: 60%">
		<form class="d-flex" action="index.php?link=data_prime&cari=yes" method="POST">
			<?php
			if (!empty($_GET['cari'])) {

				$customer_s = $_POST['customer_s'];
				$mitra_s = $_POST['mitra_s'];
				$segmen_s = $_POST['segmen_s'];

				if (!empty($customer_s)) {
					$w_cust = " AND NAMA_CUSTOMER = '" . $customer_s . "'";
				} else {
					$w_cust = " ";
				}

				if (!empty($mitra_s)) {
					$w_mitra = " AND NAMA_MITRA = '" . $mitra_s . "'";
				} else {
					$w_mitra = " ";
				}


				if (!empty($segmen_s)) {
					$w_segment = " AND SEGMENT = '" . $segmen_s . "'";
				} else {
					$w_segment = " ";
				}

				$query_s = $w_cust . $w_mitra . $w_segment;
			} else {
				$query_s = "";
			}

			$query_nama_cust = mysqli_query($con, "select distinct(NAMA_CUSTOMER) from data_prime group by NAMA_CUSTOMER");
			echo "<select class='form-control ml-2' name='customer_s' style='width:30%'>";
			echo "<option value=''>Customer</option>";
			while ($sh_cust = mysqli_fetch_array($query_nama_cust)) {
				if (!empty($customer_s) && $customer_s == $sh_cust['NAMA_CUSTOMER']) {
					$cust_show = " selected ";
				} else {
					$cust_show = '';
				}

				echo "<option value='" . $sh_cust['NAMA_CUSTOMER'] . "' " . $cust_show . ">";
				echo $sh_cust['NAMA_CUSTOMER'];
				echo "</option>";
			}
			echo "</select>";

			$query_mitra_cust = mysqli_query($con, "select distinct(NAMA_MITRA) from data_prime group by NAMA_MITRA");
			echo "<select class='form-control ml-2' name='mitra_s' style='width:30%'>";
			echo "<option value=''>Mitra</option>";
			while ($sh_mitra = mysqli_fetch_array($query_mitra_cust)) {
				if (!empty($mitra_s) && $mitra_s == $sh_mitra['NAMA_MITRA']) {
					$mitra_show = " selected ";
				} else {
					$mitra_show = "";
				}

				echo "<option value='" . $sh_mitra['NAMA_MITRA'] . "' " . $mitra_show . ">";
				echo $sh_mitra['NAMA_MITRA'] . "<br>";
				echo "</option>";
			}
			echo "</select>";

			$query_segment_cust = mysqli_query($con, "select distinct(SEGMENT) from data_prime group by SEGMENT");
			echo "<select class='form-control ml-2' name='segmen_s' style='width:30%'>";
			echo "<option value=''>Segmen</option>";
			while ($sh_seg = mysqli_fetch_array($query_segment_cust)) {
				if (!empty($segmen_s) && $segmen_s == $sh_seg['SEGMENT']) {
					$segment_show = " selected ";
				} else {
					$segment_show = "";
				}

				echo "<option value='" . $sh_seg['SEGMENT'] . "' " . $segment_show . ">";
				echo $sh_seg['SEGMENT'] . "<br>";
				echo "</option>";
			}
			echo "</select>";

			echo "<input type='submit' name='Search' value='Search' class='btn btn-danger'>";
			?>
		</form>
	</div>
	<div style="width: 98%">
		<table id="tb_proman" class="table table-bordered">
			<thead>
				<tr class="bg-dark text-white">
					<th>No</th>
					<th style="width: 200px">SPK</th>
					<th>Nama Customer</th>
					<th>Segmen</th>
					<th>Nama Project</th>
					<th style="width: 100px">Nilai Pekerjaan</th>
					<th>Mitra</th>
					<th>PIC Mitra</th>
					<th>SLA</th>
					<th>MTTR Rec</th>
				</tr>
			</thead>
			<tbody style="background-color:#ffffff">
				<?php

				$query_prime = mysqli_query($con, "select * from data_prime where ID_DATA is not null " . $query_s . "");
				$cek_prime = mysqli_num_rows($query_prime);

				if ($cek_prime <= 0) {
					echo "<tr><td colspan='11' align='center'>Tidak ada data yang dapat ditampilkan !</td></tr>";
				} else {
					$no = 1;
					while ($sh_prime = mysqli_fetch_array($query_prime)) {
						$hasil_rupiah = "Rp " . number_format((float)$sh_prime['NILAI_PEKERJAAN'], 2, ',', '.');
						echo "<tr>";
						echo "<td class='text-center'>" . $no . "</td>";
						echo "<td>";
						echo "<a href='index.php?link=detail_project&keys=" . $sh_prime['ID_DATA'] . "'>";
						echo $sh_prime['NO_P8'];
						echo "</a>";
						echo "</td>";
						echo "<td>" . $sh_prime['NAMA_CUSTOMER'] . "</td>";
						echo "<td>" . $sh_prime['SEGMENT'] . "</td>";
						echo "<td style='width:500px'>" . $sh_prime['NAMA_PEKERJAAN'] . "</td>";
						echo "<td>" . $hasil_rupiah . "</td>";
						echo "<td>" . $sh_prime['NAMA_MITRA'] . "</td>";
						echo "<td>" . $sh_prime['PIC_MITRA'] . "</td>";
						echo "<td>" . $sh_prime['SLA'] . "</td>";
						echo "<td>" . $sh_prime['MTTR_RECOVERY'] . "</td>";
						echo "</tr>";
						$no++;
					}
				}

				?>
			</tbody>
		</table>
	</div>
</div>