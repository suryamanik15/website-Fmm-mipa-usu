<?php
	// Fungsi untuk melakukan deskripsi pada plaintext
	function encrypt($text){
		$iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$key = "kunci rahasiaku";
		
		//proses enkripsi
		$cryptext = mcrypt_encrypt(MCRYPT_3DES, $key, $text, MCRYPT_MODE_ECB, $iv);
		return $cryptext;
	}
	
	// Fungsi untuk melakukan enkripsi pada Cyphertext
	function decrypt($enkrip_text){
		$iv_size = mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$key = "kunci rahasiaku";
		
		//proses dekripsi
		$decryptext = mcrypt_decrypt(MCRYPT_3DES, $key, $enkrip_text, MCRYPT_MODE_ECB, $iv);
		return $decryptext;
	}
	
?>