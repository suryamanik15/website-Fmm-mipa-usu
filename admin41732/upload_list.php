<?
	include "function/koneksi.php";
	$qc = mysql_query("SELECT * FROM tbl_upload") or die(mysql_error());
	$num = mysql_num_rows($qc);
	if($num <= 0){
		echo "<p align=\"center\">Belum ada Data Bukti Pembayaran Yang Di Upload</p>";
	}else{
?>
				<table>
					<tr>
						<th>ID Registrasi</th>
						<th>Image </th>
						<th>Tanggal Upload</th>
						<th colspan="3">AKSI</th>
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
					
			$query = mysql_query("SELECT * FROM tbl_upload ORDER BY tgl_upload DESC LIMIT $posisi,$batas") or die(mysql_error());
			while($data = mysql_fetch_object($query)){
		?>	
					<tr>
						<td><?php echo $data->id_reg; ?></td>
						<td><img src="../RPanel/files/upload/<?echo $data->image;?>" width="150" height="120"/></td>
						<td><?php echo $data->tgl_upload; ?></td>
						<td><a href="function/upload_detail.php?id=<? echo $data->id_reg; ?>">UBAH MODE</a></td>
						<td><a href="function/delete_upload.php?id=<?php echo $data->id_reg;;?>">DELETE</a></td>
					</tr>
		<?php
			}
		?>			
				</table>
			<?php	
								$query2 = "SELECT * FROM tbl_upload";
								$file="data_registrasi.php#tab05";
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
		}						
				?>