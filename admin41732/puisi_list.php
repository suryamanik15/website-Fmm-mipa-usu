<?
	$qc = mysql_query("SELECT * FROM tbl_puisi") or die(mysql_error());
	$num = mysql_num_rows($qc);
	if($num <= 0){
		echo "<p align=\"center\">Belum ada Data Registrasi Peserta Kategori Lomba Puisi...</p>";
	}else{
?>
				<table>
					<tr>
						<th>ID Registrasi</th>
						<th>Nama </th>
						<th>Tempat/Tanggal Lahir</th>
						<th>Alamat</th>
						<th>No.Telp/HP</th>
						<th>Email</th>
						<th>Reg Date</th>
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
					
			$query = mysql_query("SELECT * FROM tbl_puisi ORDER BY id_reg ASC LIMIT $posisi,$batas") or die(mysql_error());
			while($admin = mysql_fetch_array($query)){
		?>	
					<tr>
						<td><?php echo $admin['id_reg']; ?></td>
						<td><?php echo $admin['nama']; ?></td>
						<td><?php echo $admin['tempat_lahir'].", ".$admin['tgl_lahir']; ?></td>
						<td><?php echo $admin['alamat'];?></td>
						<td><?php echo $admin['handphone'];?></td>
						<td><?php echo $admin['email']; ?></td>
						<td><?php echo $admin['reg_time']; ?></td>
						<td><a href="show_puisi_detail.php?id=<? echo $admin['id_reg']; ?>">VIEW DETAIL</a></td>
						<td><a href="edit_puisi.php?id=<? echo $admin['id_reg']; ?>">Edit</a></td>
						<td><a href="delete_puisi.php?id=<?php echo $admin['id_reg'];?>">Delete</a></td>
					</tr>
		<?php
			}
		?>			
				</table>
			<?php	
								$query2 = "SELECT * FROM tbl_puisi";
								$file="data_registrasi.php#tab04";
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