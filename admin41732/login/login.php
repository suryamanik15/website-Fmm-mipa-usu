<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HMM- FMIPA USU LOGIN PANEL</title>
<!--<link rel="icon" type="image/png" href="image/HIMATIF.png" /> !---->
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />.
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Login Administator</h1>
    	<div id="login">
    	  <p class="tip">Silahkan Login ke dalam Panel Admin Website <b>HMM-FMIPA USU</b>.</p>
	<?php
		$message = $_GET['message'];
		if(isset($message)){
			
	?>
          <p class="error"><?php echo $message; ?></p>
	<?php
		}
	?>
    	  <form id="form1" name="form1" method="post" action="function/submit.php">
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
             <label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>            
    	  </form>
		  <br clear="all" />
    	</div>
  </div>
</div>
<br clear="all" />
</body>
</html>
