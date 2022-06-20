<?php
session_start();
include("koneksi.php");
if($_POST)
{
	include("modul/action/login_act.php");
}
?>
<html>
	<head>
		<link rel="shortcut icon" href="icon_telkom.png">
		<script src="jQuery-3.3.1/jquery-3.3.1.js"></script>
		<link rel="stylesheet" type="text/css" href="Bootstrap-4.1.3/css/bootstrap.min.css">
		<script type="text/javascript" src="Bootstrap-4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/tampilan.css">

		<title>Management Problem</title>
	</head>
	<body class="bg-info" style="background-image: url('image/web/TL.jpg'); background-size: 100%; background-repeat: no-repeat">

	<img src="image/web/TLT2.jpg" width=100% height="100%" id="gambar" style="margin:0px; position: absolute; top:0; z-index:0">
		<div class="text-white" style="position: absolute; right:20"> 
		 	<div class="d-flex">
		 		<div class="text-right">
		 			<p style="border-bottom: solid thin white; font-size:35px" class="pb-0 mb-0">Assurance Group | SDA</p>
		 			<p style="font-size:45px" class="p-0 mt-0">PROBLEM MANAGEMENT</p>
		 		</div>

		 	</div>
		</div>

		<div class="rounded " style="position:absolute;margin:0px;padding:0px;top:30;left:100;opacity: 0.9;font-size: 12px;">
			<div style="border:#ffffff thin solid;padding: 10px;width: 300px;" class="rounded text-center">
				<h5 class="text-white" style="">LOGIN</h5>
					<?php
					if(!empty($error['cek']))
					{
						echo $error['cek'];
					}
					?>
					<form action="login.php" method="POST" class="text-right">
						<input type="text" name="username_proman" class="form form-control mb-2 text-center" placeholder="Username" value="">
						<input type="password" name="password_proman" class="form form-control mb-2 text-center" placeholder="Password" value="">
						<input type="submit" class="btn btn-success p-2" value="login" style="font-size: 12px">
					</form>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
	$('#gambar').bind('contextmenu', function(e){
    return false;
});
</script>