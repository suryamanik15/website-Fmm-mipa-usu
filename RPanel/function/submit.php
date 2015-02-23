<?php
	session_start();
	include "koneksi.php";
	$kategori = $_GET['lomba_kategori'];
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

	$userCheck = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = MD5('$password')") or die(mysql_error());
	
	if (mysql_num_rows($userCheck) == 1) {
		$row = mysql_fetch_array($userCheck);
		
		$_SESSION['id'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		?>
		<script>
			var kat = "<?php echo $kategori; ?>";
			alert("Login Berhasil!!");
			document.location.href = "./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
		</script>
		<?php
	} else {
		?>
		<script>
			var message = "<?php echo "Maaf, login gagal!"; ?>";
			var kat = "<? echo $kategori;?>";
			document.location.href="./index.php?View=User&Menu=MSC&lomba_kategori="+kat+"&message="+message;
		</script>
		<?php
	}
?>