<?php
session_start();
date_default_timezone_set("Asia/Krasnoyarsk");
global $search_full, $showPage, $key_words, $tgl_permintaan_starts, $tgl_permintaan_ends, $key_1, $key_2;
include("koneksi.php");
include("plugin/sluggify.php");
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="icon_telkom.png">
    <script src="jQuery-3.3.1/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="Bootstrap-4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="Bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/tampilan.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="dist/summernote-lite.css">
    <script type="text/javascript" src="dist/summernote-lite.js"></script>
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/brands.css">
    <link rel="stylesheet" href="fontawesome/css/solid.css">
    <script type="text/javascript" src="popper/popper.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/exporting.js"></script>
    <script src="js/export-data.js"></script>
    <script src="js/accessibility.js"></script>
    <title>Problem Management</title>

    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        input[type="number"] {
            min-width: 50px;
        }
    </style>
</head>

<body class="p-0 m-0">

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
                if ($_SESSION['level_pro'] == 4 || $_SESSION['level_pro'] == 1) {
                ?>
                    <!--
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" >
						DATA PROBLEM
					</a>

					<div class="dropdown-menu" style="font-size:12px;">
						<a class="dropdown-item" href="index.php?link=data_problem">Data Problem</a>
						<a class="dropdown-item" href="index.php?link=form_data_problem">Add Problem</a>
						<a class="dropdown-item" href="index.php?link=rekap_data_problem">Rekap Data Problem</a>
					</div>
				</li>
				-->

                    <li class="nav-item" style="font-size:12px;">
                        <a class="nav-link text-white" href="index.php?link=data_pemenuhan_eos">
                            ALL DATA
                        </a>
                    </li>
                <?php
                }
                ?>

                <?php
                if ($_SESSION['level_pro'] == 4 || $_SESSION['level_pro'] == 1) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?link=form_pemenuhan_eos">
                            NEW INPUT
                        </a>
                    </li>

                    <li class="nav-item ">
                        <?php

                        if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] == 4 || $_SESSION['level_pro'] == 1) {
                            echo "<a class='nav-link text-white' href='index.php?link=rekap_pemenuhan_eos'>DB EOS</a>";
                        }

                        ?>
                    </li>

                <?php
                }
                ?>
                <li class="nav-item ">
                    <?php
                    if (!empty($_SESSION['level_pro']) && $_SESSION['level_pro'] == 4 || $_SESSION['level_pro'] == 1) {

                        echo "<a class='nav-link text-white' href='index.php?link=import_eos'>IMPORT DB EOS</a>";
                    }
                    ?>
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
        <div class="container-fluid">
            <br>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <?php
                include 'koneksi.php';
                $des_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_pemenuhan_eos where status_permintaan='Request on review'");
                $des_inventory_imes = mysqli_fetch_assoc($des_inventory_imes);
                // var_dump($des_inventory_imes['total']);
                ?>

                <!-- Earnings (Monthly) Card Example -->
                <a href="index.php?link=data_eos_request_on_review" style="text-decoration: none;">
                    <button class="col-sm col-md-4 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                            Request On Review</div>

                                        <div class="h1 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo $des_inventory_imes['total'];
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-5x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
                </button>


                <?php
                include 'koneksi.php';
                $dgs_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_pemenuhan_eos where status_permintaan='Accepted'");
                $dgs_inventory_imes = mysqli_fetch_assoc($dgs_inventory_imes);
                // var_dump($dgs_inventory_imes['total']);
                ?>
                <a href="index.php?link=data_eos_accepted" style="text-decoration: none;">
                    <button class="col-sm col-md-4 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">
                                            Accepted</div>

                                        <div class="h1 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo $dgs_inventory_imes['total'];
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-5x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
                </button>

                <?php
                include 'koneksi.php';
                $dbs_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_pemenuhan_eos where status_permintaan='Rejected'");
                $dbs_inventory_imes = mysqli_fetch_assoc($dbs_inventory_imes);
                // var_dump($dgs_inventory_imes['total']);
                ?>
                <a href="index.php?link=data_eos_rejected" style="text-decoration: none;">
                    <button class="col-sm col-md-4 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                            Rejected</div>

                                        <div class="h1 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo $dbs_inventory_imes['total'];
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-5x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
                </button>

            </div>

            <!-- Illustrations -->
            <!-- <div class="card shadow mw-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Kontrak</h6>
                </div>
                <br>
                <div class="row m-2">
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img src="image/web/contract.png" class="rounded float-left mr-3" alt="..." width="100" height="100">
                                        <div class="media-body">
                                            <h3 class="mt-4 mb-1">List Kontrak Mitra</h3>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <div id="tabel_warp" class="text-white">
                                    <table id="tb_proman" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-dark text-white text-center">
                                                <th>No</th>
                                                <th>Mitra Tekom Group & Non Telkom Group</th>
                                                <th>Jumlah Project</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="bg-dark text-white text-center" style="">
                                            <tr>
                                                <th>No</th>
                                                <th>Mitra Tekom Group & Non Telkom Group</th>
                                                <th>Jumlah Project</th>
                                            </tr>
                                        </tfoot>
                                        <?php
                                        $query_inventory_imes = mysqli_query($con, "select DISTINCT(nama_mitra),COUNT(nama_mitra) as total from tb_inventory_imes group by nama_mitra");
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
                                                ?>
                                                    <tr class=''>


                                                        <td align="center"><?php echo $no++; ?></td>
                                                        <td><?php echo $data_inventory['nama_mitra']; ?></td>
                                                        <td align="center">
                                                            <a href="data_kontrak_mitra.php?nama_mitra=<?= $data_inventory['nama_mitra']; ?>">
                                                                <?php echo $data_inventory['total'] ?>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php
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
                        </div>
                        <br>
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <div id="tabel_warp" class="text-white">
                                            <br>
                                            <table id="tb_proman" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="bg-dark text-white text-center">
                                                        <th>No</th>
                                                        <th>PIC Pengelola Assurance</th>
                                                        <th>Jumlah Kontrak</th>
                                                    </tr>
                                                </thead>

                                                <tfoot class="bg-dark text-white text-center" style="">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>PIC Pengelola Assurance</th>
                                                        <th>Jumlah Kontrak</th>
                                                    </tr>
                                                </tfoot>
                                                <?php
                                                $query_inventory_imes = mysqli_query($con, "select DISTINCT(pic_assurance),COUNT(pic_assurance) as total from tb_inventory_imes where pic_assurance in ('Service Operation','Service Assurance') group by pic_assurance");
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
                                                        ?>
                                                            <tr class=''>
                                                                <td align="center"><?php echo $no++; ?></td>
                                                                <td><?php echo $data_inventory['pic_assurance']; ?></td>
                                                                <td align="center">
                                                                    <a href="data_list_pengelola.php?pic_assurance=<?= $data_inventory['pic_assurance']; ?>">
                                                                        <?php echo $data_inventory['total'] ?>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php
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
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img src="image/web/contract.png" class="rounded float-left mr-3" alt="..." width="100" height="100">
                                        <div class="media-body">
                                            <h3 class="mt-4 mb-1">Kontrak to Review</h3>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <br>
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <div class="col-md-4">

                                            <a class="btn btn-block btn-lg btn-danger text-center" href="index.php?link=data_kontrak_expired">
                                                <h1 style="font-size:83px;">
                                                    <?php
                                                    include 'koneksi.php';
                                                    $des_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_inventory_imes where status_kontrak='Expired'");
                                                    $des_inventory_imes = mysqli_fetch_assoc($des_inventory_imes);
                                                    // var_dump($des_inventory_imes['total']);
                                                    ?>
                                                    <?php
                                                    echo $des_inventory_imes['total'];
                                                    ?>
                                                </h1>
                                                <span>Kontrak <br>Expired</span>
                                            </a>
                                        </div>

                                        <div class="col-md-4">
                                            <a class="btn btn-block btn-lg btn-success text-center" href="index.php?link=data_manage_service">
                                                <h1 style="font-size:83px;">
                                                    <?php
                                                    include 'koneksi.php';
                                                    $des_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_inventory_imes where tipe_produk='Manage Service'");
                                                    $des_inventory_imes = mysqli_fetch_assoc($des_inventory_imes);
                                                    // var_dump($des_inventory_imes['total']);
                                                    ?>

                                                    <?php
                                                    echo $des_inventory_imes['total'];
                                                    ?>


                                                </h1>
                                                <span>Kontrak <br>Manage Service</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-block btn-lg btn-primary text-center" href="index.php?link=data_nonmanage_service">
                                                <h1 style="font-size:83px;">
                                                    <?php
                                                    include 'koneksi.php';
                                                    $des_inventory_imes = mysqli_query($con, "select COUNT(*) as total from tb_inventory_imes where tipe_produk='Non Manage Service'");
                                                    $des_inventory_imes = mysqli_fetch_assoc($des_inventory_imes);
                                                    // var_dump($des_inventory_imes['total']);
                                                    ?>

                                                    <?php
                                                    echo $des_inventory_imes['total'];
                                                    ?>
                                                </h1>
                                                <span>Kontrak <br>Non Manage Service</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img src="image/web/contract.png" class="rounded float-left mr-3" alt="..." width="100" height="100">
                                        <div class="media-body">
                                            <h3 class="mt-4 mb-1">Jenis Project</h3>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <figure class="highcharts-figure w-100">
                                            <div id="container"></div>
                                            <!-- <p class="highcharts-description text-info">
                                                Pie charts are very popular for showing a compact overview of a
                                                composition or comparison. While they can be harder to read than
                                                column charts, they remain a popular choice for small datasets.
                                            </p> -->
            <!-- </figure>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
        <a href=""></a>
    </div>
    </div>


    <?php
    include 'koneksi.php';

    // Mengambil data dari form lalu ditampung didalam variabel
    // $status = "Expired";
    // $jam_sekarang         = date("Y-m-d H:i:s");


    // Merubah Status yang kontraknya sudah expired
    // mysqli_query($con, "UPDATE tb_inventory_imes SET status_kontrak='$status' WHERE status_kontrak='Active' AND jangka_waktu_akhir<'$jam_sekarang'");


    // 
    ?>


    <div class="bg-dark p-0 text-white text-center m-0" style="height: 3%">
        copyright <i class="fas fa-thumbs-up"></i> <i>Assurance Group</i> 2018
    </div>
