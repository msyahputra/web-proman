<?php
if(!empty($_GET['project_qe']))
{
	$project_qe = $_GET['project_qe'];
	$act = $_GET['act'];
	$kategori = $_GET['kategori'];
}

if(!empty($_POST['id_topologi']))
{
	$id_topologi = $_POST['id_topologi'];
}

$username = $_SESSION['username_pro'];
$tanggal = date("Y-m-d");
$router_pe = strtoupper($_POST['router_pe']);
$interface_pe = $_POST['interface_pe'];
$node_metro_1 = strtoupper($_POST['node_metro_1']);
$port_metro_1 = $_POST['port_metro_1'];
$node_metro_2 = strtoupper($_POST['node_metro_2']);
$port_metro_2 = $_POST['port_metro_2'];
$vcid = $_POST['vcid'];
$vlan = $_POST['vlan'];
$akses = $_POST['akses'];

$error = array();
$div1 = "<div class='bg-danger rounded text-white' style='font-size:10px;padding:11px;margin:0px;text-align:center'>";
$div2 = "</div>";
$simbol = "<p style='font-size:16px;padding:6px;margin:0px;width:40px;text-align:center' class='bg-danger rounded text-white'>!</p>";
$seru = $div1.$simbol.$div2;

if(empty($router_pe) || empty($interface_pe))
{
	$error['pe_interface'] = $simbol;
}
else
{
	$posisi = strpos($interface_pe,".");

	if($posisi == FALSE)
	{
		$input_var = $interface_pe;
	}
	else
	{
		$input_var = substr($interface_pe,"0",$posisi);
	}

	$last_char = substr($input_var,-1);

	if(!is_numeric($last_char))
	{
		$error['pe_interface'] = $div1."Format input Gi0/0/0 !".$div2;
	}
}

if(empty($node_metro_1) || empty($port_metro_1))
{
	$error['metro1_alert'] = $simbol;
}
else
{
	$posisi1 = strpos($port_metro_1,":");

	if($posisi1 == FALSE)
	{
		$input_var1 = $port_metro_1;
	}
	else
	{
		$input_var1 = substr($port_metro_1,"0",$posisi1);
	}

	$last_char1 = substr($input_var1,-1);

	if(!is_numeric($last_char1))
	{
		$error['metro1_alert'] = $div1."Format input 0/0/0 !".$div2;
	}
}

if(empty($node_metro_2) || empty($port_metro_2))
{
	$error['metro2_alert'] = $simbol;
}
else
{
	$posisi2 = strpos($port_metro_2,":");

	if($posisi2 == FALSE)
	{
		$input_var2 = $port_metro_2;
	}
	else
	{
		$input_var2 = substr($port_metro_2,"0",$posisi2);
	}

	$last_char2 = substr($input_var2,-1);

	if(!is_numeric($last_char2))
	{
		$error['metro2_alert'] = $div1."Format input 0/0/0 !".$div2;
	}
}

if(empty($vcid))
{
	$error['vcid'] = $simbol;
}
else
{
	if(!is_numeric($vcid))
	{
		$error['vcid'] = $div1."Numeric only !".$div2;
	}
}

if(empty($vlan))
{
	$error['vlan'] = $simbol;
}
else
{
	if(!is_numeric($vlan))
	{
		$error['vlan'] = $div1."Numeric only !".$div2;
	}
}

if(empty($akses))
{
	$error['akses'] = $simbol;
}


if(empty($error))
{
	if($act == "Input")
	{
		$query_no = mysqli_query($con,"select no from tb_topologi order by no desc limit 0,5");
		$cek_no = mysqli_num_rows($query_no);
		$data_no = mysqli_fetch_array($query_no);

		if($cek_no <= 0)
		{
			$no = 1;
		}
		else
		{
			$no = $data_no[0] + 1;
		}

		$id_topologi = $project_qe.date("Ymd").$no;

		$query_input_topologi = mysqli_query($con,"insert into tb_topologi set 	no = '".$no."',
																				id_topologi = '".$id_topologi."',
																				router_pe = '".$router_pe."',
																				interface_pe = '".$input_var."',
																				node_metro_1 = '".$node_metro_1."',
																				port_metro_1 = '".$input_var1."',
																				node_metro_2 = '".$node_metro_2."',
																				port_metro_2 = '".$input_var2."',
																				vcid = '".$vcid."',
																				vlan = '".$vlan."',
																				akses = '".$akses."',
																				username = '".$username."',
																				tanggal = '".$tanggal."'
			");

		if($query_input_topologi)
		{

			if($kategori == "eksisting")
			{
				$update_project_qe = mysqli_query($con,"update tb_project_qe set id_topologi_eksisting = '".$id_topologi."' where id_projectQE = '".$project_qe."'");

				if($update_project_qe)
				{
					?>
					<script type="text/javascript">
						alert("Topologi eksisting berhasil diinput !");
						document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Topologi eksisting gagal diinput !");
						document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
					</script>
					<?php
				}
			}

			if($kategori == "baru")
			{
				$update_project_qe = mysqli_query($con,"update tb_project_qe set id_topologi_baru = '".$id_topologi."' where id_projectQE = '".$project_qe."'");

				if($update_project_qe)
				{
					?>
					<script type="text/javascript">
						alert("Topologi baru berhasil diinput !");
						document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Topologi baru gagal diinput !");
						document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
					</script>
					<?php
				}
			}

		}
	}

	if($act == "Edit")
	{
		$query_update = mysqli_query($con,"update tb_topologi set 	router_pe = '".$router_pe."',
																	interface_pe = '".$input_var."',
																	node_metro_1 = '".$node_metro_1."',
																	port_metro_1 = '".$input_var1."',
																	node_metro_2 = '".$node_metro_2."',
																	port_metro_2 = '".$input_var2."',
																	vcid = '".$vcid."',
																	vlan = '".$vlan."',
																	akses = '".$akses."',
																	username = '".$username."',
																	tanggal = '".$tanggal."'
																	where id_topologi = '".$id_topologi."'");

		if($query_update)
		{
			?>
			<script type="text/javascript">
				alert("Topologi <?php echo $kategori;?> berhasil diupdate !");
				document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Topologi <?php echo $kategori;?> gagal diupdate !");
				document.location="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>";
			</script>
			<?php
		}
	}
}
?>