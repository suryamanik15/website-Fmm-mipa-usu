<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	
	//cek keberadaan image di server
	$checkQ = mysql_query("SELECT * FROM gallery WHERE id_gal='$id'") or die(mysql_error());
	$fetch_image = mysql_fetch_array($checkQ);
	$image = $fetch_image['image'];
	$file1 = "../../image/content/".$image;
	$file2 = "../../image/content/thumbnail/".$image;
	
	if(file_exists($file1) && file_exists($file2)){
		$delete = unlink($file1) && unlink($file2);
	}
	$query_gal = mysql_query("SELECT judul_gal FROM gal WHERE id_gal='$id'") or die(mysql_error());
	$fetch = mysql_fetch_array($query_gal);
	$judul_gal = $fetch['judul_gal'];

	//Eksekusi perintah query
		$query = mysql_query("DELETE FROM gallery WHERE id_gal='$id'") or die(mysql_error());
	
		if($query){
?>
				<script language="javascript">
					var title_name = "<?php echo $judul_gal; ?>";
					alert("Image dari gallery yang berjudul "+title_name+" telah berhasil di hapus.");
					document.location.href="../tambah_image.php";
				</script>
<?php			
		}else{
?>
			<script language="javascript">
					alert("Data gagal di hapus !!");
					document.location.href="../tambah_image.php";
				</script>
<?php
		}			
?>