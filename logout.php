<?php
session_start();
unset($_SESSION['username_pro']);
unset($_SESSION['level_pro']);
unset($_SESSION['nama_pro']);
unset($_SESSION['user_status_pro']);
unset($_SESSION['login_var']);
?>
<script type="text/javascript">
	document.location="index.php";
</script>