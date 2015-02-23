<?
	include "function/koneksi.php";
	$id = mysql_real_escape_string($_GET['id']);
	$q  = mysql_query("SELECT * FROM kti_list_member WHERE id_kti = '$id'") or die(mysql_error());
	
	while($data = mysql_fetch_object($q)){
		$dir = "../RPanel/files/karya_tulis/".$data->image;
		if(file_exists($dir)){
			unlink($dir);
		}else{ /*do nothing*/ }
	}
	
	$del = mysql_query("DELETE FROM tbl_kti WHERE id_kti = '$id'") AND
						mysql_query("DELETE FROM kti_list_member WHERE id_kti = '$id'") AND
						mysql_query("DELETE FROM user WHERE username = '$id'") or die(mysql_error());
						
	if($del){
?>	
		<script>
				var id = "<? echo $id;?>";
				alert('Data TIM dengan ID '+id+' telah dihapus..');
				document.location.href = "data_registrasi.php#tab02";
	    </script>
<?		
	}else{
?>	
		<script>
				var id = "<? echo $id;?>";
				alert('Data gagal dihapus.');
				document.location.href = "data_registrasi.php#tab02";
		</script>
<?
	}		