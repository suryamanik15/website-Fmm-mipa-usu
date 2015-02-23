<?php
	session_start();
	include "function/koneksi.php";
	
	$username = $_SESSION['username'];
	$id_user = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<!--<link rel="icon" type="image/png" href="tmp/logo.png" />-->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> <!-- GRAPHIC THEME -->
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script src="asset/SpryValidationTextField.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="tiny_mce.js"></script>

<link href="asset/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	
	function show_info(){
		$('.msg.info').toggle();
	}
	
	function konfirmasi(judul_posting, pemosting){
		ans = confirm('Apakah anda yakin akan menghapus postingan berjudul '+judul_posting+'\nyang diposting oleh '+pemosting);
		if(ans == true){
			return true;
		}else{return false;}
	}
	</script>
	<title>ADMIN HMM FMIPA USU</title>
</head>
<?php
   if(isset($username) && isset($id_user)){
?>
<body>

<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">
<?php
		if(isset($username)){
	
?>	
		<p class="f-right">User: <strong><a href="#"><?php echo $username;?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="function/logout.php" id="logout">Log out</a></strong></p>
<?php
		}else{
?>
		<p class="f-right">User: <strong><a href="#">No User</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<?php
		}
?>	

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">
		<ul class="box f-right">
			<li><a href="../index.php?View=User&Menu=Utama"><span style="color:#3C0;"><strong>Visit Site &raquo;</strong></span></a></li>
		</ul>

		<ul class="box">
			<li id="menu-active"><a href=""><span>Utama</span></a></li> <!-- Active -->
			<li><a href="data_registrasi.php"><span>Data Registrasi</span></a></li>
			<li><a href="about.php"><span>Tentang Sistem</span></a></li>
			<li><a href="terms.php"><span>Aturan (Terms and Condition)</span></a></li>
		</ul>

	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="index.php"><img src="tmp/logo.png" alt="Our logo" title="Visit Site" /></a></p>

				<!-- Search -->
				<form action="search.php" method="get" id="search">
					<fieldset>
						<legend>Search</legend>

						<p><input type="text" size="17" name="q" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />
						<a href="javascript:toggle('search-options');" class="ico-drop">Advanced search</a></p>

						<!-- Advanced search -->
						<div id="search-options" style="display:none;">

							<p>
								<label>Pencarian Berdasarkan : </label><br/>
								<label><input type="radio" name="search_p" value="tanggal" checked="checked" />Tanggal</label><br />
								<label><input type="radio" name="search_p" value="nama" />Nama</label><br/>
							</p>
						</div> <!-- /search-options -->
					</fieldset>
				</form>
			</div> <!-- /padding -->

			<ul class="box">
				<li><a href="index.php">POSTING</a></li>
				<!--<li><a href="polling.php">DATA POLLING</a></li>-->
				<li><a href="tambah_admin.php">TAMBAH ADMIN</a></li>
				<li><a href="daftar_admin.php">DAFTAR ADMIN</a></li>
				<li><a href="tambah_image.php">IMAGE GALLERY</a></li>
				<li><a href="data_registrasi.php">DATA REGISTRASI</a></li>
				<!--<li><a href="pesan.php">PESAN</a></li>-->
			</ul>
		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
<?php
	$id = mysql_real_escape_string($_GET['id']);
	$sql = mysql_query("SELECT * FROM tbl_kti WHERE id_kti='$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
?>
			<h1 align="center">Panel Admin</h1>
			<!-- Tabs -->
			<h3 class="tit">Detail Tim <? echo $data['nama_tim']; ?></h3>
			<fieldset>
				<table class="nostyle" border="0" cellpadding="5" cellspacing="10">
					<tr>
						<td>ID Registrasi</td>
						<td> : </td>
						<td><? echo $data['id_kti'];?></td>
					</tr>
					<tr>
						<td>Nama Tim</td>
						<td> : </td>
						<td><? echo $data['nama_tim'];?></td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td> : </td>
						<td><? echo $data['asal_sekolah'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td> : </td>
						<td><? echo $data['email'];?></td>
					</tr>
					<tr>
						<td>Tanggal Registrasi</td>
						<td> : </td>
						<td><? echo $data['tgl_daftar']." ".$data['waktu_daftar'];?></td>
					</tr>
				</table>
			</fieldset> <br/>
			
			<h3>Daftar Anggota</h3>
			<?
				$sq = mysql_query("SELECT * FROM kti_list_member WHERE id_kti = '$id'") or die(mysql_error());
				while($mem = mysql_fetch_object($sq)){
			?>
				<fieldset>
					<table border="0" cellpadding="5" cellspacing="10">
						<tr>
							<td>Nama</td>
							<td> : </td>
							<td><? echo $mem->nama; ?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td> : </td>
							<td><? echo $mem->tempat_lahir.", ".$mem->tgl_lahir; ?></td>
						</tr>
						<tr>
							<td>No. Telp / HP</td>
							<td> : </td>
							<td><? echo $mem->telp; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td> : </td>
							<td><? echo $mem->alamat; ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td> : </td>
							<td><? echo $mem->status; ?></td>
						</tr>
						<tr>
							<td>Foto </td>
							<td> : </td>
							<td>
							<?	
							if(!file_exists("../RPanel/files/karya_tulis/".$mem->image)){
								echo "<img width=\"100\" height=\"100\"  src=\"../RPanel/image/placeholder.gif\" />";
							}else{
								echo "<img width=\"100\" height=\"100\" src=\"../RPanel/files/karya_tulis/".$mem->image."\" />";
							}
							?>							
							</td>
						</tr>
						<tr>
							<td>Edit</td>
							<td> : </td>
							<td><a href="edit_kti.php?id=<? echo $id;?>&nama=<? echo $mem->nama;?>&mode=ind">Edit</a></td>
						</tr>
					</table>
				</fieldset><br/>
			<?
				}
			?>
		</div> <!-- /content -->
        
	</div> <!-- /cols -->
	<hr class="noscreen" />
	<!-- Footer -->
	<div id="footer" class="box">
		<p class="f-left">&copy; 2014 <a href="#" style="text-decoration:none; color:green;">LH USU</a>, All Rights Reserved &reg;</p>
	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
<?php
	}else{
?>
		<script language="javascript">
			alert("Kalau anda imgin mengakses halaman admin\nharus login dulu please !!");
			document.location.href="../login/login.php";
		</script>
<?php
	}
?>		
</html>

