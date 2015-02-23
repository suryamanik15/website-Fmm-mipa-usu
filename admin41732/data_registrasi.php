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
	
	function refresh(){
		document.location.href="data_registrasi.php";
	}
	
	function show_edit(id){
		$('.edit_panel'+id).toggle();
		return false;
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
			<li id="menu-active"><a href="data_registrasi.php"><span>Data Registrasi</span></a></li>
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
				<li><a href="data_registrasi.php">DATA REGISTRASI</a></li>
				<!--<li><a href="pesan.php">PESAN</a></li>-->
			</ul>
		</div> <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box">

			<h1 align="center">Panel Admin</h1>

			<h3 class="tit">DAFTAR PESERTA REGISTRASI</h3>
			
			<div class="tabs box">
				<ul>
					<li><a href="#tab01"><span>Olimpiade</span></a></li>
					<li><a href="#tab02"><span>Karya Tulis Ilmiah</span></a></li>
					<li><a href="#tab03"><span>Video Lagu</span></a></li>
					<li><a href="#tab04"><span>Lomba Puisi</span></a></li>
					<li><a href="#tab05"><span>Data Upload</span></a></li>
					<li><a href="#tab06"><span>Data User List</span></a></li>
				</ul>
			</div> <!-- /tabs -->
		
		<!-- Tab01 -->
		<div id="tab01">
			<p align="center" style="color:red;">*Klik Edit untuk memunculkan edit form, dan tekan klik lagi untuk menyembunyikan edit form nya kembali. </p>
				<table>
					<tr>
						<th>NO PESERTA</th>
						<th>NAMA PESERTA</th>
						<th>TEMPAT / TGL LAHIR</th>
						<th>ALAMAT</th>
						<th>NO. TELP/HP</th>
						<th>EMAIL</th>
						<th>ASAL SEKOLAH</th>
						<th>ALAMAT SEKOLAH</th>
						<th>KELAS</th>
						<th>WAKTU REGISTRASI</th>
						<th>EDIT</th>
						<th>DELETE</th>
		<?php
				
					$batas=5;
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
					
			$query = mysql_query("SELECT * FROM registrasi ORDER BY id_registrasi ASC LIMIT $posisi,$batas") or die(mysql_error());
			while($admin = mysql_fetch_array($query)){
		?>	
					<tr>
						<td><?php echo $admin['id_registrasi']; ?></td>
						<td><?php echo $admin['nama_peserta']; ?></td>
						<td><?php echo $admin['tempat_lahir']." / ".$admin['tgl_lahir']; ?></td>
						<td><?php echo $admin['alamat']; ?></td>
						<td><?php echo $admin['telp']; ?></td>
						<td><?php echo $admin['email']; ?></td>
						<td><?php echo $admin['asal_sekolah']; ?></td>
						<td><?php echo $admin['alamat_sekolah']; ?></td>
						<td><?php echo $admin['kelas']." ".$admin['tingkat']; ?></td>
						<td><?php echo $admin['tanggal']." ".$admin['waktu']; ?></td>
						<td><a id="edit" onclick="show_edit('<?php echo $admin['id_registrasi']; ?>')" >Edit</a></td>
						<td><a href="delete_registrasi.php?id=<?php echo $admin['id_registrasi'];?>">Delete</a></td>
						<div class="edit_panel<?php echo $admin['id_registrasi']; ?>">
							<form action="function/edit_peserta.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $admin['id_registrasi']; ?>" />
								<span>No.Peserta : <input type="text" name="no_peserta" value="<?php echo $admin['id_registrasi'];?>" readonly="readonly" /></span><br/><br/>
								<span>Nama : <input type="text" name="nama" value="<?php echo $admin['nama_peserta'];?>" /></span><br/><br/>
								<span>Tempat Lahir : <input type="text" name="tmp_lahir" value="<?php echo $admin['tempat_lahir'];?>" /></span><br/><br/>
								<span>Alamat : <input type="text" name="alamat" value="<?php echo $admin['alamat'];?>" /></span><br/><br/>
								<span>No. Telp/HP : <input type="text" name="telp" value="<?php echo $admin['telp'];?>" /></span><br/><br/>
								<span>Email : <input type="text" name="email" value="<?php echo $admin['email'];?>" /></span><br/><br/>
								<span>Asal Sekolah : <input type="text" name="asal_sekolah" value="<?php echo $admin['asal_sekolah'];?>" /></span><br/><br/>
								<span>Alamat Sekolah : <input type="text" name="alamat_sekolah" value="<?php echo $admin['alamat_sekolah'];?>" /></span><br/><br/>
								<span>Kelas :
									 <select name="kelas">
									 <?php
										$kelas = array("VII","VII","IX","X","XI","XII");
										for($i = 0; $i < count($kelas); $i++){
											echo "<option value=\"$kelas[$i]\">$kelas[$i]</option>";
										}
									 ?>
									 </select>	
								</span><br/><br/>
								<span>Tingkat :
									<select name="tingkat">
									 <?php
										$tingkat = array("SMP","SMA");
										for($k = 0; $k < count($tingkat); $k++){
											echo "<option value=\"$tingkat[$k]\">$tingkat[$k]</option>";
										}
									 ?>
									 </select>
								</span><br/><br/>
								<span><input type="submit" value="SUBMIT"/></span>
								<span><input type="reset" value="RESET" /></span>
								<span><input type="button" value="CANCEL" onClick="refresh()"/></span><br/>
							</form>
						</div>
					</tr>
					<style type="text/css">
						.edit_panel<?php echo $admin['id_registrasi']; ?>{
							display:none;
							margin-top:5px;
						}
					</style>
	
		<?php
			}
		?>			
				</table>
			<?php	
								$query2 = "SELECT * FROM registrasi";
								$file="data_registrasi.php";
								$hasil2=mysql_query($query2);
								$jmldata=mysql_num_rows($hasil2);

								$jmlhalaman=ceil($jmldata/$batas);


								//link ke halaman sebelumnya (previous)
								if($halaman > 1)
								{
									$previous=$halaman-1;
									echo "<A style=text-decoration:none;color:red HREF=$file?halaman=1&batas=$batas><< First</A> | 
										<A style=text-decoration:none;color:red HREF=$file?halaman=$previous&batas=$batas>< Previous</A> ";
								}
								else
								{ 
									echo "";
								}

								$angka=($halaman > 3 ? " ... " : " ");
								for($i=$halaman-2;$i<$halaman;$i++)
								{
								  if ($i < 1) 
									  continue;
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas>$i</a> ";
								}

								$angka .= " <b>$halaman</b> ";
								for($i=$halaman+1;$i<($halaman+3);$i++)
								{
								  if ($i > $jmlhalaman) 
									  break;
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas>$i</a> ";
								}

								$angka .= ($halaman+2<$jmlhalaman ? " ...  
										  <a style=text-decoration:none;color:red href=$file?halaman=$jmlhalaman&batas=$batas>$jmlhalaman</a> " : " ");

								echo "";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo "<A style=text-decoration:none;color:red; HREF=$file?halaman=$next&batas=$batas>Next ></A> | 
								  <A style=text-decoration:none;color:red; HREF=$file?halaman=$jmlhalaman&batas=$batas>Last &raquo;</A> ";
								}
								else
								{ 
									echo "";
								}
								echo "<p>Jumlah Data :  <font color=green><b>$jmldata</b></font></p>";
				?>
			</div>	
			<!-- Tab02 -->
			<div id="tab02">
				<?php
					include "kti_list.php";
				?>
			</div>
			<!-- Tab03 -->
			<div id="tab03">
				<?php
					include "video_list.php";
				?>
			</div>
			<!-- Tab04 -->
			<div id="tab04">
				<?php
					include "puisi_list.php";
				?>
			</div>
			<!-- Tab05 -->
			<div id="tab05">
				<?php
					include "upload_list.php";
				?>
			</div>
			<!-- Tab06 -->
			<div id="tab06">
				<?php
					include "userlist.php";
				?>
			</div>
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

