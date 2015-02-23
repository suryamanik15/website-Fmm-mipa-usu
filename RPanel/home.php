<?php
	session_start();
	// get data session
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	
	$sub = new APPSUB();
	
	//$id_user = mysql_real_escape_string($_GET['id_user']);
	$kategori_lomba = $_GET['lomba_kategori'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Konfirmasi Pendaftaran Lomba</title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 24px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace; ban
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container">
		<span style="float:right;text-decoration:none;color:green;"><a href="./index.php?View=Act&Menu=Logout&lomba_kategori=<?echo $kategori_lomba;?>">
		LOG OUT</a></span>
	<?php
		if($kategori_lomba == "olimpiade_matematika"){
			include "math.php";
		}else if($kategori_lomba == "karya_tulis_ilmiah"){
			include "kti.php";
		}else if($kategori_lomba == "video_lagu"){
			include "vid.php";
		}else if($kategori_lomba == "lomba_puisi"){
			include "lomba_puisi.php";
		}
	?>
	</div>
</body>
</html>