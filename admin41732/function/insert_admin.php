<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hash = md5($password);
	$id = "";
	
	$queryCheck = mysql_query("SELECT * FROM user") or die(mysql_error());
	$jum_data = mysql_num_rows($queryCheck);
	
	if($jum_data > 0 ){
			
			$id_query = mysql_query("SELECT max(id_user) as maks FROM user") or die(mysql_error());
			$fetch = mysql_fetch_array($id_query);
			$max_id = $fetch['maks'];
			$id = $max_id + 1;
	}else{
			$id = 1;
	}
	
	$query = mysql_query("INSERT INTO user(id_user,username,password) values('$id','$username','$hash')") or die(mysql_error());
	
	if($query){
?>
		<script language="javascript">
			var username = "<?php echo $username; ?>";
			alert("Data Admin dengan Username "+username+" berhasil ditambahkan");
			document.location.href="../daftar_admin.php";
		</script>
<?php		
	}else{
?>
		<script language="javascript">
			alert("Gagal menambah user admin !!");
			document.location.href="../tambah_admin.php";
		</script>
<?php
	}		
?>