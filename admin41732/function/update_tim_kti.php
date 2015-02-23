<?php
	$id = mysql_real_escape_string($_GET['id']);
	
	$nama = $_POST['nama_tim'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$email = $_POST['emil'];

	if($upload){
		$query = mysql_query("UPDATE tbl_kti SET nama_tim = '$nama', asal_sekolah = '$asal_sekolah' ,
							email = '$email'  WHERE id_kti = '$id' ");
						
		if($query){
?>
			<script>
				var id = "<? echo $id;?>";
				alert('Data berhasil di update..');
				document.location.href = "../data_registrasi.php?#tab02";
			</script>
<?			
		}else{
?>	
			<script>
				var id = "<? echo $id;?>";
				alert('Error, Data gagal di update..');
				document.location.href = "../data_registrasi.php?#tab02";
			</script>
<?				
		}
	}else{
?>	
		<script>
				alert('Foto gagal di upload..');
				document.location.href = "../data_registrasi.php?#tab02";
		</script>
<?		
	}	