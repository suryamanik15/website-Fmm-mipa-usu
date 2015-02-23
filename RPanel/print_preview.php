<?
	$mode = $_GET['mode'];
	$id = mysql_real_escape_string($_GET['id']);
	
	if($mode == "olimpiade_matematika"){
		include "./pdf/link.php";
	}else if($mode == "karya_tulis_ilmiah"){
		include "./pdf/link1.php";
	}else if($mode == "video_lagu"){
		include "./pdf/link2.php";
	}else if($mode == "lomba_puisi"){
		include "./pdf/link3.php";
	}