<?php
$nama = "Mathematics Science Competitions 2015";
include("./pdf/mpdf.php");

$Q1 = mysql_query("SELECT * FROM tbl_kti WHERE id_kti = '$id'") or die(mysql_error());
$Q2 = mysql_query("SELECT * FROM kti_list_member WHERE id_kti = '$id'") or die(mysql_error());
$data = mysql_fetch_object($Q1);
$jum = mysql_num_rows($Q2);
$mpdf=new mPDF('c','A4','','',32,25,47,47,10,10); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<div width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; 
	color: #000088;">
<img src="./RPanel/image/msc_2015.png" align="left">
<center><b>'.$nama.'</b></center>	
</div>
';
$headerE = '
<div width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; 
	color: #000088;">
<img src="./RPanel/image/msc_2015.png" align="left">
<center><b>'.$nama.'</b></center>	
</div>
';

$footer = '<div align="center"><b>'.$nama.'</b></div>';
$footerE = '<div align="center"><b>'.$nama.'</b></div>';


$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($headerE,'E');
$mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footerE,'E');

$html = '
<center><h1>KARTU PESERTA LOMBA KARYA TULIS ILMIAH</h1></center>
<h3>Harap Dicetak dan diberikan kepada panitia sebagai bukti sah registrasi..</h3>
<p>
	<table border = "0" cellspacing="5" cellpadding="2">
		<tr>
			<td>ID Tim</td>
			<td> : </td>
			<td><span style="color:green;">'.$data->id_kti.'</span></td>
		</tr>
		<tr>
			<td>Nama Tim</td>
			<td> : </td>
			<td><span style="color:green;">'.$data->nama_tim.'</span></td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td> : </td>
			<td><span style="color:green;">'.$data->asal_sekolah.'</span></td>
		</tr>
		<tr>
			<td>Email</td>
			<td> : </td>
			<td><span style="color:green;">'.$data->email.'</span></td>
		</tr>
		<tr>
			<td>Tanggal Registrasi</td>
			<td> : </td>
			<td><span style="color:green;">'$data->tgl_daftar." ".$data->waktu_daftar.'</span></td>
		</tr>
	</table>
</p>
';

$html .= '<p>Jumlah Orang dalam Anggota : <b>'.$jum.'</b> orang.</p><br/>';
while($list = mysql_fetch_object($Q2)){
	$html .= '<p><img src="./RPanel/files/karya_tulis/"'.$list->image.'" align="left" width="50" height="50">
				 <table border="0">
					<tr>
						<td>Nama</td><td> : </td><td>'.$list->nama.'</td>
					</tr>
					<tr>
						<td>Status</td><td> : </td><td>'.$list->status.'</td>
					</tr>
				 </table>	
			</p>
	';
}

$html .= '<br/>
		  <pagebreak />';

$mpdf->WriteHTML($html);

$filename = $id.".pdf";

$mpdf->Output($filename,'I');

exit;

?>