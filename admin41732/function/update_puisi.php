<?php
	include('koneksi.php');
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$asal_kota = $_POST['asal_kota'];
	$alamat_sekolah = $_POST['alamat_sekolah'];
	$judul =  $_POST['judul_puisi'];

		$query = mysql_query("UPDATE tbl_puisi SET nama = '$nama', tempat_lahir = '$tmp_lahir' , tgl_lahir = '$tgl_lahir' , alamat = '$alamat', 
							email = '$email', handphone = '$telp',
							asal_kota = '$asal_kota',alamat_sekolah = '$alamat_sekolah' , judul_puisi = '$judul'
							WHERE id_reg = '$id'") or die(mysql_error());
						
		if($query){
?>
			<script>
				var id = "<? echo $id;?>";
				alert('Data Registrasi Lomba Puisi berhasil di update..');
				document.location.href = "../data_registrasi.php?#tab04";
			</script>
<?			
		}else{
?>	
			<script>
				alert('Error, Data gagal di update..');
				document.location.href = "../data_registrasi.php?#tab04";
			</script>
<?				
		}
	