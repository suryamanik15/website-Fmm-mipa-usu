<?php
	$qc = mysql_query("SELECT * FROM user WHERE username = '$username'") or die(mysql_error());
	$q2 = mysql_query("SELECT * FROM registrasi WHERE id_registrasi = '$username'") or die(mysql_error());
	$user = mysql_fetch_object($q2);
	$data = mysql_fetch_object($qc);
		if($data->status == "lock"){
?>
			
			<h1>Upload Bukti Pembayaran Lomba Olimpiade Matematika</h1>
			<p>Jika Anda sudah melakukan pembayaran melalui bank, silahkan anda upload bukti pembayaran melalui form di bawah ini.</p><br/>
		<fieldset>
			<legend>FORM UPLOAD</legend>	
			<p>
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
			</p>
		</fieldset>		
<?
			}else if($data->status == "active"){
?>
		<fieldset>	
			<legend>Unduh Formulir Peserta dengan ID Registrasi : <b><?echo $user->id_registrasi;?></b> </legend>
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
			<legend>Detail Info Anda : <?echo $user->nama_peserta;?></legend>
			<p>
				<table>
					<tr>	
						<th>ID Registrasi</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Tempat/Tanggal Lahir</th>
						<th>No.Telp</th>
						<th>Email</th>
						<th>Asal Sekolah</th>
						<th>Alamat Sekolah</th>
						<th>Kelas</th>
						<th>Status Bayar</th>
						<th>Reg Date</th>
					</tr>
				<?
					$SQL = mysql_query("SELECT * FROM registrasi WHERE id_registrasi = '$username'") or die(mysql_error());
					while($fetch = mysql_fetch_object($SQL)){
				?>	
					<tr>
						<td><?echo $fetch->id_registrasi;?></td>
						<td><?echo $fetch->nama_peserta;?></td>
						<td><?echo $fetch->alamat;?></td>
						<td><?echo $fetch->tempat_lahir."/".$fetch->tgl_lahir;?></td>
						<td><?echo $fetch->telp;?></td>
						<td><?echo $fetch->email;?></td>
						<td><?echo $fetch->asal_sekolah;?></td>
						<td><?echo $fetch->alamat_sekolah;?></td>
						<td><?echo $fetch->kelas." ".$fetch->tingkat;?></td>
						<td><?echo $fetch->status_bayar;?></td>
						<td><?echo $fetch->tanggal." ".$fetch->waktu;?></td>
					</tr>
				<?
					}
				?>	
				</table>
			</p>
	</fieldset>		