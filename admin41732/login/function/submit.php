<?php
	session_start();
	include "koneksi.php";
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

	$userCheck = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = MD5('$password')") or die(mysql_error());
	
	if (mysql_num_rows($userCheck) == 1) {
		$row = mysql_fetch_array($userCheck);
		
		$_SESSION['id'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		?>
		<script>
			var username = "<?php echo $username; ?>";
			alert("Login Berhasil!!");
			document.location.href = "../../index.php";
		</script>
		<?php
	} else {
		?>
		<script>
			var message = "<?php echo "Maaf, login gagal!"; ?>";
			document.location.href="../login.php?message="+message;
		</script>
		<?php
	}
?>