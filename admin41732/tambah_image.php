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
	<style type="text/css">
		.edit_panel{
			display:none;
			margin-top:5px;
		}
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
		
		$("#gal_title").change(function(){
			var title = $(this).val();
			document.location.href="function/title.php?title="+title;
		});
	});
	
	function show_info(){
		$('.msg.info').toggle();
	}
	
	function show_edit(id){
		$('.edit_panel'+id).toggle();
		return false;
	}
	
	function konfirmasi(judul_gal){
		ans = confirm('Apakah anda yakin akan menghapus image dari gallery yang berjudul '+judul_gal+'??');
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
			<li id="menu-active"><a href="index.php"><span>Utama</span></a></li> <!-- Active -->
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
			<h1 align="center">Panel Admin </h1>
			<h3 class="tit">Upload, Edit dan Hapus Image pada Menu Gallery, dilakukan pada bagian ini.</h3>
			<div class="tabs box">
				<ul>
					<li><a href="#tab01"><span>Upload Image Gallery</span></a></li>
					<li><a href="#tab02"><span>Daftar Image Gallery</span></a></li>
					<li><a href="#tab03"><span>Image Carousal</span></a></li>
				</ul>
			</div> <!-- /tabs -->
			
				<div id="tab01">	
					<h3 class="tit" align="center">Gallery Image</h3>
					<fieldset>
						<legend>Form Upload Image Menu Gallery</legend>
						<form name="upload_gal" action="function/insert_gallery.php" enctype="multipart/form-data" method="post" >
						<table class="nostyle" cellpadding="5" cellspacing="10">
							<tr>
								<td style="width:70px;" class="bold">NAMA GALLERY</td>
								<td class="bold"> : </td>
								<td><select name="judul_gal" class="input-text">
							<?php
								$q = mysql_query("SELECT * FROM gal") or die(mysql_error());
								while($fetch = mysql_fetch_array($q)){
							?>	
										<option value="<?php echo $fetch['judul_gal']; ?>"><?php echo $fetch['judul_gal'];?></option>
							<?php
								}
							?>	
									</select>
								</td>
							</tr>
							<tr>
								<td style="width:70px;" class="bold">JUDUL BARU</td>
								<td class="bold"> : </td>
								<td><input type="text" name="gal_title" id="gal_title" class="input-text"/><div style="color:red; margin-left:5px;">* Masukkan judul gallery yang baru ke input box di atas, jika anda ingin menambahkan judul gallery baru.</div></td>
							</tr>
							<tr>
								<td class="bold">Pilih Image</td>
								<td class="bold"> : </td>
								<td><input type="file" size="40" name="image" value="Masukkan Image Anda" /></td>
							</tr>
							<tr>
								<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Upload" /></td>
							</tr>
						</table>
						</form>
					</fieldset>
					<fieldset>
						<legend>Daftar Judul Gallery</legend>
						
						<?php
							$titleQ = mysql_query("SELECT * FROM gal") or die(mysql_error());
							$jum_data = mysql_num_rows($titleQ);
						if($jum_data <= 0){
							echo "<p style=font-size:16px;color:red;>Judul Gallery Tidak Ada.</p>";
						}else{
						?>
						<table>
							<tr>	
								<th>ID JUDUL</th>
								<th colspan="2">JUDUL</th>
							</tr>
						<?php	
							while($fetch = mysql_fetch_array($titleQ)){
						?>
							<tr>
								<td><?php echo $fetch['id_gal']; ?></td>
								<td><?php echo $fetch['judul_gal']; ?></td>
								<td><a href="function/del_title_gal.php?id_gal=<?php echo $fetch['id_gal'];?>">Delete</a></td>
							</tr>
						<?php
							}
						}	
						?>	
						</table>
					</fieldset>
				</div>
				<div id="tab02">
				<h3 class="tit" align="center">Daftar Image Gallery</h3>
	<?php
		$sql = mysql_query("SELECT * FROM gallery") or die(mysql_error());
		$jum_data = mysql_num_rows($sql);
		if($jum_data <= 0){
	?>
		<p style="font-size:25px; color:red;">Data Gallery Tidak Ada.</p>
	<?php
		}else{
	?>	
							<table>
					<tr>
						<th>JUDUL GALLERY</th>
						<th>IMAGE NAME</th>
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
					
			$query = mysql_query("SELECT gal.id_gal,gal.judul_gal,gallery.image FROM gal,gallery WHERE gal.id_gal=gallery.id_gal ORDER BY gallery.id_gal asc LIMIT $posisi,$batas") or die(mysql_error());
			while($gal = mysql_fetch_array($query)){
		?>	
					<tr>
						<td><?php echo $gal['judul_gal']; ?></td>
						<td><?php echo $gal['image']; ?></td>
						<td><a id="edit" onclick="show_edit(<?php echo $gal['id_gal']; ?>)" >Edit</a></td>
						<td><a href="function/delete_image.php?img=<?php echo $gal['image'];?>" onclick="konfirmasi('<?php echo $gal['judul_gal'];?>');">Delete</a></td>
						<div class="edit_panel<?php echo $gal['id_gal']; ?>">
							<form action="function/edit_gal.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $gal['id_gal']; ?>" />
								<span><input type="text" name="judul_gal" value="<?php echo $gal['judul_gal'];?>" /></span>
								<span><input type="file" name="file" value="<?php echo $gal['image'];?>" /></span>
								<span><input type="submit" value="UPLOAD"/></span>
								<span><input type="reset" value="RESET" /></span>
							</form>
						</div>
					</tr>
					<style type="text/css">
						.edit_panel<?php echo $gal['id_gal']; ?>{
							display:none;
							margin-top:5px;
						}
					</style>
		<?php
			}
		?>			
				</table>
			<?php	
								$query2 = "SELECT * FROM gallery";
								$file="tambah_image.php";
								$hasil2=mysql_query($query2);
								$jmldata=mysql_num_rows($hasil2);

								$jmlhalaman=ceil($jmldata/$batas);


								//link ke halaman sebelumnya (previous)
								if($halaman > 1)
								{
									$previous=$halaman-1;
									echo "<A style=text-decoration:none;color:red HREF=$file?halaman=1&batas=$batas#tab02><< First</A> | 
										<A style=text-decoration:none;color:red HREF=$file?halaman=$previous&batas=$batas#tab02>< Previous</A> ";
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
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas#tab02>$i</a> ";
								}

								$angka .= " <b>$halaman</b> ";
								for($i=$halaman+1;$i<($halaman+3);$i++)
								{
								  if ($i > $jmlhalaman) 
									  break;
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas#tab02>$i</a> ";
								}

								$angka .= ($halaman+2<$jmlhalaman ? " ...  
										  <a style=text-decoration:none;color:red href=$file?halaman=$jmlhalaman&batas=$batas#tab02>$jmlhalaman</a> " : " ");

								echo "";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo "<A style=text-decoration:none;color:red; HREF=$file?halaman=$next&batas=$batas#tab02>Next ></A> | 
								  <A style=text-decoration:none;color:red; HREF=$file?halaman=$jmlhalaman&batas=$batas#tab02>Last &raquo;</A> ";
								}
								else
								{ 
									echo "";
								}
								echo "<p>Jumlah Data :  <font color=green><b>$jmldata</b></font></p>";
				}
				?>					
				</div>
				<div id="tab03">	
					<h3 class="tit" align="center">Upload Image Carousel</h3>
					<fieldset>
						<legend>Form Upload Image Carousal</legend>
						<form name="upload_gal" action="function/insert_carousal.php" enctype="multipart/form-data" method="post" >
						<table class="nostyle" cellpadding="5" cellspacing="10">
							<tr>
								<td style="width:70px;" class="bold">NAMA IMAGE</td>
								<td class="bold"> : </td>
								<td><input type="text" name="image_name" class="input-text" style="width:200px;" /></td>
							</tr>
							<tr>
								<td class="bold">Upload Image</td>
								<td class="bold"> : </td>
								<td><input type="file" size="40" name="img" value="Masukkan Image Anda" /></td>
							</tr>
							<tr>
								<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Upload" /></td>
							</tr>
						</table>
						</form>
					</fieldset>
					<fieldset>
						<legend>Daftar Image Carousel</legend>
						
						<?php
							$titleQ = mysql_query("SELECT * FROM image_carousal ORDER BY id_carousal") or die(mysql_error());
							$jum_data = mysql_num_rows($titleQ);
						if($jum_data <= 0){
							echo "<p style=font-size:16px;color:red;>Belum ada File image.</p>";
						}else{
						?>
						<table>
							<tr>	
								<th>ID IMAGE</th>
								<th>NAMA IMAGE</th>
								<th>TANGGAL UPLOAD</th>
								<th>HAPUS</th>
							</tr>
						<?php	
							while($fetch = mysql_fetch_object($titleQ)){
						?>
							<tr>
								<td><?php echo $fetch->id_carousal; ?></td>
								<td><?php echo $fetch->image_name; ?></td>
								<td><?php echo $fetch->tanggal; ?></td>
								<td><a href="function/del_image_carousal.php?id=<?php echo $fetch->id_carousal;?>">Hapus</a></td>
							</tr>
						<?php
							}
						}	
						?>	
						</table>
					</fieldset>
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
			alert("Kalau anda ingin mengakses halaman admin\nharus login dulu please !!");
			document.location.href="../login/login.php";
		</script>
<?php
	}
?>		
</html>

