<?
	include ('function/koneksi.php');
	$id = mysql_real_escape_string($_GET['id']);
	$sq = mysql_query("SELECT * FROM tbl_puisi WHERE id_reg = '$id'") or die(mysql_error());
	$fetch = mysql_fetch_object($sq);
	$img = $fetch->img_name;
	
	// check image link
	$dir = "../RPanel/files/lomba_puisi/".$img;
	if(file_exists($dir)){
		unlink($dir);
	}else{ /* do nothing*/}
	
	$delete = mysql_query("DELETE FROM tbl_puisi WHERE id_reg = '$id'") AND
						  mysql_query("DELETE FROM user WHERE username = '$id'");
	
	if($delete){
?>
		<script>
			var id = "<? echo $id; ?>";
			alert('Data registrasi dengan ID '+id+' telah dihapus..');
			document.location.href="data_registrasi.php#tab04";
		</script>
<?		
	}else{
?>	
		<script>
			alert('Error, gagal menghapus data..');
			document.location.href="data_registrasi.php#tab04";
		</script>
<?		
	}