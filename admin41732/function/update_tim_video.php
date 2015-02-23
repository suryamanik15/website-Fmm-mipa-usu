<?php
	$id = $_POST['id_reg'];
	$nama = $_POST['nama_tim'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$email = $_POST['emil'];
	$judul =  $_POST['judul_lagu'];

	if($upload){
		$query = mysql_query("UPDATE tim_video SET nama_tim = '$nama', asal_sekolah = '$asal_sekolah' , judul_lagi = '$judul' ,
							email = '$email'  WHERE id_tim = '$id' ");
						
		if($query){
?>
			<script>
				var id = "<? echo $id;?>";
				alert('Data Tim Video berhasil di update..');
				document.location.href = "../data_registrasi.php?#tab03";
			</script>
<?			
		}else{
?>	
			<script>
				var id = "<? echo $id;?>";
				alert('Error, Data gagal di update..');
				document.location.href = "../data_registrasi.php?#tab03";
			</script>
<?				
		}
	}else{
?>	
		<script>
				alert('Foto gagal di upload..');
				document.location.href = "../data_registrasi.php?#tab03";
		</script>
<?		
	}	