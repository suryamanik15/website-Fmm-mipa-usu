<?php
	include "koneksi.php";
	
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$pemosting = $_POST['pemosting'];
	$isi = $_POST['isi'];
	$today = getdate(); // Fungsi untuk mengambil tanggal aktual (current date)
	$date = $today['year']."-".$today['mon']."-".$today['mday'];
	$waktu = $today['hours'].":".$today['minutes'].":".$today['seconds'];
	$kategori = $_POST['kategori'];
	
	//untuk mendapatkan data image
	$queryCheck = mysql_query("SELECT * FROM posting WHERE id_posting='$id'") or die(mysql_error());
	$fetch = mysql_fetch_array($queryCheck);
	$file = "../tmp/upload/".$fetch['image'];
	
	if(file_exists($file)){ // mengecek apakah keberadaan file masih ada
		$hapus = unlink($file); //hapus file tersebut
	}
	
	//File Image
	$file_name = $_FILES['image']['name'];
	$tmp_file = $_FILES['image']['tmp_name'];
	$dir_tujuan = "../tmp/upload/".$file_name; //Set Direktori tujuan
	
	if($file_name != ""){
		move_uploaded_file($tmp_file, $dir_tujuan);
		
		$query = mysql_query("UPDATE posting SET judul_posting='$judul',pemosting='$pemosting',isi='$isi',tanggal_posting='$date',`waktu`='$waktu',kategori='$kategori',image='$file_name' WHERE id_posting='$id'") or die(mysql_error());
		
		if($query){
?>
			<script language="javascript">
				var id_data = "<?php echo $id; ?>";
				alert("Data Postingan dengan id "+id_data+" berhasil di edit.");
				document.location.href="../index.php";
			</script>
<?php
		}else{
?>
			  
			<script language="javascript">
				var id_data = "<?php echo $id; ?>";
				alert("Data Postingan dengan id "+id_data+" gagal di edit.");
				document.location.href="../index.php";
			</script>
<?php
		}		
	}else{
		$query = mysql_query("UPDATE posting SET judul_posting='$judul',pemosting='$pemosting',isi='$isi',tanggal_posting='$date',`waktu`='$waktu',kategori='$kategori' WHERE id_posting='$id'") or die(mysql_error());
		
		if($query){
?>
		
			<script language="javascript">
				var id_data = "<?php echo $id; ?>";
				alert("Data Postingan dengan id "+id_data+" berhasil di edit.");
				document.location.href="../index.php";
			</script>
<?php
		}
	}	
?>