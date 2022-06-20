<?php
session_start();
date_default_timezone_set("Asia/Krasnoyarsk");
global $search_full, $showPage, $key_words, $tgl_permintaan_starts, $tgl_permintaan_ends, $key_1, $key_2;
include("koneksi.php");
$failover_path = "doc_file/failover/";
$overhandle_path = "doc_file/overhandle/";
$problem_path = "doc_file/problem/";
$projectQE_path = "doc_file/projectQE/";
$inventory_path = "doc_file/inventory/";
$project_path = "doc_file/project_file/mom/";

if (empty($_SESSION['login_var'])) {
?>
    <script type="text/javascript">
        document.location = "login.php";
    </script>
<?php
}

if (!empty($_GET['petunjuk'])) {
    $petunjuk = $_GET['petunjuk'];
} else {
    $petunjuk = "";
}

?>
<html>

<head>
    <link rel="shortcut icon" href="icon_telkom.png">
    <script src="jQuery-3.3.1/jquery-3.3.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Bootstrap-4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="Bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/tampilan.css">
    <link rel="stylesheet" type="text/css" href="dist/summernote-lite.css">
    <script type="text/javascript" src="dist/summernote-lite.js"></script>
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/brands.css">
    <link rel="stylesheet" href="fontawesome/css/solid.css">
    <script type="text/javascript" src="popper/popper.min.js"></script>
    <title>Problem Management</title>
</head>

