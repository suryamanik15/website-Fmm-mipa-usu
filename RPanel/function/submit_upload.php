<?
	$sub = new APPSUB();
	$id_user = mysql_real_escape_string($_GET['id_user']);
	$kategori = $_GET['lomba_kategori'];
	
	//Check for Upload
	$query = "SELECT * FROM tbl_upload WHERE id_reg = '$id_user'";
	$SQL = mysql_query($query) or die(mysql_error());
	$fetch = mysql_fetch_object($SQL);
	
	// check if image is  exists
	$dir = "./RPanel/files/upload/".$fetch->image;
	if(file_exists($dir)){
		unlink($dir);
	}
	
	$tmp = $_FILES['upload']['tmp_name'];
	$type = $_FILES['upload']['type'];
	
	$ext = "";
	if($type == 'image/jpeg' OR $type == 'image/pjpeg'){
		$ext = ".jpg";
	}else if($type == 'image/png'){
		$ext = ".png";
	}else if($type == 'image/gif'){
		$ext = ".gif";
	}
	
	$rename = $id_user.$ext;
	$new_dir = "./RPanel/files/upload/".$rename;
	
	//TIME Conf
	$dt = getdate();
	$tgl = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	$wkt = $dt['hours'].":".$dt['minutes'].":".$dt['seconds'];
	$dtm = $tgl." ".$wkt;
	
	if($kategori == "olimpiade_matematika"){
		$upload = move_uploaded_file($tmp, $new_dir);
		if($upload){
				$q = "INSERT INTO tbl_upload VALUES('$id_user','$rename','$dtm')";
				$exec = $sub->executeQuery($q);
				if($exec){
?>
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Bukti Pembayaran telah terupload, silahkan tunggu konfirmasi dari panitia.");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>
<?	
					exit;
				}else{
?>				
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Upload Data Gagal !!");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>	
<?					
					exit;
				}
		}else{
			echo "Upload File Error !!";
		}	
	}else if($kategori == "karya_tulis_ilmiah"){
		
		$upload = move_uploaded_file($tmp, $new_dir);
		if($upload){
				$q = "INSERT INTO tbl_upload VALUES('$id_user','$rename','$dtm')";
				$exec = $sub->executeQuery($q);
				if($exec){
?>
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Bukti Pembayaran telah terupload, silahkan tunggu konfirmasi dari panitia.");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>
<?	
					exit;
				}else{
?>				
					<script>
					    var kat = "<? echo $kategori;?>";
						alert("Upload Data Gagal !!");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>	
<?					
					exit;
				}
		}else{
			echo "Upload File Error !!";
		}
		
	}else if($kategori == "video_lagu"){
		
		$upload = move_uploaded_file($tmp, $new_dir);
		if($upload){
				$q = "INSERT INTO tbl_upload VALUES('$id_user','$rename','$dtm')";
				$exec = $sub->executeQuery($q);
				if($exec){
?>
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Bukti Pembayaran telah terupload, silahkan tunggu konfirmasi dari panitia.");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>
<?	
					exit;
				}else{
?>				
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Upload Data Gagal !!");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>	
<?					
					exit;
				}
		}else{
			echo "Upload File Error !!";
		}
		
	}else if($kategori == "lomba_puisi"){
		
		$upload = move_uploaded_file($tmp, $new_dir);
		if($upload){
				$q = "INSERT INTO tbl_upload VALUES('$id_user','$rename','$dtm')";
				$exec = $sub->executeQuery($q);
				if($exec){
?>
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Bukti Pembayaran telah terupload, silahkan tunggu konfirmasi dari panitia.");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>
<?	
					exit;
				}else{
?>				
					<script>
						var kat = "<? echo $kategori;?>";
						alert("Upload Data Gagal !!");
						document.location.href="./index.php?View=User&Menu=CPanel&lomba_kategori="+kat;
					</script>	
<?					
					exit;
				}
		}else{
			echo "Upload File Error !!";
		}
	}	
	