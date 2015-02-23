<?
	$id = mysql_real_escape_string($_GET['id']);
	
	$query = mysql_query("DELETE FROM registrasi WHERE id_registrasi = '$id'");
	
	if($query){
?>
		<script>
			var id = "<? echo $id;?>";
			alert("Data dengan ID "+id+" telah dihapus.");
			document.location.href="data_registrasi.php";
		</script>
<?		
	}else{
?>		
		<script>
			alert("Error query, data gagal dihapus !!");
			document.location.href="data_registrasi.php";
		</script>
		
<?	
	}