<?php
	include "koneksi.php";
	
	$id_pesan = $_GET['id_pesan'];
	
	$delete = mysql_query("DELETE FROM kontak WHERE id_pesan='$id_pesan'") or die(mysql_error());
	
	if($delete){
?>
		<script language="javascript">
			var id="<?php echo $id_pesan; ?>";
			alert('Pesan dengan ID '+id+' berhasil dihapus !!');
			document.location.href="../pesan.php";
		</script>
<?php
	}else{
?>
		<script language="javascript">
			alert('Maaf, gagal menghapus pesan !!');
			document.location.href="../pesan.php";
		</script>
<?php
	}
?>		