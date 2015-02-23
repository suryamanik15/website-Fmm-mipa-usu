<?php
	include "koneksi.php";
	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash = md5($password);
	
	$query = mysql_query("UPDATE user SET username='$username', password='$hash' WHERE id_user='$id'") or die(mysql_error());
	
	if($query){
?>
		<script language="javascript">
			var id = "<?php echo $id; ?>";
			alert("Admin dengan ID "+id+ " berhasil di update !!");
			document.location.href="../daftar_admin.php";
		</script>
<?php		
	}else{
?>
		<script language="javascript">
			alert("Data gagal di update !!");
			document.location.href="../daftar_admin.php";
		</script>
<?php
	}		
?>