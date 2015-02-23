<?php
	require './mailer/PHPMailerAutoload.php';
	// create object
	$sub = new APPSUB();
	$con = new Controller();
	
	$id_registrasi = $con->getRegPuisiID();
	
	// variabel POST
	$nama_lengkap = $_POST['nama'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$tgl_lahir = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
	$alamat = $_POST['alamat'];
	$hp = $_POST['no_hp'];
	$email = $_POST['email'];
	$kota = $_POST['kota'];
	$judul_puisi = $_POST['judul_puisi'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$alamat_sekolah = $_POST['alamat_sekolah'];
	
	// File Upload
	$fname = $_FILES['upload']['name'];
	$ftype = $_FILES['upload']['type'];
	$tmp = $_FILES['upload']['tmp_name'];
	$ext = "";
	if($ftype == 'image/jpeg' OR $ftype == 'image/pjpeg'){
		$ext = ".jpg";
	}else if($ftype == 'image/png'){
		$ext = ".png";
	}else if($ftype == 'image/gif'){
		$ext = ".gif";
	}
	
	$rename = $id_registrasi.$ext;
	$dir_tujuan = "./RPanel/files/lomba_puisi/".$rename;
	
	// registration time
	$dt = getdate();
	$tgl = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	$wt = $dt['hours'].":".$dt['minutes']."-".$dt['seconds'];
	$reg_date = $tgl." ".$wt;
	
	$link = "hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=lomba_puisi";
	
	if($nama_lengkap == '' AND $tmp_lahir == '' AND $alamat == ''){
		$message = "Maaf, data anda masih belum lengkap..";
		header('Location:./index.php?View=User&Menu=Reg_Puisi&mode=fail&message='.$message);
		exit;
	}else if(empty($fname)){
		$message = "Maaf, file foto anda belum anda upload..";
		header('Location:./index.php?View=User&Menu=Reg_Puisi&mode=fail&message='.$message);
		exit;
	}else {
		$upload = move_uploaded_file($tmp, $dir_tujuan);
		
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
			
			$Q1 = "INSERT INTO tbl_puisi VALUES('$id_registrasi','$nama_lengkap','$tmp_lahir','$tgl_lahir','$alamat', 
					'$hp','$email','$kota','$judul_puisi','$asal_sekolah', '$alamat_sekolah','$rename','$reg_date')";
			$Q2	= "INSERT INTO user VALUES(null,'$id_registrasi',MD5('$password'),'lock')";
			$Q3 = "INSERT INTO userlist VALUES(null,'$id_registrasi','$password','$email','$link','$reg_date')";
			
			$query = $sub->executeQuery($Q1) AND $sub->executeQuery($Q2) AND $sub->executeQuery($Q3);
			if($query){
					header('Location:./index.php?View=User&Menu=Reg_Lomba_Puisi&mode=success');
					exit;
			}else{
					$message = "Proses registrasi gagal !!";
					header('Location:./index.php?View=User&Menu=Reg_Lomba_Puisi&mode=fail&message='.$message);
					exit;
			}
			
			/*
					$subject = "Konfirmasi Username dan Password Panel MSC 2015";
					$body = "Username : ".$id_registrasi."<br/>Password : ".$password."<br/>
							Link CPanel : <b>hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=lomba_puisi</b>
							User CPanel.</a><br/>";		
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
					$mail->addAddress($email, $nama_lengkap);

					//Set the subject line
					$mail->Subject = $subject;

					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML(file_get_contents('./mailer/examples/contents.html'), dirname(__FILE__));
					
					//Replace the plain text body with one created manually
					$mail->Body = $body;
					
					if (!$mail->send()) {
						$message = "Proses Pengiriman Email gagal !!";
						header("./index.php?View=User&Menu=Reg_Lomba_Puisi&mode=fail&message=".$message);
					}else{
							
					}		
				*/
	}
	
