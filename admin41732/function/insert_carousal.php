<?php
	include "koneksi.php";
	include "resize-class.php";
	
	$nama_image = $_POST['image_name'];
	
	//File Image
	$file_name = $_FILES['img']['name'];
	$tmp_file = $_FILES['img']['tmp_name'];
	$file_size = $_FILES['img']['size'];
	//$dir_tujuan = "../../site/carousal/".$nama_image.".png"; //Set Direktori tujuan
	$id = ""; 
	
	//set the date
	$dt = getdate();
	$tgl_upload = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	
if($file_name != ""){	

			//proses pembuatan thumbnail
			$image = new SimpleImage(); 
			$image->load($tmp_file); 
			$image->resize(320,160); 
			$image->save('../../site/carousal/'.$nama_image.'.png');

			//pembuatan image slider
			/*$image2 = new SimpleImage(); 
			$image2->load($tmp_file); 
			$image2->resize(650,350); 
			$image2->save('../../image/content/slide/'.$file_name);*/
			
			//move_uploaded_file($tmp_file, $dir_tujuan);
			
			$queryCheck = mysql_query("SELECT MAX(id_carousal) as 'MAX' FROM image_carousal") or die(mysql_error());
			$fetch = mysql_fetch_object($queryCheck);
			$maks = $fetch->MAX;
			if($maks > 0){
				$id = $maks + 1;
			}else{
				$id = 1;
			}
			
			$query = mysql_query("INSERT INTO image_carousal VALUES('$id','$nama_image','$tgl_upload')");
			
			if($query){
				
?>
					<script language="javascript">
						var title = "<?php echo $judul; ?>";
						alert("Image carousal berjudul "+title+" berhasil di upload.");
						document.location.href="../tambah_image.php#tab03";
					</script>
<?php				
			}else{
?>
					<script language="javascript">
						alert("Error!, terjadi kesalahan proses upload !!");
						document.location.href="../tambah_image.php#tab03";
					</script>
<?php
			}
	}else{
?>
		<script language="javascript">
			alert("File yang dicari tidak ada !!");
			document.location.href="../tambah_image.php#tab03";
	    </script>
<?php
	}	
?>