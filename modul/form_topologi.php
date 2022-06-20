<?php
if($_POST)
{
	include("modul/action/topologi_act.php");
}

if(!empty($_GET['project_qe']) && (!$_POST))
{
	$project_qe = $_GET['project_qe'];
	$act = $_GET['act'];
	$kategori = $_GET['kategori'];
}

if(!empty($_GET['act']) && $_GET['act'] == "Edit" && !empty($_GET['id_topologi']))
{
	$id_topologi = $_GET['id_topologi'];
	$topologi_edit = mysqli_query($con,"select * from tb_topologi where id_topologi = '".$id_topologi."'");
	$shdata = mysqli_fetch_array($topologi_edit);

	$id_topologi = $shdata['id_topologi'];
	$router_pe = $shdata['router_pe'];
	$interface_pe = $shdata['interface_pe'];
	$node_metro_1 = $shdata['node_metro_1'];
	$port_metro_1 = $shdata['port_metro_1'];
	$node_metro_2 = $shdata['node_metro_2'];
	$port_metro_2 = $shdata['port_metro_2'];
	$vcid = $shdata['vcid'];
	$vlan = $shdata['vlan'];
	$akses = $shdata['akses'];

}
?>
<div id="coating" style="">
	<div class="card w-50 container p-0 rounded border-dark" style="margin-top:30px;">

		<div class="card-head bg-dark text-white m-0 text-center">Topologi Eksisiting</div>

		<div class="card-body" id="card_body">

			<form action="index.php?link=form_topologiQE&project_qe=<?php echo $project_qe;?>&act=<?php echo $act;?>&kategori=<?php echo $kategori;?>" name="topo_form" method="POST">
				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Router PE</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="router_pe" placeholder="PE Name" class="form-control float-left col-4 mr-2" value="<?php echo !empty($router_pe) ? $router_pe : ""; ?>">
						<input type="text" name="interface_pe" placeholder="Interface PE Without Vlan" class="form-control float-left col-5" value="<?php echo !empty($interface_pe) ? $interface_pe : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['pe_interface']))
						{
							echo $error['pe_interface'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Node Metro A</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="node_metro_1" placeholder="Metro A Name" class="form-control float-left col-4 mr-2" value="<?php echo !empty($node_metro_1) ? $node_metro_1 : ""; ?>">
						<input type="text" name="port_metro_1" placeholder="Port Metro A Without Vlan" class="form-control float-left col-5" value="<?php echo !empty($port_metro_1) ? $port_metro_1 : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['metro1_alert']))
						{
							echo $error['metro1_alert'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Node Metro B</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="node_metro_2" placeholder="Metro B Name" class="form-control float-left col-4 mr-2" value="<?php echo !empty($node_metro_2) ? $node_metro_2 : ""; ?>">
						<input type="text" name="port_metro_2" placeholder="Port Metro B Without Vlan" class="form-control float-left col-5" value="<?php echo !empty($port_metro_2) ? $port_metro_2 : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['metro2_alert']))
						{
							echo $error['metro2_alert'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Vcid</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="vcid" placeholder="Vcid Number" class="form-control float-left col-9 mr-2" value="<?php echo !empty($vcid) ? $vcid : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['vcid']))
						{
							echo $error['vcid'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Vlan</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="vlan" placeholder="Vlan" class="form-control float-left col-9 mr-2" value="<?php echo !empty($vlan) ? $vlan : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['vlan']))
						{
							echo $error['vlan'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2">
					<div class="float-left col-3 p-2 text-right">Access</div>
					<div class="float-left col-1 p-2 text-center">:</div>
					<div class="float-left col-8 p-0" id="topo_form">
						<input type="text" name="akses" placeholder="Access" class="form-control float-left col-9 mr-2" value="<?php echo !empty($akses) ? $akses : ""; ?>">
					</div>
					<div style="position: absolute;left:660px;">
						<?php 
						if(!empty($error['akses']))
						{
							echo $error['akses'];
						}
						?>
					</div>
				</div>

				<div class="clearfix mb-2 text-center">
					<input type="submit" name="submit" value="Submit" class="btn btn-success" style="font-size:12px;width:100px;">
					<a href="index.php?link=detail_projectQE&dt_proman=<?php echo $project_qe;?>" class="btn btn-success" style="font-size:12px;width:100px;">Cancel</a>
				</div>
				<input type="hidden" name="id_topologi" value="<?php echo !empty($id_topologi) ? $id_topologi : "";?>" >
			</form>

		</div>

		<div class="card-footer bg-dark">
		</div>

	</div>
</div>