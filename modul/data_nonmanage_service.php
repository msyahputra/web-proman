<div id="tabel_warp" class="text-white">
    <table id="tb_proman" class="table table-striped table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>No</th>
                <th>No. Kontrak</th>
				<th>Divisi / BUD</th>
                <th>Segmen</th>
				<th>Nama Corporate</th>
                <th>Nama Project</th>
                <th>Nama Produk</th>
				<th>SID</th>
                <th>Nama Mitra</th>
                <th>Status Handover</th>
            </tr>
        </thead>

        <tfoot class="bg-dark text-white text-center" style="">
            <tr>
               <th>No</th>
                <th>No. Kontrak</th>
				<th>Divisi / BUD</th>
                <th>Segmen</th>
				<th>Nama Corporate</th>
                <th>Nama Project</th>
                <th>Nama Produk</th>
				<th>SID</th>
                <th>Nama Mitra</th>
                <th>Status Handover</th>
            </tr>
        </tfoot>

        <?php
        $query_inventory_imes = mysqli_query($con, "select * from tb_inventory_imes where tipe_produk='Non Manage Service' order by no desc");
        $cek_inventory_imes = mysqli_num_rows($query_inventory_imes);

        if ($cek_inventory_imes <= 0) {
            echo "<tr class='bg-white'>";
            echo "<td colspan='15' align='center'>Tidak ada data yang di tampilkan !</td>";
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
                    echo "<td align='center'>" . $data_inventory['divisi_bud'] . "</td>";
                    echo "<td align='center'>" . $data_inventory['segmen'] . "</td>";
					echo "<td>" . $data_inventory['nama_corporate'] . "</td>";
                    echo "<td>" . $data_inventory['nama_projek'] . "</td>";
                    echo "<td>" . $data_inventory['produk'] . "</td>";
                    echo "<td>" . $data_inventory['sid'] . "</td>";
                    echo "<td>" . $data_inventory['nama_mitra'] . "</td>";
                    echo "<td>";
                    if (!empty($data_inventory['upload_size'])) {
                        echo "Available";
                    } else {
                        echo "Not Available";
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
        function() {
            $('#tb_proman').DataTable();
        }
    );
</script>