<body style="" class="p-0 m-0">

    <div id="main_menu">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="image/web/Logo_Sva.jpg" width="60px" class="rounded-circle">
            </a>

            <ul class="navbar-nav" style="font-size:12px;">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?link=home">HOME</a>
                </li>

                <?php
                if ($_SESSION['level_pro'] <= 2) {
                ?>
                    <!--
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
						DATA PROBLEM
					</a>

					<div class="dropdown-menu" style="font-size:12px;">
						<a class="dropdown-item" href="index.php?link=data_problem">Data Problem</a>
						<a class="dropdown-item" href="index.php?link=form_data_problem">Add Problem</a>
						<a class="dropdown-item" href="index.php?link=rekap_data_problem">Rekap Data Problem</a>
					</div>
				</li>
				-->

                    <li class="nav-item dropdown" style="font-size:12px;">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            OVERHANDLE
                        </a>

                        <div class="dropdown-menu" style="font-size:12px;">
                            <a class="dropdown-item" href="index.php?link=data_overhandle">Data Overhandle</a>
                            <a class="dropdown-item" href="index.php?link=form_overhandle">Add Overhandle</a>
                            <a class="dropdown-item" href="index.php?link=rekap_data_overhandle">Rekap Overhandle</a>
                        </div>
                    </li>
                <?php
                }
                ?>

                <?php
                if ($_SESSION['level_pro'] <= 3) {
                ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            FAILOVER
                        </a>

                        <div class="dropdown-menu" style="font-size:12px;">
                            <a class="dropdown-item" href="index.php?link=data_failover">Data Failover</a>
                            <a class="dropdown-item" href="index.php?link=form_failover">Add Failover</a>
                            <a class="dropdown-item" href="index.php?link=rekap_data_failover">Rekap Failover</a>
                            <?php
                            if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] == "1") {

                                echo "<a class='dropdown-item' href='index.php?link=import_failover'>Import Data</a>";
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            PROJECT QE
                        </a>

                        <div class="dropdown-menu" style="font-size:12px;">
                            <a class="dropdown-item" href="index.php?link=data_projectQE">Data Project QE</a>
                            <a class="dropdown-item" href="index.php?link=form_projectQE">Add Project QE</a>
                            <!--<a class="dropdown-item" href="index.php?link=rekap_projectQE">Rekap Project QE</a>-->
                        </div>
                    </li>

                <?php
                }
                ?>

                <?php
                if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= 1) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            MANAGE USER
                        </a>

                        <div class="dropdown-menu" style="font-size:12px;">
                            <a class="dropdown-item" href="index.php?link=data_user">Data User</a>
                            <a class="dropdown-item" href="index.php?link=daftar_user">Add User</a>
                            <a class="dropdown-item" href="index.php?link=reset_password">Reset Password</a>
                        </div>
                    </li>

                    <!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
						CONFIGURATION
					</a>

					<div class="dropdown-menu" style="font-size:12px;">
						<a class="dropdown-item" href="index.php?link=segment_konfig">Data Segment</a>
					</div>
				</li> -->
                <?php
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="data_project_nodin.php" id="navbardrop">
                        DATA PROJECT via NODIN
                    </a>

                    <!-- <div class="dropdown-menu" style="font-size:12px;">
						<a class="dropdown-item" href="index.php?link=data_inventory">Data Inventory</a>
						<?php
                        if ($_SESSION['level_pro'] <= 2) {
                        ?>
							<a class="dropdown-item" href="index.php?link=form_inventory">Add Inventory</a>
						<?php
                        }

                        if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= "2") {
                            echo "<a class='dropdown-item' href='index.php?link=rekap_inventory'>Rekap Inventory</a>";
                        }

                        if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] == "1") {

                            echo "<a class='dropdown-item' href='index.php?link=import_inventory'>Import Data</a>";
                        }
                        ?>

					</div> -->
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                        DATA PROJECT via PRIME
                    </a>

                    <div class="dropdown-menu" style="font-size:12px;">
                        <a class="dropdown-item" href="index.php?link=data_prime">Data Project</a>
                        <?php
                        if ($_SESSION['level_pro'] <= 2) {
                        ?>
                            <a class="dropdown-item" href="index.php?link=sinkronisasi_prime">Sinkronisasi Prime</a>
                        <?php
                        }

                        /*
						if(!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] <= "2")
						{
							echo "<a class='dropdown-item' href='index.php?link=rekap_inventory'>Rekap Inventory</a>";
						}
						
						if(!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] == "1")
						{
							
							echo "<a class='dropdown-item' href='index.php?link=import_inventory'>Import Data</a>";
						}
						*/
                        ?>

                    </div>
                </li>

            </ul>
        </nav>

        <div style="position:absolute;right:10;top:15" class="text-white">
            <?php
            echo "";
            echo "<i>" . $_SESSION['nama_pro'] . ", </i>";
            ?>
            <a href="logout.php" class="" style="color:#ffffff">Logout</a>
        </div>

    </div>

    <div id="konten" class="bg-info" style="height:89%;">
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
                $nama_mitra = $_GET['nama_mitra'];

                $query_inventory_imes = mysqli_query($con, "select * from tb_inventory_imes where nama_mitra='$nama_mitra' order by no desc");
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
                            echo "<td><a href='index.php?link=detail_inventory&dt_proman=" . $data_inventory['id_inventory'] . "'>" . $data_inventory['no_kl'] . "</a></td>";
                            echo "<td align='center'>" . $data_inventory['divisi_bud'] . "</td>";
                            echo "<td align='center'>" . $data_inventory['segmen'] . "</td>";
                            echo "<td>" . $data_inventory['nama_corporate'] . "</td>";
                            echo "<td>" . $data_inventory['nama_projek'] . "</td>";
                            echo "<td>" . $data_inventory['produk'] . "</td>";
                            echo "<td>" . $data_inventory['sid'] . "</td>";
                            echo "<td>" . $data_inventory['nama_mitra'] . "</td>";
                            echo "<td>" . $data_inventory['status_handcover'] . "</td>";
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
    </div>

    <div class="bg-dark p-0 text-white text-center m-0" style="height: 3%">
        copyright <i class="fas fa-thumbs-up"></i> <i>Assurance Group</i> 2018
    </div>
</body>

</html>
<script type="text/javascript" src="fontawesome/js/fontawesome.js"></script>
<script type="text/javascript">
    $(document).ready(
        function() {
            $('#tb_proman').DataTable();
        }
    );
</script>