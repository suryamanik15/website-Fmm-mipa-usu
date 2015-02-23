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
			<li><a href="index.php"><span>Utama</span></a></li> <!-- Active -->
			<li><a href="data_registrasi.php"><span>Data Registrasi</span></a></li>
			<li id="menu-active"><a href="about.php"><span>Tentang Sistem</span></a></li>
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
				<li><a href="data_registrasi.php">DATA REGISTRASI</a></li>
				<!--<li><a href="pesan.php">PESAN</a></li>-->
			</ul>
		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">
	<?php
		$key = mysql_real_escape_string($_GET['q']);
		$search_p = mysql_real_escape_string($_GET['search_p']);
		
	?>		<h1 align="center">Panel Admin HIMATIF</h1>
		
	<?php
		if(isset($key) && isset($search_p)){
	?>		
			<h3 class="tit" align="center">Kata Kunci yang dicari : <?php echo $key; ?></h3>
			
	<?php
					$batas=10;
					if (!empty($_GET['halaman']) )
					$halaman=$_GET['halaman'];
					$pembatas =0;

					if(empty($halaman))
					{
						$posisi=0;
						$halaman=1;
					}
					else
					{
						$posisi = ($halaman-1) * $batas;
					}
					
					
			if($search_p == "tanggal"){
				$sql = "SELECT * FROM posting WHERE tanggal_posting LIKE '%$key%' ORDER BY tanggal_posting asc LIMIT $posisi,$batas";
				$tampil2="SELECT * FROM posting WHERE  tanggal_posting LIKE '%$key%' ";
				
			}else if($search_p == "nama"){
				$sql = "SELECT  * FROM posting WHERE judul_posting LIKE '%$key%' OR pemosting LIKE '%$key%' ORDER BY judul_posting asc LIMIT $posisi,$batas";
				$tampil2="SELECT * FROM posting WHERE judul_posting LIKE '%$key%' OR pemosting LIKE '%$key%' ";
			}
			
			$query = mysql_query($sql) or die(mysql_error());
			$jumlah = mysql_num_rows($query);
		if($jumlah > 0){	
				while($fetch = mysql_fetch_array($query)){
	?>
					<p><span><b>Judul Posting :</b> <?php echo $fetch['judul_posting']; ?></span><br/>
					<span><b>Pemosting : </b><?php echo $fetch['pemosting']; ?></span><br/>
					<span><b>Diposting pada :</b> <?php echo $fetch['tanggal_posting']; ?></span><br/>
					</p>
	<?php
				}
								$file="search.php";
								$hasil2=mysql_query($tampil2);
								$jmldata=mysql_num_rows($hasil2);

								$jmlhalaman=ceil($jmldata/$batas);


								//link ke halaman sebelumnya (previous)
								if($halaman > 1)
								{
									$previous=$halaman-1;
									echo "<A HREF=$file?halaman=1&batas=$batas>&raquo; First</A> | 
										<A HREF=$file?halaman=$previous&batas=$batas>< Previous</A> | ";
								}
								else
								{ 
									echo "<< First | < Previous | ";
								}

								$angka=($halaman > 3 ? " ... " : " ");
								for($i=$halaman-2;$i<$halaman;$i++)
								{
								  if ($i < 1) 
									  continue;
								  $angka .= "<a href=$file?halaman=$i&batas=$batas>$i</a> ";
								}

								$angka .= " <b>$halaman</b> ";
								for($i=$halaman+1;$i<($halaman+3);$i++)
								{
								  if ($i > $jmlhalaman) 
									  break;
								  $angka .= "<a href=$file?halaman=$i&batas=$batas>$i</a> ";
								}

								$angka .= ($halaman+2<$jmlhalaman ? " ...  
										  <a href=$file?halaman=$jmlhalaman&batas=$batas>$jmlhalaman</a> " : " ");

								echo "";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo " | <A HREF=$file?halaman=$next&batas=$batas>Next ></A> | 
								  <A HREF=$file?halaman=$jmlhalaman&batas=$batas>Last &raquo;</A> ";
								}
								else
								{ 
									echo " ";
								}
								echo "<p>Jumlah Data :  <font color=green><b>$jmldata</b></font></p>";
			}else{
	?>
				<p>Tidak ada data dengan kata kunci <big><b><?php echo $key; ?></b></big></p><br/>
	<?php
			}
		}else{
	?>
				<h3 class="tit" align="center">Kata Kunci yang dicari : <?php echo $key; ?></h3>
				<p>Tidak ada data dengan kata kunci <big><b><?php echo $key; ?></b></big></p><br/>
	<?php
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
</html>
<?php
	}else{
?>
		<script language="javascript">
			alert("Kalau anda ingin mengakses halaman admin\nharus login dulu please !!");
			document.location.href="../login/login.php";
		</script>
<?php
	}
?>		


