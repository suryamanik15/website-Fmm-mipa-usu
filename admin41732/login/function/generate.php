<?php
	include "koneksi.php";
	$username = $_POST['text_user'];
	
	$query = mysql_query("SELECT password FROM user WHERE username='$username'") or die(mysql_error());
	$num_rows = mysql_num_rows($query);
	if($num_rows > 0){
		$fetch = mysql_fetch_array($query);
		$pswd = $fetch['password']; 
?>
		<script language="javascript">
			var pswd = "<?php echo $pswd; ?>";
			var message = "Password anda adalah "+pswd;
			document.location.href="../forgot_pass.php?message="+message;
		</script>
<?php	
	}else{
?>	
		<script language="javascript">
			var err = "Maaf, password anda gagal di generate !!";
			document.location.href="../forgot_pass.php?err="+err;
		</script>
<?php
	}		
?>