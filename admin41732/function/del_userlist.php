<?
	include "koneksi.php";
	
	$id = $_GET['id'];
	
	$query = mysql_query("DELETE FROM userlist WHERE username = '$id'");
	
	if($query){
?>
		<script>
			var id = "<? echo $id; ?>";
			alert("Data Userlist dengan ID "+id+" telah dihapus.");
			document.location.href="../data_registrasi.php#tab06";
		</script>
<?		
	}else{
?>
		<script>
			alert("Error, pada query database !!");
			document.location.href="../data_registrasi.php#tab06";
		</script>
<?	
	}