<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HIMATIF Login Administrator</title>
<link rel="icon" type="image/png" href="image/HIMATIF.png" />
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style type="text/css">
.note{
	display:none;
}
</style>
<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
 	 <h1>Generate Password</h1>
    	<div id="login">
    	  <p class="tip">Silahkan masukkan Username anda dan klik tombol 'Generate', supaya sistem dapat melakukan generate password anda.</p>
<?php
	$err = $_GET['err'];
	$message = $_GET['message'];
	
	if(isset($err)){
?>		  
		  <p class="error"><?php echo $err; ?></p>
<?php
	}else if(isset($message)){
?>
		 <p style="color:green;"><?php echo $message; ?></p>
<?php
	}
?>		 
	  <form id="generate" name="generate" method="post" action="function/generate.php">
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="text_user" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p class="note">
    	      <label><strong>Password</strong>
  <input type="password" name="textfield2" class="inputText" id="textfield2" />
  	        </label>
    	    </p>
    			<input type="submit" class="black_button" value="Generate" />       
    	  </form>
		  <br clear="all" />
    	</div>
        <div id="forgot"> 
        <a href="login.php" class="forgotlink"><span>Kembali ke Menu Login</span></a></div>
  </div>
</div>
<br clear="all" />
</body>
</html>
