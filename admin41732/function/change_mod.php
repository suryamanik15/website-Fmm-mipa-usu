<?
	include "koneksi.php";
	$id = $_POST['id'];
	$mode = $_POST['op_mode'];
	
	$query = mysql_query("UPDATE user SET status = '$mode' WHERE username = '$id'");
	
	if($query){
?>
		<script>
			var id = "<? echo $id;?>";
			alert("User dengan ID "+id+" telah aktif..");
			document.location.href="../upload_list.php";	
		</script>
<?		
	}else{
?>
		<script>
			alert("Error, terjadi pada proses query !!");
			document.location.href="../upload_list.php";	
		</script>
<?		
	}