<?php
if($_POST)
{
	include("plugin/excel_reader/excel_reader2.php");
	include("modul/action/import_failover_act.php");
}
?>

<div class="card container p-0" style="border:none;width:800px;margin-top:15px;">
	<div class="card-header bg-dark text-white">
		Import data via excel
	</div>

	<div class="card-body text-center">
		<form name="import_form" action="index.php?link=import_failover" method="POST" enctype="multipart/form-data">
			<input type="file" name="import_excel" class="rounded border bg-white p-2" style="width:500px;">
			<input type="submit" name="submit" value="Import" class="btn btn-success" style="">
		</form>
		<a href="doc_file/format/import_failover.xls">Download File Format Here!</a>
	</div>

	<div class="card-footer bg-dark">

	</div>
</div>

<?php echo !empty($error['alert']) ? $error['alert'] : "";?>