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
	
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script src="asset/SpryValidationTextField.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	
	tinyMCE.init({
		mode : "none",
		theme : "advanced",
		plugins : "table,advhr,advimage,advlink,emotions,iespell,insertdatetime,zoom,flash,searchreplace,print,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		window.open(connector, "tinymcpuk", "modal,width=400,height=400");
	}
	
	
	function addMCE()
    {
        tinyMCE.execCommand('mceAddControl',true,'isi');				
    }
	//Delay agar mencegah error yang disebabkan koneksi internet yang lambat
	setTimeout('addMCE()',4000);	
</script>
<link href="asset/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

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

			<h1 align="center">Panel Admin</h1>
			<!-- Tabs -->
			<h3 class="tit">Penginputan, Perubahan Data Posting dilakukan pada Menu Tab di bawah ini.</h3>

			<div class="tabs box">
				<ul>
					<li><a href="#tab01"><span>Posting</span></a></li>
					<li><a href="#tab02"><span>Daftar Posting</span></a></li>
				</ul>
			</div> <!-- /tabs -->

			<!-- Tab01 -->
			<div id="tab01">
			
				<h3 class="tit" align="center">FORM POSTING</h3>
                <p align="center" style="font-weight:bold;">Form di bawah ini digunakan untuk postingan informas pada website</p>
                <fieldset>
				<legend>Posting</legend>
				<form action="function/insert.php" method="post" enctype="multipart/form-data">
				<table class="nostyle" cellpadding="5" cellspacing="10">
					<tr>
						<td style="width:70px;" class="bold">JUDUL</td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="judul" class="input-text" onfocus="show_info()"/>
                        	<p class="msg info">Untuk Judul postingan, setiap huruf awal pada setiap kata sebaiknya digunakan huruf besar</p>
                        </td>
					</tr>
					<tr>
						<td class="bold">PEMOSTING</td>
                        <td class="bold"> : </td>
						<td><input type="text" size="40" name="pemosting" class="input-text" value="Admin" readonly="readonly" /></td>
					</tr>
					<tr>
						<td class="va-top">ISI POSTINGAN</td>
                        <td>&nbsp;</td>
						<td><textarea name="isi" id="isi" cols="45" rows="5" style="width:600px; height:350px; class="input-text"></textarea></td>
					</tr>
					<tr>
						<td class="bold">KATEGORI</td>
                        <td class="bold"> : </td>
						<td>
							<select name="kategori" class="input-select">
                            	<option value="seminar">Seminar</option>
                                <option value="workshop">Workshop</option>
								<option value="sosial">Sosial</option>
                                <option value="lomba">Lomba</option>
								<option value="kegiatan">Kegiatan</option>
								<option value="struktur">Struktur</option>
                            </select>
						</td>
					</tr>
                    <tr>
						<td class="bold">UPLOAD IMAGE</td>
                        <td class="bold"> : </td>
                        <td><input type="file" width="100px" name="image" /></td>
                     </tr>   
					<tr>
						<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Submit" /></td>
					</tr>
				</table>
				</form>
			</fieldset>

			</div> <!-- /tab01 -->

			<!-- Tab02 -->
			<div id="tab02">
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
					
					$query = mysql_query("SELECT * FROM posting ORDER BY id_posting asc LIMIT $posisi,$batas") or die(mysql_error());
			?>
				<h3 class="tit" align="center">DAFTAR DATA POSTING</h3>
                <p align="center" style="font-weight:bold;">Data yang berada pada tabel di bawah ini dapat dihapus atau diedit.</p>
				<table>
				<tr>
				    <th>ID POSTING</th>
				    <th>JUDUL POSTING</th>
				    <th>PEMOSTING</th>
				    <th>TANGGAL POSTING</th>
				    <th>KATEGORI</th>
					<th>DELETE</th>
					<th>EDIT</th>
				</tr>
			<?php
				while($data = mysql_fetch_array($query)){
			?>	
				<tr>
				    <td><?php echo $data['id_posting'] ?></td>
				    <td><?php echo $data['judul_posting'] ?></td>
				    <td><?php echo $data['pemosting'] ?></td>
				    <td><?php echo $data['tanggal_posting'] ?></td>
				    <td><?php echo $data['kategori'] ?></td>
					<td><a href="function/delete.php?id=<?php echo $data['id_posting'] ?>" onclick="return konfirmasi('<?php echo $data['judul_posting'];?>','<?php echo $data['pemosting']; ?>');">Delete</a></td>
					<td><a href="edit.php?id=<?php echo $data['id_posting'] ?>">EDIT</a></td>
				</tr>
			<?php
				}
			?>
			</table>
				<?php	
								$file="index.php";

								$tampil2="SELECT * FROM posting ";
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

								echo "$angka";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo " | <A HREF=$file?halaman=$next&batas=$batas>Next ></A> | 
								  <A HREF=$file?halaman=$jmlhalaman&batas=$batas>Last &raquo;</A> ";
								}
								else
								{ 
									echo " | Next > | Last >>";
								}
								echo "<p>Jumlah Data Posting:  <font color=green><b>$jmldata</b></font></p>";
				?>	
			</div> <!-- /tab02 -->

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
			document.location.href="login/login.php";
		</script>
<?php
	}
?>		
</html>

