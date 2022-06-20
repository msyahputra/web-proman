<?php
	include("koneksi.php");
	$query = mysqli_query($con,"select * from tb_proman");

	$x = 0;
	while($sh_data = mysqli_fetch_array($query))
	{
		if(!empty($sh_data['DOC_NAME']))
		{
			$changing = substr($sh_data['DOC_NAME'],"9");

			echo $changing."<br>";
			$query_update = mysqli_query($con,"update tb_proman set DOC_NAME = '".$changing."' where ID_PROBLEM = '".$sh_data['ID_PROBLEM']."'");
			echo "<br>";
			$x++;
		}
	}
	echo $x;
?>