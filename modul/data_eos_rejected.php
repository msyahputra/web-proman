<div id="tabel_warp" class="text-white">
    <table id="tb_proman" class="table table-striped table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>No</th>
                <th>No. Nodin</th>
                <th>Divisi / BUD / Treg</th>
                <th>Segmen / Witel</th>
                <th>Nama EOS</th>
                <th>Kategori Pemenuhan EOS</th>
                <th>Tanggal Nodin</th>
                <th>Status Permintaan</th>
                <th>Revenue Eksisting</th>
            </tr>
        </thead>

        <tfoot class="bg-dark text-white text-center" style="">
            <tr>
                <th>No</th>
                <th>No. Nodin</th>
                <th>Divisi / BUD / Treg</th>
                <th>Segmen / Witel</th>
                <th>Nama EOS</th>
                <th>Kategori Pemenuhan EOS</th>
                <th>Tanggal Nodin</th>
                <th>Status Permintaan</th>
                <th>Revenue Eksisting</th>
            </tr>
        </tfoot>

        <?php
        $query_inventory_imes = mysqli_query($con, "select * from tb_pemenuhan_eos where status_permintaan='Rejected' order by id desc");
        $cek_inventory_imes = mysqli_num_rows($query_inventory_imes);

        if ($cek_inventory_imes <= 0) {
            echo "<tr class='bg-white'>";
            echo "<td colspan='13' align='center'>Tidak ada data yang di tampilkan !</td>";
            echo "</tr>";
        } else {
        ?>
            <tbody style="background-color:#ffffff">
                <?php
                $no = 1;
                while ($data_inventory = mysqli_fetch_array($query_inventory_imes)) {
                    echo "<tr class=''>";
                    echo "<td align='center'>" . $no . "</td>";
                    echo "<td><a href='index.php?link=detail_inventory&dt_proman=" . $data_inventory['no_nodin'] . "'>" . $data_inventory['no_nodin'] . "</a></td>";
                    echo "<td align='center'>" . $data_inventory['lokasi_kerja'] . "</td>";
                    echo "<td align='center'>" . $data_inventory['segmen'] . $data_inventory['witel'] . "</td>";
                    echo "<td>" . $data_inventory['nama_eos'] . "</td>";
                    echo "<td>" . $data_inventory['kategori_pemenuhan_eos'] . "</td>";
                    echo "<td>" . $data_inventory['tgl_nodin'] . "</td>";
                    echo "<td>" . $data_inventory['status_permintaan'] . "</td>";
                    echo "<td>" . $data_inventory['revenue_eksisting'] . "</td>";
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