<?
	
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$alamat_sekolah = $_POST['alamat_sekolah'];
	$kelas = $_POST['kelas'];
	$tingkat = $_POST['tingkat'];
	
	$update = mysql_query("UPDATE registrasi SET nama_peserta = '$nama', alamat = '$alamat', tempat_lahir = '$tmp_lahir', 
							telp = '$telp', email = '$email', asal_sekolah = '$asal_sekolah', alamat_sekolah = '$alamat_sekolah' ,
							kelas = '$kelas', tingkat = '$tingkat' WHERE id_registrasi = '$id'");
							
	if($update){
?>
		<script>
			var id = "<? echo $id; ?>";
			alert("Data dengan ID "+id+" telah di update..");
			document.location.href="../data_registrasi.php";
		</script>
<?		
	}else{
?>
		<script>
			alert("Error, update data registrasi gagal !!");
			document.location.href="../data_registrasi.php";
		</script>
<?	
	}	