</body>

<script type="text/javascript" src="fontawesome/js/fontawesome.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(
        function() {
            $('#tb_proman').DataTable();
        }
    );
</script>
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'JENIS PROJECT'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
                point: {
                    events: {
                        click: function() {
                            var point = this;

                            if (point.url) {
                                window.open(point.url);
                            } else if (point.series.userOptions.url) {
                                window.open(point.series.userOptions.url);
                            }
                        }
                    }
                }
            }
        },

        series: [{
            name: 'Jenis Project',
            colorByPoint: true,
            data: [{

                    <?php
                    include 'koneksi.php';
                    $cart_strategis = mysqli_query($con, "select DISTINCT(kategori_produk), COUNT(*) as total from tb_inventory_imes where kategori_produk='Strategis'");
                    $cart_strategis = mysqli_fetch_assoc($cart_strategis);
                    // var_dump($cart_strategis['total']);
                    ?>
                    name: '<?php echo $cart_strategis['kategori_produk'] ?>',
                    y: <?php echo $cart_strategis['total']; ?>,
                    sliced: true,
                    selected: true,
                    url: 'index.php?link=data_inventori_strategis'
                },
                {
                    <?php
                    include 'koneksi.php';
                    $cart_strategis = mysqli_query($con, "select DISTINCT(kategori_produk), COUNT(*) as total from tb_inventory_imes where kategori_produk='Non Strategis'");
                    $cart_strategis = mysqli_fetch_assoc($cart_strategis);
                    // var_dump($cart_strategis['total']);
                    ?>
                    name: '<?php echo $cart_strategis['kategori_produk'] ?>',
                    y: <?php echo $cart_strategis['total']; ?>,
                    url: 'index.php?link=data_inventori_nonstrategis'
                }
            ]
        }]
    });
</script> -->

</html>