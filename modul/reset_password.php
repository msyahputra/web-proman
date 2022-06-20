<?php
if($_POST)
{
	include("modul/action/reset_password_act.php");
}
?>
<div id="wrapper" style="margin-top:10px">
	<div id="form_wrap">
		<div class="card container w-50 p-0" style="border:none">
			<div class="card-header bg-warning">
				<div class="clearfix">
					<div class="float-left m-0 p-0 col-6">
						RESET PASSWORD
					</div>
					<div class="float-left m-0 p-0 col-6 text-right">
						<?php echo !empty($error['alert']) ? $error['alert'] : "";?>
					</div>
				</div>
			</div>

			<div class="card-body">
				<form action="index.php?link=reset_password" method="POST">

					<div class="clearfix w-100 mb-2">
						<div class="float-left m-0 col-3 p-1">
							NIK / ID Perner
						</div>
						<div class="float-left m-0 col-1 p-1">
							:
						</div>
						<div class="float-left m-0 col-8">
							<input type="text" name="nik_id" class="form form-control" value="<?php if(!empty($nik_id)){echo $nik_id;}?>">
						</div>
					</div>


					<div class="clearfix w-100 mb-2">
						<div class="float-left m-0 col-3 p-1">
							Username
						</div>
						<div class="float-left m-0 col-1 p-1">
							:
						</div>
						<div class="float-left m-0 col-8">
							<input type="text" name="username" class="form form-control" value="<?php if(!empty($username)){echo $username;}?>">
						</div>
					</div>

					<div class="clearfix w-100 mb-2">
						<div class="float-left m-0 col-3 p-1">
							New Password
						</div>
						<div class="float-left m-0 col-1 p-1">
							:
						</div>
						<div class="float-left m-0 col-8">
							<input type="password" name="new_password" class="form form-control" value="">
						</div>
					</div>

					<div class="clearfix w-100 mb-2">
						<div class="float-left m-0 col-3 p-1">
							Retype New Password
						</div>
						<div class="float-left m-0 col-1 p-1">
							:
						</div>
						<div class="float-left m-0 col-8">
							<input type="password" name="re_password" class="form form-control" value="">
						</div>
					</div>

					<div class="w-100 text-right">
						<a href="index.php?link=data_user" class="btn btn-success" style="width:80px;">Cancel</a>
						<input type="submit" name="submit" value="Reset" class="btn btn-danger" style="width:80px;">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>