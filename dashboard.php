<?php
$query_on_progress = mysqli_query($con,"select count(*)  AS JumDataPro from tb_proman");
$sh_on_progress = mysqli_fetch_array($query_on_progress);
echo $sh_on_progress['JumDataPro'];
?>