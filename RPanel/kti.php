<?php
	$qc = mysql_query("SELECT * FROM user WHERE username = '$username'") or die(mysql_error());
	$q2 = mysql_query("SELECT * FROM tbl_kti WHERE id_kti = '$username'") or die(mysql_error());
	$user = mysql_fetch_object($q2);
	$data = mysql_fetch_object($qc);
	
		if($data->status == "lock"){
?>
			
			<h1>Upload Bukti Pembayaran Lomba Karya Tulis Ilmiah</h1>
			<p>Jika Anda sudah melakukan pembayaran melalui bank, silahkan anda upload bukti pembayaran melalui form di bawah ini.</p><br/>
		<fieldset>	
			<legend>FORM UPLOAD</legend>
				<form name="frm_upload" method="POST" action="./index.php?View=User&Menu=Upload_Cash&id_user=<?php echo $username;?>&lomba_kategori=<?echo $kategori_lomba;?>" enctype="multipart/form-data">
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td>Masukkan ID Registrasi Anda</td>
							<td> : </td>
							<td><input type="text" name="id_registrasi"/></td>
						</tr>
						<tr>
							<td>Upload File </td>
							<td> : </td>
							<td><input type="file" name="upload"/></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="2"><input type="submit" value="Upload"/></td>
						</tr>
					</table>
				</form>
		</fieldset>	
<?
			}else if($data->status == "active"){
?>
		<fieldset>
			<legend>Unduh Formulir Peserta dengan ID Registrasi : <?echo $user->id_registrasi;?> </legend>
			<p>
				<table border="0">
					<tr>
						<td>Formulir Peserta</td>
						<td>&nbsp;&nbsp;</td>
						<td><a href="./index.php?View=User&Menu=Print&id=<?echo $username;?>&mode=<?echo $kategori_lomba;?>">
						<img src="./RPanel/image/file_pdf.png"/></a></td>
					</tr> 
				</table>
			</p>
		</fieldset>	
<?			
			}
?>
		<fieldset>	
			<legend>Detail Info Tim Anda : <?echo $user->id_kti;?><h2>
			<p>
				<table border="0">
					<tr>
						<td>Nama TIM</td>
						<td> : </td>
						<td><? echo $user->nama_tim;?></td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td> : </td>
						<td><? echo $user->asal_sekolah;?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td> : </td>
						<td><? echo $user->email; ?></td>
					</tr>
					<tr>
						<td>Tanggal Registrasi</td>
						<td> : </td>
						<td><? echo $user->tgl_daftar." ".$user->waktu_daftar; ?></td>
					</tr>
				</table>
			</p>
		</fieldset>	