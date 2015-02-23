<?php
	require './mailer/PHPMailerAutoload.php';
	$obj = new Controller();
	
       // All Data Registration
	
       $nama = $_POST['nama'];
       
       $no_peserta = $_POST['no_peserta'];
	
	
       $tmp_lahir = $_POST['tmp_lahir'];
	
       $tgl_lahir = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal'];
	
       $alamat = $_POST['alamat'];
	
       $telp = $_POST['telepon'];
	
       $email = $_POST['email'];
	
       $asal_sekolah = $_POST['asal_sekolah'];
	
       $alamat_sekolah = $_POST['alamat_sekolah'];
	
	
	$tingkat = $_POST['tingkat'];
	$class = $_POST['class'];
	$ID = $obj->getRegisterID();
	$dt = getdate();
	$waktu = $dt['year']."-".$dt['mon']."-".$dt['mday'];
	$time = $dt['hours'].":".$dt['minutes'].":".$dt['seconds'];
	$in_time = $waktu." ".$time;
	
	//Files Upload
	$fname = $_FILES['image_file']['name'];
	$fsize = $_FILES['image_file']['size'];
	$type = $_FILES['image_file']['type'];
	$tmp = $_FILES['image_file']['tmp_name'];
	$ext = "";
 
	if($type == 'image/jpeg' OR $type == 'image/pjpeg'){
		$ext = ".jpg";
	}else if($type == 'image/png'){
		$ext = ".png";
	}else if($type == 'image/gif'){
		$ext = ".gif";
	}
	
	$name_file = $nama."-".$ID.$ext;
	$dest = "./RPanel/files/olimpiade/".$name_file;
	$link = "hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=olimpiade_matematika";
	
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
             
             // uploading file
	     $upload = move_uploaded_file($tmp, $dest);
              
             $query = mysql_query("INSERT INTO registrasi VALUES('$ID','$nama','$alamat','$tmp_lahir','$tgl_lahir','$telp','$email',
										'$asal_sekolah','$alamat_sekolah','$class','$tingkat','$name_file','$waktu','$time')") AND
										mysql_query("INSERT INTO user VALUES(null,'$ID',MD5('$password'),'lock')") AND
										mysql_query("INSERT INTO userlist VALUES(null,'$ID','$password','$email','$link','$in_time')")
										or die(mysql_error());
						if($query){
			
								header('Location:./index.php?View=User&Menu=Registrasi&mode=success');
						}else{
                                header('Location:./index.php?View=User&Menu=Registrasi&mode=fail');
                        }
	
             // create mail subject
	/*                              $subject = "Konfirmasi Username dan Password Panel MSC 2015";
					$body = "Username : ".$ID."<br/>Password : ".$password."<br/>
							Link CPanel : <b>hmm-fmipausu.org/index.php?View=User&Menu=MSC&lomba_kategori=olimpiade_matematika</b><br/>";
					//SMTP needs accurate times, and the PHP time zone MUST be set
					//This should be done in your php.ini, but this is how to do it if you don't have access to that
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
					$mail->addAddress($email, $nama);

					//Set the subject line
					$mail->Subject = $subject;

					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML(file_get_contents('./mailer/examples/contents.html'), dirname(__FILE__));

					//Replace the plain text body with one created manually
					$mail->Body = $body;

					//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');

					//send the message, check for errors
					if (!$mail->send()) {
							$message = "Proses Pengiriman Email gagal";
							header("Location:./index.php?View=User&Menu=Registrasi&mode=fail&message=".$message);
					} else {
						//header('Location:./index.php?View=User&Menu=Registrasi&mode=success');
						$query = mysql_query("INSERT INTO registrasi VALUES('$ID','$nama','$alamat','$tmp_lahir','$tgl_lahir','$telp','$email',
										'$asal_sekolah','$alamat_sekolah','$class','$tingkat','$name_file','$waktu','$time');
										INSERT INTO user VALUES(null,'$ID',MD5('$password'),'lock');") or die(mysql_error());
						if($query){
			
								header('Location:./index.php?View=User&Menu=Registrasi&mode=success');
						}else{
                                                                header('Location:./index.php?View=User&Menu=Registrasi&mode=fail');
                                                  }
					}
		 
	
	*/
	