<?php
	include "koneksi.php";
	
	$judul = $_POST['judul'];
	$id = ""; //inisialisasi id_posting
	$pemosting = $_POST['pemosting'];
	$isi = $_POST['isi'];
	$today = getdate(); // Fungsi untuk mengambil tanggal aktual (current date)
	$date = $today['year']."-".$today['mon']."-".$today['mday'];
	$waktu = $today['hours'].":".$today['minutes'].":".$today['seconds'];
	$kategori = $_POST['kategori'];
	
	//File Image
	$file_name = $_FILES['image']['name'];
	$tmp_file = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$dir_tujuan = "../../site/images/".$file_name; //Set Direktori tujuan
	//./site/images/home-3.jpg
	// lebar dan panjang maksimum dari foto yang di upload
	$lebar_maks = 240;
	$tinggi_maks = 300;
	$img_size = getimagesize($tmp_file);
	
	if($file_name != ""){
			move_uploaded_file($tmp_file, $dir_tujuan);
			
			$queryCheck = mysql_query("SELECT * FROM posting") or die(mysql_error());
			$sqlCheck = mysql_num_rows($queryCheck);  //untuk mengecek jumlah data yang ada.
			if($sqlCheck > 0){
				$id_query = mysql_query("SELECT max(id_posting) as maks FROM posting") or die(mysql_error());
				$fetch = mysql_fetch_array($id_query);
				$max_id = $fetch['maks'];
				$id = $max_id + 1;
			}else{
				$id = 1;
			}
			
			$query = mysql_query("INSERT INTO posting(id_posting,judul_posting,pemosting,isi,tanggal_posting,`waktu`,kategori,image)
			values('$id','$judul','$pemosting','$isi','$date','$waktu','$kategori','$file_name')") or die(mysql_error());
			
			if($query){
?>
					<script language="javascript">
						var title = "<?php echo $judul; ?>";
						alert("Postingan berjudul "+title+" berhasil di posting.");
						document.location.href="../index.php#tab02";
					</script>
<?php				
			}else{
?>
					<script language="javascript">
						alert("Data gagal di posting !!");
						document.location.href="../index.php#tab02";
					</script>
<?php
			}
	}else{
?>
		<script language="javascript">
			alert("File yang dicari tidak ada !!");
			document.location.href="../index.php#tab02";
	    </script>
<?php
	}	
?>