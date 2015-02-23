<?
	$id = mysql_real_escape_string($_GET['id']);
	$q  = mysql_query("SELECT * FROM vid_list_member WHERE id_tim = '$id'") or die(mysql_error());
	
	while($data = mysql_fetch_object($q)){
		$dir = "../RPanel/files/video_lagu/".$data->image;
		if(file_exists($dir)){
			unlink($dir);
		}else{ /*do nothing*/}
	}
	
	$del = mysql_query("DELETE FROM tim_video WHERE id_tim = '$id'") AND
						mysql_query("DELETE FROM vid_list_member WHERE id_tim = '$id'") AND
						mysql_query("DELETE FROM user WHERE username = '$id'");
						
	if($del){
?>	
		<script>
				var id = "<? echo $id;?>";
				alert('Data TIM dengan ID '+id+' telah dihapus..');
				document.location.href = "kti_list.php?id="+id;
	    </script>
<?		
	}else{
?>	
		<script>
				alert('Data gagal dihapus.');
				document.location.href = "kti_list.php?id="+id;
		</script>
<?
	}		