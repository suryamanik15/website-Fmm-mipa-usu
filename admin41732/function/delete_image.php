<?php

	include "koneksi.php";
	
	$img_name = $_GET['img'];
	
	$query_select = mysql_query("SELECT * FROM gallery 	WHERE image='$img_name'") or die(mysql_error());
	$select_fetch = mysql_fetch_array($query_select);
	$image = $select_fetch['image'];
	
	$file1 = "../../image/content/".$image;
	$file2 = "../../image/content/thumbnail/".$image;
	$file3 = "../../image/content/slide/".$image;
	
	if(file_exists($file1) && file_exists($file2) && file_exists($file3)){
		
		$delete = unlink($file1) and unlink($file2) and unlink($file3);

		if($delete){
		
			$query = mysql_query("DELETE FROM gallery WHERE image='$img_name'");
			
			if($query){
?>
				<script language="javascript">
					var img = "<?php echo $image; ?>";
					alert("Image dengan nama "+img+" berhasil di hapus !!");
					document.location.href="../tambah_image.php#tab02";
				</script>
<?php			
			}else{
?>			
				<script language="javascript">
					alert("Data image pada database gagal terhapus !!");
					document.location.href="../tambah_image.php#tab02";
				</script>	
<?php			
			}
			
		}else{
?>
				<script language="javascript">
					alert("Image gagal di hapus !!");
					document.location.href="../tambah_image.php#tab02";
				</script>
		
<?php		
		}
		
	
	}

?>