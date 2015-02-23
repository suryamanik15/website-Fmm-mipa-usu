<?php
	include "koneksi.php";
	include "resize-class.php";
	
	$judul = $_POST['judul_gal'];
	
	//File Image
	$file_name = $_FILES['image']['name'];
	$tmp_file = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$dir_tujuan = "../../image/content/".$file_name; //Set Direktori tujuan
	$id = ""; 
	
if($file_name != ""){	

			//proses pembuatan thumbnail
			$image = new SimpleImage(); 
			$image->load($tmp_file); 
			$image->resize(150,100); 
			$image->save('../../site/styles/thumbs/'.$file_name);

			//pembuatan image slider
			$image2 = new SimpleImage(); 
			$image2->load($tmp_file); 
			$image2->resize(650,350); 
			$image2->save('../../site/syles/image/'.$file_name);
			
			move_uploaded_file($tmp_file, $dir_tujuan);
			$queryCheck = mysql_query("SELECT max(id_gal) as 'max',judul_gal FROM gal WHERE judul_gal = '$judul'") or die(mysql_error());
			$fetch = mysql_fetch_array($queryCheck);
			$title = $fetch['judul_gal'];
			$maks = $fetch['max'];
			if($maks > 0){
				$id = $maks + 1;
			}else{
				$id = 1;
			}
			
			if($judul == $title){
				$sql = "INSERT INTO gallery(id_gal,image)values('$maks','$file_name')";
				$query = mysql_query($sql) or die(mysql_error());
			
			}else{
				$sql = "INSERT INTO gal(id_gal,judul_gal)values('$id','$judul')";
				$sql2 = "INSERT INTO gallery(id_gal,image)values('$id','$file_name')";
				$query = (mysql_query($sql) and mysql_query($sql2));
			}
			
			
			if($query){
				
?>
					<script language="javascript">
						var title = "<?php echo $judul; ?>";
						alert("Image gallery berjudul "+title+" berhasil di upload.");
						document.location.href="../tambah_image.php";
					</script>
<?php				
			}else{
?>
					<script language="javascript">
						alert("Data gagal di upload !!");
						document.location.href="../tambah_image.php";
					</script>
<?php
			}
	}else{
?>
		<script language="javascript">
			alert("File yang dicari tidak ada !!");
			document.location.href="../tambah_image.php";
	    </script>
<?php
	}	
?>