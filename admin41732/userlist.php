<?
	include "function/koneksi.php";
	$qc = mysql_query("SELECT * FROM userlist") or die(mysql_error());
	$num = mysql_num_rows($qc);
	if($num <= 0){
		echo "<p align=\"center\">Belum ada Data User List</p>";
	}else{
?>
				<table>
					<tr>
						<th>No.</th>
						<th>Username </th>
						<th>Password</th>
						<th>Email</th>
						<th>Link</th>
						<th>In Time</th>
						<th>AKSI</th>
		<?php
				
					$batas=6;
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
			$i = 1;		
			$query = mysql_query("SELECT * FROM userlist ORDER BY id ASC LIMIT $posisi,$batas") or die(mysql_error());
			while($data = mysql_fetch_object($query)){
		?>	
					<tr>
						<td><? echo $i; ?></td>
						<td><?php echo $data->username; ?></td>
						<td><?php echo $data->password; ?></td>
						<td><?php echo $data->email; ?></td>
						<td><?php echo $data->link; ?></td>
						<td><?php echo $data->in_time; ?></td>
						<td><a href="function/del_userlist.php?id=<? echo $data->username;?>">HAPUS</a></td>
					</tr>
		<?php
				$i++;
			}
		?>			
				</table>
			<?php	
								$query2 = "SELECT * FROM userlist";
								$file="data_registrasi.php";
								$hasil2=mysql_query($query2);
								$jmldata=mysql_num_rows($hasil2);

								$jmlhalaman=ceil($jmldata/$batas);


								//link ke halaman sebelumnya (previous)
								if($halaman > 1)
								{
									$previous=$halaman-1;
									echo "<A style=text-decoration:none;color:red HREF=$file?halaman=1&batas=$batas#tab06><< First</A> | 
										<A style=text-decoration:none;color:red HREF=$file?halaman=$previous&batas=$batas#tab06>< Previous</A> ";
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
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas#tab06>$i</a> ";
								}

								$angka .= " <b>$halaman</b> ";
								for($i=$halaman+1;$i<($halaman+3);$i++)
								{
								  if ($i > $jmlhalaman) 
									  break;
								  $angka .= "<a style=text-decoration:none;color:red href=$file?halaman=$i&batas=$batas#tab06>$i</a> ";
								}

								$angka .= ($halaman+2<$jmlhalaman ? " ...  
										  <a style=text-decoration:none;color:red href=$file?halaman=$jmlhalaman&batas=$batas#tab06>$jmlhalaman</a> " : " ");

								echo "";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo "<A style=text-decoration:none;color:red; HREF=$file?halaman=$next&batas=$batas#tab06>Next ></A> | 
								  <A style=text-decoration:none;color:red; HREF=$file?halaman=$jmlhalaman&batas=$batas#tab06>Last &raquo;</A> ";
								}
								else
								{ 
									echo "";
								}
								echo "<p>Jumlah Data :  <font color=green><b>$jmldata</b></font></p>";
		}						
				?>