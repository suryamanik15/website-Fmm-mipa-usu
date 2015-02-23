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
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	
	function show_info(){
		$('.msg.info').toggle();
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
			<li><a href="index.php"><span>Utama</span></a></li> <!-- Active -->
			<li id="menu-active"><a href="polling.php"><span>Polling</span></a></li>
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
				<p id="logo"><a href="../home.php"><img src="tmp/logo.png" alt="Our logo" title="Visit Site" /></a></p>

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
				<!--<li><a href="pesan.php">PESAN</a></li>-->
			</ul>
		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
		
			<h1 align="center">Panel Admin</h1>

			<h3 class="tit">DATA POLLING</h3>
				<table>
					<tr>
						<th>KATEGORI</th>
						<th>JUMLAH VOTING</th>
						<th>PERSENTASE</th>
					</tr>
		<?php
				$query = mysql_query("SELECT * from polling ORDER BY id_polling asc") or die(mysql_error());
				$t_query = mysql_query("SELECT sum(votes) as 'total_vote' from polling") or die(mysql_error());
				$data = mysql_fetch_array($t_query);
				$tot_vote = $data['total_vote'];
				
				while($fetch = mysql_fetch_array($query)){
		?>
						<tr><td><?php echo $fetch['kategori']; ?></td>
							<td><?php echo $fetch['votes']; ?></td>
							<td><?php 
								$vote = $fetch['votes'];
								$persentase = ($vote/$tot_vote) * 100;
								echo $persentase."%";
							?>
							</td>
						</tr>
		<?php
				}
		?>
				</table>
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

