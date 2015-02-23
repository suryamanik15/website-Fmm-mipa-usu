<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "dbmmusu";
	$db = @mysql_connect($host, $user, $password) or die(mysql_error()); 
    @mysql_select_db($database) or die("Error conecting to db."); 