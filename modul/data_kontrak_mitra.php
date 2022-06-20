<div id="tabel_warp" class="text-white">
    <table id="tb_proman" class="table table-striped table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>No</th>
                <th>No. Kontrak</th>
                <th>Nama Corporate</th>
                <th>Segmen</th>
                <th>Nama Project</th>
                <th>Produk</th>
                <th>Mitra</th>
                <th>PIC Mitra</th>
                <th>Slg</th>
                <th>MTT Rec</th>
                <th>Akhir Kontrak</th>
                <th>Tanggal Nodin</th>
                <th>Document</th>
				<th>Status Kontrak</th>
            </tr>
        </thead>

        <tfoot class="bg-dark text-white text-center" style="">
            <tr>
                <th>No</th>
                <th>No. Kontrak</th>
                <th>Nama Corporate</th>
                <th>Segmen</th>
                <th>Nama Project</th>
                <th>Produk</th>
                <th>Mitra</th>
                <th>PIC Mitra</th>
                <th>Slg</th>
                <th>MTT Rec</th>
                <th>Akhir Kontrak</th>
                <th>Tanggal Nodin</th>
                <th>Document</th>
				<th>Status Kontrak</th>
            </tr>
        </tfoot>

        <?php
		$nama_mitra = $_GET['nama_mitra'];
        $query_inventory_imes = mysqli_query($con, "select * from tb_inventory_imes where nama_mitra='$nama_mitra' order by no desc");
        $cek_inventory_imes = mysqli_num_rows($query_inventory_imes);

        if ($cek_inventory_imes <= 0) {
            echo "<tr class='bg-white'>";
            echo "<td colspan='14' align='center'>Tidak ada data yang di tampilkan !</td>";
            echo "</tr>";
        } else {
        ?>
            <tbody style="background-color:#ffffff">
                <?php
                $no = 1;
                while ($data_inventory = mysqli_fetch_array($query_inventory_imes)) {
                    echo "<tr class=''>";
                    echo "<td align='center'>" . $no . "</td>";
                    echo "<td><a href='index.php?link=detail_inventory&dt_proman=" . $data_inventory['id_inventory'] . "'>" . $data_inventory['no_kl'] . "</a></td>";
                    echo "<td>" . $data_inventory['nama_corporate'] . "</td>";
                    echo "<td align='center'>" . $data_inventory['segmen'] . "</td>";
                    echo "<td>" . $data_inventory['nama_projek'] . "</td>";
                    echo "<td>" . $data_inventory['produk'] . "</td>";
                    echo "<td>" . $data_inventory['nama_mitra'] . "</td>";
                    echo "<td>" . $data_inventory['pic_mitra'] . " " . $data_inventory['kontak_pic_mitra'] . "</td>";
                    echo "<td>" . $data_inventory['slg'] . "</td>";
                    echo "<td align='center'>" . $data_inventory['mtt_rec'] . "</td>";
                    echo "<td>";
                    $n = explode("-", $data_inventory['akhir_kontrak']);
                    $format_fix = $n[2] . "-" . $n[1] . "-" . $n[0];

                    if ($data_inventory['akhir_kontrak'] == "0000-00-00") {
                        echo "-";
                    } else {
                        echo $format_fix;
                    }
                    echo "</td>";
                    echo "<td>";
                    $c = explode("-", $data_inventory['tgl_nodin']);
                    $format_fix_nodin = $c[2] . "-" . $c[1] . "-" . $c[0];

                    if (($data_inventory['tgl_nodin'] == "0000-00-00") or ($data_inventory['tgl_nodin'] == "")) {
                        echo "-";
                    } else {
                        echo $format_fix_nodin;
                    }
                    echo "</td>";
                    echo "<td>";
                    if (!empty($data_inventory['upload_size'])) {
                        echo "Available";
                    } else {
                        echo "Not Available";
                    }
                    echo "</td>";
					echo "<td align='center'>" . $data_inventory['status_kontrak'] . "</td>";
					
					
					
					
					
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
        function() {
            $('#tb_proman').DataTable();
        }
    );
</script>