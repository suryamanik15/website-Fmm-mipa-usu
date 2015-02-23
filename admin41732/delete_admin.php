<?php
	include "function/koneksi.php";
	
	$id = $_GET['id'];
	
	$query = mysql_query("DELETE FROM user WHERE id_user='$id'") or die(mysql_error());
	if($query){
?>
		<script language="javascript">
			var id = "<?php echo $id; ?>";
			alert("Data Admin dengan ID User "+id+" berhasil dihapus.");
			document.location.href="daftar_admin.php";
		</script>
<?php
	}else{
?>
		<script language="javascript">
			var id = "<?php echo $id; ?>";
			alert("Data Admin dengan ID User "+id+" gagal dihapus, silahkan coba lagi !!");
			document.location.href="daftar_admin.php";
		</script>
<?php
	}
?>