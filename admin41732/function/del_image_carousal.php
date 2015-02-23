<?php
	include "koneksi.php";
	$id = mysql_real_escape_string($_GET['id']);
	
	$qcheck = mysql_query("SELECT * FROM image_carousal WHERE id_carousal = '$id'") or die(mysql_error());
	$fetch = mysql_fetch_object($qcheck);
	
	$image_name = $fetch->image_name;
	$dirpath = "../../site/carousal/".$image_name.".png";
	
	if(file_exists($dirpath)){
		unlink($dirpath);
	}
	
	$query = mysql_query("DELETE FROM image_carousal WHERE id_carousal = '$id'");
	
	if($query){
?>
		<script>
			var id = "<?php echo $id; ?>";
			alert('Image Carousal dengan ID '+id+' telah dihapus..');
			document.location.href="../tambah_image.php#tab03";
		</script>
<?php		
	}else{
?>	
		<script>
			alert('Error menghapus data image');
			document.location.href="../tambah_image.php#tab03";
		</script>
<?		
	}