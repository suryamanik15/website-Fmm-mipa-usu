<?
	include "koneksi.php";
	$id = $_GET['id'];
	
	$qc = mysql_query("SELECT * FROM tbl_upload WHERE id_reg = '$id'") or die(mysql_error());
	$fetch = mysql_fetch_object($qc);
	$fname = $fetch->image;
	
	$dir = "../../RPanel/files/upload/".$fname;
	
	// cek direktori file
	if(file_exists($dir)){
		unlink($dir);
	}	
	
	$query = mysql_query("DELETE FROM tbl_upload WHERE id_reg = '$id'");
	
	if($query){
?>	
		<script>
			alert('Data Upload telah dihapus');
			document.location.href="../data_registrasi.php#tab05";
		</script>
<?		
	}else{
?>
		<script>
			alert('Error, gagal dalam penghapusan data !!');
			document.location.href="../data_registrasi.php#tab05";
		</script>
<?	
	}
	