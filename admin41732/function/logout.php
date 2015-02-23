<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	session_destroy();
?>
<script>
	document.location.href = "../login/login.php";
</script>