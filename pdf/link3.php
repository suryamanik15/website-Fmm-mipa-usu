<?php
$nama = "Mathematics Science Competitions 2015";
include("./pdf/mpdf.php");

$query = mysql_query("SELECT * FROM tbl_puisi WHERE id_reg = '$id'") or die(mysql_error());
$data = mysql_fetch_object($query);

$mpdf=new mPDF('c','A4','','',32,25,47,47,10,10); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<div width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; 
	color: #000088;">
<img src="./RPanel/image/msc_2015.png" align="left">
<center><b>'.$nama.'</b></center>	
</div>
';

$footer = '<div align="center"><b>'.$nama.'</b></div>';

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);

$html = '
<center><h1>KARTU PESERTA LOMBA PUISI</h1></center>
<h3>Harap Dicetak dan diberikan kepada panitia sebagai bukti sah registrasi..</h3>
<p>
	<table border = "0" cellspacing="5" cellpadding="2">
		<tr>
			<td>ID Registrasi</td>
			<td> : </td>
			<td>'.$data->id_reg.'</td>
		</tr>
		<tr>
			<td>Nama Peserta</td>
			<td> : </td>
			<td>'.$data->nama.'</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td> : </td>
			<td>'.$data->alamat.'</td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td> : </td>
			<td>'.$data->tempat_lahir." / ".$data->tgl_lahir.'</td>
		</tr>
		<tr>
			<td>No.Hp/Telp</td>
			<td> : </td>
			<td>'.$data->handphone.'</td>
		</tr>
		<tr>
			<td>Email</td>
			<td> : </td>
			<td>'.$data->email.'</td>
		</tr>
		<tr>
			<td>Asal Kota</td>
			<td> : </td>
			<td>'.$data->asal_kota.'</td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td> : </td>
			<td>'.$data->asal_sekolah.'</td>
		</tr>
		<tr>
			<td>Alamat Sekolah</td>
			<td> : </td>
			<td>'.$data->alamat_sekolah.'</td>
		</tr>
		<tr>
			<td>Judul Puisi</td>
			<td> : </td>
			<td><b>'.$data->judul_puisi.'</b></td>
		</tr>
		<tr>
			<td>Reg Date</td>
			<td> : </td>
			<td>'.$data->reg_time.'</td>
		</tr>
		<tr>
			<td>Gambar Foto</td>
			<td> : </td>
			<td><img src="./RPanel/files/lomba_puisi/'.$data->img_name.'" width="100" height="100"/></td>
		</tr>
	</table>
</p>
<pagebreak />
';

$mpdf->WriteHTML($html);

$filename = $id.".pdf";

$mpdf->Output($filename,'I');

exit;

?>