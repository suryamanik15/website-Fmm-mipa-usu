<?php
	$qc = mysql_query("SELECT * FROM user WHERE username = '$username'") or die(mysql_error());
	$q2 = mysql_query("SELECT * FROM tim_video WHERE id_tim = '$username'") or die(mysql_error());
	$user = mysql_fetch_object($qc);
	$data = mysql_fetch_object($q2);
	
		if($data->status == "lock"){
?>
			
			<h1>Upload Bukti Pembayaran Lomba Karya Tulis Ilmiah</h1>
			<p>Jika Anda sudah melakukan pembayaran melalui bank, silahkan anda upload bukti pembayaran melalui form di bawah ini.</p><br/>
		<fieldset>	
			<legend>FORM UPLOAD</legend>
				<form name="frm_upload" method="POST" action="./index.php?View=User&Menu=Upload_Cash&id_user=<?php echo $username;?>&lomba_kategori=<?echo $kategori_lomba;?>" enctype="multipart/form-data">
					<table border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td>ID Registrasi </td>
							<td> : </td>
							<td><?echo $username;?></td>
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
			<legend>Unduh Formulir Peserta dengan ID Registrasi : <?echo $data->id_tim;?> </legend>
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
			<legend>Detail Info Tim Anda : <?echo $data->id_tim;?><h2>
			<p>
				<table border="0">
					<tr>
						<td>Nama TIM</td>
						<td> : </td>
						<td><? echo $data->nama_tim;?></td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td> : </td>
						<td><? echo $data->asal_sekolah;?></td>
					</tr>
					<tr>
						<td>Judul Lagu</td>
						<td> : </td>
						<td><? echo $data->judul_lagu; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td> : </td>
						<td><? echo $data->email;?></td>
					</tr>
				</table>
			</p>
		</fieldset>	