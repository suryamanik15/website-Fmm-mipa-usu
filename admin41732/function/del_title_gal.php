<?php
	include "koneksi.php";
	
	$id_gal = $_GET['id_gal'];
	
	$query = mysql_query("DELETE FROM gal WHERE id_gal='$id_gal'") or die(mysql_error());
	
	if($query){
?>
		<script language="javascript">
			var title = "<?php echo $fetch['id_gal']; ?>"
			alert('Judul Gallery dengan ID '+title+' berhasil di hapus.');
			document.location.href="../tambah_image.php"
		</script>
<?php
	}else{
?>
		<script language="javascript">
			alert('Judul Gallery gagal dihapus.');
			document.location.href="../tambah_image.php"
		</script>
<?php
	}		
?>