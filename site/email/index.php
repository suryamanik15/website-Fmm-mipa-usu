<?php
 if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
	$email = $_POST['email'];
	$query = $_POST['message'];
	$email_from = $name.'<'.$email.'>';

 $to = "suryaBubur52@gmail.com";
 $subject="PESAN KONTAK USER!";
 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= "From: ".$email_from."\r\n";
 $message="	  
 	   
 		 Nama:
		 $name 	   
         <br>
 		 Email-Id:
		 $email 	   
         <br>
 		 Pesan:
		 $query 	   
      
   ";
	if(mail($to,$subject,$message,$headers))
		header("Location:/FMM/index.php?View=User&Menu=Kontak&msg=Pesan berhasil terkirim! Terima Kasih telah mengontak kami...");
	else
		header("Location:/FMM/index.php?View=User&Menu=Kontak&msg=Error, gagal terkirim ke email !");
		//contact:-your-email@your-domain.com
 }
?>
