<?php
	//require './mailer/PHPMailerAutoload.php';
	// koneksi ke database
	$dbhost		= "localhost";
	$dbuser		= "root";
	$dbpassword	= "";
	$database	= "dbmmusu";
	$sqli = new mysqli($dbhost, $dbuser, $dbpassword, $database); 
	
	if($sqli->connect_errno){
		echo "ERROR : ".$sqli->connect_errno;
	}
	
	$con = new Controller();
	//$sub = new APPSUB();
	
	$nama_tim = $_POST['nama_tim'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$email = $_POST['email'];
	$dt = getdate();
	$tgl = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	$tm = $dt['hours'].":".$dt['minutes'].":".$dt['seconds'];
	$in_time = $tgl." ".$tm;
	
	// biodata ketua TIM
	$nama_ketua = $_POST['nama_ketua'];
	$asal_sekolah_k = $_POST['asal_sekolah_k'];
	$tmp_lahir_k = $_POST['tmp_lahir_k'];
	$tgl_lahir_k = $_POST['tahun_k']."-".$_POST['bulan_k']."-".$_POST['tanggal_k'];
	$email_tim = $_POST['email'];
	$hp_k = $_POST['hp_k'];
	$alamat_k = $_POST['alamat_k'];
	
	//File Foto Ketua
	$foto_nama = $_FILES['upload']['name'];
	$foto_size = $_FILES['upload']['size'];
	$foto_type = $_FILES['upload']['type'];
	$foto_temp = $_FILES['upload']['tmp_name'];
	$extension = "";
	if($foto_type == "image/jpeg" OR $foto_type == "image/pjpeg"){
		$extension = "jpg";
	}else if($foto_type == "image/png"){
		$extension = "png";
	}else if($foto_type == "image/gif"){
		$extension = "gif";
	}	
	
	$rename = $nama_tim."-"."KTI.".$extension;
	$dir_foto_1 = "./RPanel/files/karya_tulis/".$rename;
	$link = "hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=karya_tulis_ilmiah";
	
		if(empty($_FILES['upload'])){
			$message = "Maaf, harus ada file yang di upload!!";
			header("Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=fail&message=".$message);
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
			
			// GET ID Registrasi
			$id_r = $con->getTimKtiID();
			$q = "INSERT INTO tbl_kti VALUES('$id_r','$nama_tim','$asal_sekolah','$email','$tgl','$tm');";
			$q .= "INSERT INTO kti_list_member VALUES('$id_r','$nama_ketua','$tmp_lahir_k','$tgl_lahir_k', 
					'$hp_k','$alamat_k','ketua','$rename');";
			$q .= "INSERT INTO user VALUES(null,'$id_r',MD5('$password'),'lock');";		
			$q .= "INSERT INTO userlist VALUES(null,'$id_r','$password','$email','$link','$in_time');";
			// proses upload file poto
			$upload = move_uploaded_file($foto_temp , $dir_foto_1);
			
				//$query = $sqli->multi_query($qk);
				
				
				$dir_foto = "./RPanel/files/karya_tulis/";
				for($i = 0; $i < count($_POST['nama']); $i++){
					// variabel anggota
					$nama = $_POST['nama'][$i];
					$asal = $_POST['asal'][$i];
					$tmp_lahir = $_POST['tmp_lahir'][$i];
					$t_lahir = $_POST['tahun'][$i]."-".$_POST['bulan'][$i]."-".$_POST['tanggal'][$i];
					$alamat = $_POST['alamat'][$i];
					$telp = $_POST['telp'][$i];
					//File Foto
					$nf = $_FILES['image']['name'][$i];
					$tf = $_FILES['image']['type'][$i];
					$tmp = $_FILES['image']['tmp_name'][$i];
					if($tf == "image/jpeg" OR $tf == "image/pjpeg"){
							$ext = "jpg";
					}else if($tf == "image/png"){
							$ext = "png";
					}else if($tf == "image/gif"){
							$ext = "gif";
					}	
					$new_file = $nama_tim."-"."KTI".($i + 1).".".$ext;
					//$new_dir = $dir_foto.$new_file;
					$q .= "INSERT INTO kti_list_member VALUES('$id_r','$nama','$tmp_lahir','$t_lahir' ,
							'$telp','$alamat','anggota','$new_file');";
					//move_uploaded_file($tmp , $new_dir);
							
				}
				
				$last_query = $sqli->multi_query($q);
				
				if($last_query){
					header("Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=success");
				}else{
					$message = "Maaf, proses registrasi gagal !!";
					header('Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=fail&message='.$message);
				}
			}	
					
		/*	
				if($last_query){
					//header('Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=success');
					$subject = "Konfirmasi ID Username dan Password Panel MSC 2015";
					$body = "Terima Kasih Saudara : ".$nama_ketua." atas registrasinya untuk kategori Lomba <b>Karya Tulis Ilmiah</b>..<br/><br/>
							 Setelah melakukan registrasi sebelumya, dibawah ini akan disertakan link beserta ID Username dan password <br/>
							 untuk melakukan login ke dalam Panel MSC..<br/><br/>
							 Anda bisa login ke sistem dan jika anda belum membayarkan biaya registrasi ke bank, maka anda belum bisa <br/>
							 mencetak kartu peserta anda.<br/>
							 Jika sudah membayar, maka anda mengupload bukti pembayaran bank ke form upload yang tersedia di Panel.<br/>
							 Setelah itu tunggu konfirmasi dari pihak panitia, setelah itu anda baru dapat mengunduh file kartu peserta MSC<br/><br/>
							 Berikut ini merupakan link beseta username dan password sistem panel MSC :
							 <ul>
								<li>Link CPanel disini : hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=karya_tulis_ilmiah</li>
								<li>Username : ".$id_r." </li>
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
								$message = "Proses Pengiriman email gagal !!";
								header("Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=fail&message=".$message);
						}else{
								header("Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=success");
						}
					
				}else{
					$message = "Maaf, proses registrasi gagal !!";
					echo $message;
					header('Location:./index.php?View=User&Menu=Reg_Karya_Tulis&mode=fail&message='.$message);
				}
				*/
			
		
	