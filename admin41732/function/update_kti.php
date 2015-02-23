<?php
	$id = mysql_real_escape_string($_GET['id']);
	$name = mysql_real_escape_string($_GET['name']);
	$sql = mysql_query("SELECT * FROM kti_list_member WHERE id_kti='$id' AND nama = '$name'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	
	$nama = $_POST['nama'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	
	// File
	$fname = $_FILES['img']['name'];
	$tmp = $_FILES['img']['tmp_name'];
	$dir = "../../RPanel/files/karya_tulis/".$data['image'];
	$new_dir = "../../RPanel/files/karya_tulis/".$fname;
	if(file_exists($dir)){
		unlink($dir);
	}
	
	$upload = move_uploaded_file($tmp, $new_dir);
	if($upload){
		$query = mysql_query("UPDATE kti_list_member SET nama = '$nama', tempat_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir' ,
						telp = '$telp', alamat = '$alamat', status = '$status', image = '$fname' WHERE id_kti = '$id' 
						AND nama = '$name'");
						
		if($query){
?>
			<script>
				var id = "<? echo $id;?>";
				alert('Data berhasil di update..');
				document.location.href = "../show_kti_detail.php?id="+id;
			</script>
<?			
		}else{
?>	
			<script>
				var id = "<? echo $id;?>";
				alert('Error, Data gagal di update..');
				document.location.href = "../show_kti_detail.php?id="+id;
			</script>
<?				
		}
	}else{
?>	
		<script>
				alert('Foto gagal di upload..');
				document.location.href = "../show_kti_detail.php?id="+id;
		</script>
<?		
	}	