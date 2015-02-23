<?php
	//require './mailer/PHPMailerAutoload.php';
	// koneksi ke database
	$dbhost		= "localhost";
	$dbuser		= "root";
	$dbpassword	= "";
	$database	= "dbmmusu";
	$sqli = new mysqli($dbhost, $dbuser, $dbpassword,$database); 
	
	if($sqli->connect_errno){
		echo "ERROR : ".$sqli->connect_errno;
	}
	
	$con = new Controller();
	//$sub = new APPSUB();
	
	$nama_tim = $_POST['nama_tim'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$judul = $_POST['judul_lagu'];
	$email = $_POST['email'];
	
	// biodata ketua TIM
	$nama_ketua = $_POST['nama_ketua'];
	$asal_sekolah_k = $_POST['asal_sekolah_k'];
	$tmp_lahir_k = $_POST['tmp_lahir_k'];
	$tgl_lahir_k = $_POST['tahun_k']."-".$_POST['bulan_k']."-".$_POST['tanggal_k'];
	$email_tim = $_POST['email'];
	$hp_k = $_POST['hp_k'];
	$alamat_k = $_POST['alamat_k'];
	
	//File Foto Ketua
	$foto_nama = $_FILES['image_k']['name'];
	$foto_size = $_FILES['image_k']['size'];
	$foto_type = $_FILES['image_k']['type'];
	$foto_temp = $_FILES['image_k']['tmp_name'];
	$rename = $nama_tim."-"."VIDEO_LAGU.".$foto_nama;
	$dir_foto_1 = "./RPanel/files/video_lagu/".$rename;
	
	// date information
	$waktu = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	$time = $dt['hours'].":".$dt['minutes'].":".$dt['seconds'];
	$in_time = $waktu." ".$time;
	
	// link information
	$link = "hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=video_lagu";
	$id_registrasi = $con->getTimVideoID();
	
	if($nama_ketua == '' AND $asal_sekolah_k == '' AND $tmp_lahir_k == ''){
			$message = "Maaf, data Ketua Tim tidak boleh dikosongkan !!";
			header("./index.php?View=User&Menu=Reg_Video&mode=fail&message=".$message);
			exit;
	}else {
		if($foto_nama == ''){
			$message = "Maaf, harus ada file yang di upload!!";
			header("./index.php?View=User&Menu=Reg_Video&mode=fail&message=".$message);
			exit;
		}else{
			//Random generate alfabhet processing
			$alfabhet = array('a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N' ,
						'o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z','1','2','3','4','5','6',
						'7','8','9','10');
			$password = "";
			for($j = 0; $j < 10; $j++){
				$nA = count($alfabhet);
				$karakter = $alfabhet[rand(0,$nA)];
				$password.=$karakter;
			}
			
			$q = "INSERT INTO tim_video VALUES('$id_registrasi','$nama_tim','$asal_sekolah','$judul','$email');";
			$q .= "INSERT INTO vid_list_member VALUES('$id_registrasi','$nama_ketua','$tmp_lahir_k','$tgl_lahir_k', 
					'$hp_k','$alamat_k','ketua','$rename');";
			$q .= "INSERT INTO user VALUES(null,'$id_registrasi',MD5('$password'),'lock');";
			$q .= "INSERT INTO userlist VALUES(null,'$id_registrasi','$password','$email','$link','$in_time');";	
			
			// Upload File Process
			$upload = move_uploaded_file($foto_temp , $dir_foto_1);
			
				for($i = 0; $i < count($_POST['nama']); $i++){
					// variabel anggota
					$nama = $_POST['nama'][$i];
					$asal = $_POST['asal'][$i];
					$tmp_lahir = $_POST['tmp_lahir'][$i];
					$t_lahir = $_POST['tahun'][$i]."-".$_POST['bulan'][$i]."-".$_POST['tanggal'][$i];
					$alamat = $_POST['alamat'][$i];
					$telp = $_POST['telp'][$i];
					
					// Create new file
					$new_file = "placeholder.gif";
					//$dir_foto = "./RPanel/files/video_lagu/".$new_file;
					//upload process
					//move_uploaded_files($tmp, $dir_foto);
					//insert query
					$q .= "INSERT INTO vid_list_member VALUES('$id_registrasi','$nama','$tmp_lahir','$t_lahir' ,
							'$telp','$alamat','anggota','$new_file');";	
					
					
				}
				$last_query = $sqli->multi_query($q);
				
				if($last_query){
					$message = "Proses Registrasi Lomba Video gagal !!";
					header("Location:./index.php?View=User&Menu=Reg_Video&mode=fail&message=".$message);
				}else{
					header("Location:./index.php?View=User&Menu=Reg_Video&mode=success");
				}	
				
			/*			
					$subject = "Konfirmasi ID Username dan Password Panel MSC 2015";
					$body = "Terima Kasih Saudara : ".$nama_ketua." atas registrasinya untuk kategori lomba Video Lagu..<br/><br/>
							 Setelah melakukan registrasi sebelumya, dibawah ini akan disertakan link beserta ID Username dan password <br/>
							 untuk melakukan login ke dalam Panel MSC..<br/><br/>
							 Anda bisa login ke sistem dan jika anda belum membayarkan biaya registrasi ke bank, maka anda belum bisa <br/>
							 mencetak kartu peserta anda.<br/>
							 Jika sudah membayar, maka anda mengupload bukti pembayaran bank ke form upload yang tersedia di Panel.<br/>
							 Setelah itu tunggu konfirmasi dari pihak panitia, setelah itu anda baru dapat mengunduh file kartu peserta MSC<br/><br/>
							 Berikut ini merupakan link beseta username dan password sistem panel MSC :
							 <ul>
								<li>Link CPanel : <b>hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=video_laguLogin Panel</b></li>
								<li>Username : ".$id_registrasi." </li>
								<li>Password : ".$password."</li>
							 </ul>	
							";
					date_default_timezone_set('Etc/UTC');

					//Create a new PHPMailer instance
					$mail = new PHPMailer;

					//Tell PHPMailer to use SMTP
					$mail->isSMTP();

					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;

					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';

					//Set the hostname of the mail server
					$mail->Host = 'ssl://smtp.gmail.com';

					//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
					$mail->Port = 465;

					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'ssl';

					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;

					//Username to use for SMTP authentication - use full email address for gmail
					$mail->Username = "msc2015fmipausu@gmail.com";

					//Password to use for SMTP authentication
					$mail->Password = "@msc2015hmmfmipausu";

					//Set who the message is to be sent from
					$mail->setFrom('msc2015fmipausu@gmail.com', 'MSC 2015');

					//Set an alternative reply-to address
					$mail->addReplyTo('msc2015fmipausu@gmail.com', 'MSC 2015');

					//Set who the message is to be sent to
					$mail->addAddress($email, $nama_tim);

					//Set the subject line
					$mail->Subject = $subject;

					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML(file_get_contents('./mailer/examples/contents.html'), dirname(__FILE__));
					
					//Replace the plain text body with one created manually
					$mail->Body = $body;

						if (!$mail->send()) {
								$message = "Proses Pengiriman Email gagal !!";
								header("./index.php?View=User&Menu=Reg_Video&mode=fail&message=".$message);
						}else{
								header("./index.php?View=User&Menu=Reg_Video&mode=success");
						}
			*/
		}
	}