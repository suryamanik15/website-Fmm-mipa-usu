<?php

class APPSUB{
	
	public function seeMore4($teks){
		
		$exp = explode(".",$teks);
		$prg = $exp[0].".".$exp[1].".".$exp[2].".".$exp[3].".";
	
		return $prg;
	}
	public function seeMore($teks){
		$str = substr($teks, 0 , 200);
		$str = $str."...";
		return $str;
	}
	public function seeMore3($teks){
		$exp = explode(".",$teks);
		$prg = $exp[0].".";
		
		return $prg;
	}
	
	public function changeDateFormat($date){
		$exp = explode("-",$date);
		$new_format = $exp[2]."-".$exp[1]."-".$exp[0];
		
		return $new_format;
	}
	
	public function executeQuery($query){
		$sql = mysql_query($query) or die(mysql_error());
		return $sql;
	}
	
	public function num_rows($query){
		$process = mysql_query($query) or die(mysql_error());
		return mysql_num_rows($process);
	}
}
	
