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
	$mode = $_GET['mode'];
	$id = mysql_real_escape_string($_GET['id']);
	$nama = mysql_real_escape_string($_GET['nama']);
	
	$sql = mysql_query("SELECT * FROM vid_list_member WHERE id_kti='$id' AND nama = '$nama'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
?>
			<h1 align="center">Panel Admin</h1>
			<!-- Tabs -->
			<h3 class="tit">EDIT DATA <? echo $data['nama'];?></h3>
	<?
	if($mode == "ind"){	
	?>	
			<fieldset>
				<legend>Form Edit Data</legend>
				<form action="function/update_vid.php" method="post" enctype="multipart/form-data">
				<table class="nostyle" cellpadding="5" cellspacing="10">
					<tr>
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<input type="hidden" name="name" value="<? echo $data['nama'];?>" />
						<td style="width:70px;" class="bold">Nama : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="nama" class="input-text"  value="<?php echo $data['nama']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Tempat Lahir : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="tmp_lahir" class="input-text"  value="<?php echo $data['tempat_lahir']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Tanggal Lahir : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="tgl_lahir" class="input-text"  value="<?php echo $data['tgl_lahir']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">No.Telp/HP : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="telp" class="input-text"  value="<?php echo $data['telp']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Alamat : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="alamat" class="input-text"  value="<?php echo $data['alamat']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Status : </td>
                        <td class="bold"> : </td>
						<td><select name="status">
								<option value="">===PILIH STATUS===</option>
								<option value="ketua">Ketua</option>
								<option value="anggota">Anggota</option>
							</select>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Ganti Image : </td>
                        <td class="bold"> : </td>
						<td><input type="file" size="60" name="img" class="input-text"  value="<?php echo $data['img_name']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Submit" /></td>
					</tr>
				</table>
				</form>
			</fieldset>
		<?
			}else if($mode == "tim"){
				$sq = mysql_query("SELECT * FROM tim_video WHERE id_kti='$id'") or die(mysql_error());
				$f = mysql_fetch_array($sq);
		?>		
				<fieldset>
				<legend>Form Edit Data</legend>
				<form action="function/update_tim_video.php" method="post" enctype="multipart/form-data">
				<table class="nostyle" cellpadding="5" cellspacing="10">
					<tr>
						<td style="width:70px;" class="bold">ID Registrasi : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="id_reg" class="input-text"  readonly="readonly" value="<?php echo $f['id_tim']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Nama Tim : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="nama_tim" class="input-text"  value="<?php echo $f['nama_tim']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Asal Sekolah : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="asal_sekolah" class="input-text"  value="<?php echo $f['asal_sekolah']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Email : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="email" class="input-text"  value="<?php echo $f['email']; ?>"/>
                        </td>
					</tr>
					<tr>
						<td style="width:70px;" class="bold">Judul Lagu : </td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="judul_lagu" class="input-text"  value="<?php echo $f['judul_lagu']; ?>"/>
                        </td>
					</tr>	
					<tr>
						<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Simpan" /></td>
					</tr>
				</table>
				</form>
			</fieldset>	
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

