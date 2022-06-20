<?php
if(!empty($_GET['act']))
{
	$act = $_GET['act'];
}

$id_problem = $_POST['key'];

if(!empty($_POST['key_1']))
{
	$doc_size = $_POST['key_1'];
}

if(!empty($_POST['key_2']))
{
	$doc_name = $_POST['key_2'];
}

$username = $_SESSION['username_pro'];

if($act == "input_file")
{
	$update_info = str_replace("'"," ",$_POST['update_progress']);
	
	$update_date = date("Y-m-d");
	$jam = date("H:i:s");

	$data_norut = mysqli_query($con,"select NO from tb_update_proman order by NO desc limit 0,5");
	$cek_norut = mysqli_num_rows($data_norut);
	$sh_norut = mysqli_fetch_array($data_norut);
	if($cek_norut <= 0)
	{
		$no = 1;
	}
	else
	{
		$no = $sh_norut[0] + 1;
	}

	$id_update_proman = $id_problem."-".$no;

	$query_update = mysqli_query($con,"insert into tb_update_proman set 	NO = '".$no."', 
																			ID_UPDATE_PROMAN = '".$id_update_proman."',
																			ID_PROBLEM = '".$id_problem."',
																			UPDATE_INFO = '".$update_info."',
																			UPDATE_DATE = '".$update_date."',
																			USERNAME = '".$username."',
																			JAM = '".$jam."'");
	if($query_update)
	{
		$query_proman = mysqli_query($con,"update tb_proman set LAST_UPDATE = '".$update_date."' where ID_PROBLEM = '".$id_problem."'");

		if($query_proman)
		{
			?>
			<script type="text/javascript">
				alert("Data Behasil di simpan !");
				document.location="index.php?link=detail_problem&dt_proman=<?php echo $id_problem;?>&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data proman gagal di update !");
				document.location="index.php?link=data_problem&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Data proman gagal di simpan !");
			document.location="index.php?link=data_problem&petunjuk=<?php echo $petunjuk;?>";
		</script>
		<?php
	}
}

if($act == "delete_file")
{
	$delete_query = mysqli_query($con,"delete from tb_proman where ID_PROBLEM = '".$id_problem."'");

	if($delete_query)
	{
		if($doc_size > 0)
		{
			unlink($doc_name);
		}
		
		$delete_update_query = mysqli_query($con,"delete from tb_update_proman where ID_PROBLEM = '".$id_problem."'");

		if($delete_update_query)
		{
			?>
			<script type="text/javascript">
				alert("Data berhasil di hapus !");
				document.location="index.php?link=data_problem&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Data update progress gagal di hapus !");
				document.location="index.php?link=data_problem&petunjuk=<?php echo $petunjuk;?>";
			</script>
			<?php
		}
		
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Data gagal di hapus !");
			document.location="index.php?link=detail_problem&id_problem=<?php echo $id_problem;?>&petunjuk=<?php echo $petunjuk;?>";
		</script>
		<?php
	}
}
?>