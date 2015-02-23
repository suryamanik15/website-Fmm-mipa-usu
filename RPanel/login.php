<?php
	
	$kategori = $_GET['lomba_kategori'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MSC Competition Login Panel</title>
<link rel="icon" type="image/png" href="./site/images/msc_2015.png" />
<link href="./RPanel/css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="./RPanel/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="./RPanel/css/text.css" rel="stylesheet" type="text/css" media="all" />.
<link href="./RPanel/css/login.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="./RPanel/js/jquery-1.6.4.min.js"></script>
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Login Panel MSC</h1>
    	<div id="login">
    	  <p class="tip"  style="color:green;">Silahkan Login Ke Panel ini untuk melakukan konfirmasi pembayaran<br/>
		   serta dapat mengunduh kartu peserta lomba.</p>
	<?php
		$message = $_GET['message'];
		if(isset($message)){
			
	?>
          <p class="error"><?php echo $message; ?></p>
	<?php
		}
	?>
    	  <form id="form1" name="form1" method="POST" action="./index.php?View=Act&Menu=Submit_Login&lomba_kategori=<?php echo $kategori; ?>">
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="username" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="password" class="inputText" id="textfield2" />
  	        </label>
    	    </p>
    		<input type="submit" class="black_button" value="Login" />
                        
    	  </form>
		  <br clear="all" />
    	</div>
  </div>
</div>
<br clear="all" />
</body>
</html>
