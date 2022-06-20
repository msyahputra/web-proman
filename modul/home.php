<div class="bg-info w-100 h-100 border border-dark m-0 p-0">
	<div id="welcome_screen" class="container text-center">
		
			<h3 id="imes_text">PROBLEM MANAGEMENT</h3>
			<hr id="garis_text">
			<p id="sva_text">Service Assurance</p>
			<p id="sva_text">DIVISI ENTERPRISE SERVICE TELKOM</p>
		
	</div>
<!--
	<div class="clearfix container text-center p-0" style="width:330px">
		<div class="card border border-dark text-center float-left text-info" style="width:100px;margin-right:10px">
			<div class="card-head bg-dark text-white">
				On Progress
			</div>
			<div class="card-body">
				<?php
				$query_on_progress = mysqli_query($con,"select count(*)  AS JumDataPro from tb_proman where STATUS = 'On Progress'");
				$sh_on_progress = mysqli_fetch_array($query_on_progress);

				echo "<a href='index.php?link=data_problem&petunjuk=OnProgress'><h2><b>".$sh_on_progress['JumDataPro']."</b></h2></a>";
				?>
			</div>
		</div>

		<div class="card border border-dark text-center float-left text-danger" style="width:100px;margin-right:10px">
			<div class="card-head bg-dark text-white">
				Pending
			</div>
			<div class="card-body">
				<?php
				$query_pending = mysqli_query($con,"select count(*)  AS JumDataPen from tb_proman where STATUS = 'Pending'");
				$sh_pending = mysqli_fetch_array($query_pending);

				echo "<a href='index.php?link=data_problem&petunjuk=Pending'><h2><b>".$sh_pending['JumDataPen']."</b></h2></a>";
				?>
			</div>
		</div>

		<div class="card border border-dark text-center float-left text-success" style="width:100px;margin-right:0px">
			<div class="card-head bg-dark text-white">
				Close
			</div>
			<div class="card-body">
				<?php
				$query_close = mysqli_query($con,"select count(*)  AS JumDataClo from tb_proman where STATUS = 'Close'");
				$sh_close = mysqli_fetch_array($query_close);

				echo "<a href='index.php?link=data_problem&petunjuk=Close'><h2><b>".$sh_close['JumDataClo']."</b></h2></a>";
				?>
			</div>
		</div>
	</div>
-->

</div>