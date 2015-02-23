<?php
	$host = "localhost";
	$root = "root";
	$password = "";
	$db_name = "dbmmusu";
	
    $koneksi = mysql_connect($host,$root,$password) or die ("Gagal koneksi ke server !!");
	$database = mysql_select_db($db_name) or die("Gagal memilih database !!");
	
?>