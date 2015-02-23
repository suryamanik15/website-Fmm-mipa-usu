<?php
	$id = mysql_real_escape_string($_GET['id']);
	$name = mysql_real_escape_string($_GET['name']);
	$sql = mysql_query("SELECT * FROM vid_list_member WHERE id_tim='$id' AND nama = '$name'") or die(mysql_error());
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
	$dir = "../../RPanel/files/video_lagu/".$data['img_name'];
	$new_dir = "../../RPanel/files/video_lagu/".$fname;
	
	if(file_exists($dir)){
		unlink($dir);
	}
	
	$upload = move_uploaded_file($tmp, $new_dir);
	if($upload){
		$query = mysql_query("UPDATE vid_list_member SET nama = '$nama', tempat_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir' ,
						telp = '$telp', alamat = '$alamat', status = '$status', img_name = '$fname' WHERE id_tim = '$id' 
						AND nama = '$name'");
						
		if($query){
?>
			<script>
				var id = "<? echo $id;?>";
				alert('Data berhasil di update..');
				document.location.href = "../show_vid_detail.php?id="+id;
			</script>
<?			
		}else{
?>	
			<script>
				alert('Error, Data gagal di update..');
				document.location.href = "../data_registrasi.php#tab03;
			</script>
<?				
		}
	}else{
?>	
		<script>
				var id = "<? echo $id;?>";
				alert('Foto gagal di upload..');
				document.location.href = "../edit_vid.php?id="+id+"&mode=ind";
		</script>
<?		
	}	