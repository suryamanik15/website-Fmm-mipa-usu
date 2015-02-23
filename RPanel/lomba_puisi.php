<?
	$sub = new APPSUB();
	$SQL = "SELECT * FROM user WHERE username = '$username'";
	$Q2 = "SELECT * FROM tbl_puisi WHERE id_reg = '$username'";
	$query = $sub->executeQuery($SQL);
	$sq = $sub->executeQuery($Q2);
	$fetch = mysql_fetch_object($query);
	if($fetch->status == "lock"){
?>
	
			<h1>Upload Bukti Pembayaran Lomba Puisi</h1>
			<p>Jika Anda sudah melakukan pembayaran melalui bank, silahkan anda upload bukti pembayaran melalui form di bawah ini.</p><br/>
	<fieldset>
		<legend>FORM UPLOAD</legend>
			<p>
				<form name="frm_upload" method="POST" action="./index.php?View=User&Menu=Upload_Cash&id_user=<?php echo $id_user;?>&lomba_kategori=<?echo $kategori_lomba;?>" enctype="multipart/form-data">
				<table border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td>ID Registrasi </td>
						<td> : </td>
						<td><b><?echo $username;?></b></td>
					</tr>	
					<tr>
						<td>Upload File </td>
						<td> : </td>
						<td><input type="file" name="upload" width="150"/></td>
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
	}else if($fetch->status == "active"){
	
?>				
	<fieldset>	
		<legend>Unduh Formulir Peserta dengan ID Registrasi : <b><?echo $fetch->id_registrasi;?></b> </legend>
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
	
	$data = mysql_fetch_object($sq);
?>			
		<p>
		<fieldset>
			<legend>DETAIL INFO ANDA : <b><?echo $data->nama;?></b></legend>
				<span style="margin-left:20px;font-size:14px;"><table border="0">
					<tr>
						<td>ID Registrasi</td>
						<td> : </td>
						<td><?echo $data->id_reg;?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td> : </td>
						<td><?echo $data->nama;?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td> : </td>
						<td><?echo $data->alamat;?></td>
					</tr>
					<tr>
						<td>Tempat / Tanggal Lahir</td>
						<td> : </td>
						<td><?echo $data->tempat_lahir.", ".$data->tgl_lahir;?></td>
					</tr>
					<tr>
						<td>No.Hp/Telp</td>
						<td> : </td>
						<td><?echo $data->handphone;?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td> : </td>
						<td><?echo $data->email;?></td>
					</tr>
					<tr>
						<td>Asal Kota</td>
						<td> : </td>
						<td><?echo $data->asal_kota;?></td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td> : </td>
						<td><?echo $data->asal_sekolah;?></td>
					</tr>
					<tr>
						<td>Alamat Sekolah</td>
						<td> : </td>
						<td><?echo $data->alamat_sekolah;?></td>
					</tr>
					<tr>
						<td>Judul Puisi</td>
						<td> : </td>
						<td><?echo $data->judul_puisi;?></td>
					</tr>
					<tr>
						<td>Tanggal Registrasi</td>
						<td> : </td>
						<td><?echo $data->reg_time;?></td>
					</tr>
						<td>Status</td>
						<td> : </td>
						<td><?
						  if($fetch->status == "lock"){	
							echo "Belum Lunas";
						  }else{	
							echo "Lunas";
						  }
						?>
						</td>
					</tr>
					
				</table></span>	
				
				</fieldset>