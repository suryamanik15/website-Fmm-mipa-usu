<?php
	include('conn_db.php');
	include('controller.php');
	include('app_sub.php');
	$sub = new APPSUB();
	
	// defines
	define('VIEW_BASE_DIR','./site');
	
	// cek the GET value address
	if(!isset($_GET['View']) && !isset($_GET['Menu'])){
		//header('Location:/FMM/site/home.php');
		$view = "User";
		$menus = "Utama";
	}else{
		$view = $_GET['View'];
		$menus = $_GET['Menu'];
	}
	
	// create new Controller Object
	$c_OBJ = new Controller();
	$c_OBJ->setDirPath($view, $menus);
	