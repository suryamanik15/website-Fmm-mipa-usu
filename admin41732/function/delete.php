<?php
	include "koneksi.php";
	
	$id = mysql_real_escape_string($_GET['id']);
	
	//Untuk menghapus file posting yang ada pada server
	$query_image = mysql_query("SELECT image FROM posting WHERE id_posting='$id'") or die(mysql_error());
	$fetch_image = mysql_fetch_array($query_image);
	$img = $fetch_image['image'];
	$fileName = "../../site/images/".$img;
	
	if(file_exists($fileName)){  //Mengecek keberadaan file
		$delete = unlink($fileName); // hapus file
	}
	
	$query_post = mysql_query("SELECT judul_posting FROM posting WHERE id_posting='$id'") or die(mysql_error());
	$fetch = mysql_fetch_array($query_post);
	$judul_post = $fetch['judul_posting'];
	
	//Eksekusi perintah query
		$query = mysql_query("DELETE FROM posting WHERE id_posting='$id'") or die(mysql_error());
	
		if($query){
?>
				<script language="javascript">
					var title_name = "<?php echo $judul_post; ?>";
					alert("Data postingan yang berjudul "+title_name+" telah berhasil di hapus.");
					document.location.href="../index.php#tab02";
				</script>
<?php			
		}else{
?>
			<script language="javascript">
					alert("Data gagal di hapus !!");
					document.location.href="../index.php#tab02";
				</script>
<?php
		}			
?>