<?php
	include "koneksi.php";
	
	$title = $_GET['title'];
	$id = "";
	
	$query_check = mysql_query("SELECT max(id_gal) as 'max' FROM gal") or die(mysql_error());
	$fetch = mysql_fetch_array($query_check);
	if($fetch['max'] > 0){
		$id = $fetch['max'] + 1;
	}else{
		$id = 1;
	}
	
	$query = mysql_query("INSERT INTO gal(id_gal,judul_gal)VALUES('$id','$title')") or die(mysql_error());
	
	if($query){
?>
		<script language="javascript">
			var title = "<?php echo $title; ?>";
			alert("Judul Gallery dengan judul '"+title+"' berhasil ditambah.");
			document.location.href="../tambah_image.php";
		</script>
<?php
	}else{
?>		
		<script language="javascript">
			alert("Judul Gallery gagal ditambah.");
			document.location.href="../tambah_image.php";
		</script>
<?php
	}
?>		