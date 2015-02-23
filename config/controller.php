<?php
class Controller {
	
	public function setDirPath($view , $menus){
		
		switch($view){
			case "User" :
					switch($menus){
						case "Registrasi":
								//header('Location:/FMM/site/registation.php');
								if(file_exists('./site/registration.php')){
									include('./site/registration.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Berita" :
								//header('Location:/FMM/site/news.php');
								if(file_exists('./site/news.php')){
									include('./site/news.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Informasi" :
								//header('Location:/FMM/site/information.php');
								if(file_exists('./site/information.php')){
									include('./site/information.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Galeri" :
								//header('Location:/FMM/site/gallery.php');
								if(file_exists('./site/gallery.php')){
									include('./site/gallery.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Utama"	:
								//header('Location:/FMM/site/home.php');
								if(file_exists('./site/home.php')){
									include('./site/home.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "About" :
								//header('Location:/FMM/site/about.php');
								if(file_exists('./site/about.php')){
									include('./site/about.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Kontak" :
								if(file_exists('./site/contact.php')){
									include('./site/contact.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Submit_Register" :
								if(file_exists('./site/reg_submit.php')){
									include('./site/reg_submit.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Page" :
								if(file_exists('./site/pages.php')){
									include('./site/pages.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Submit_Contact" :
								if(file_exists('./site/email/index.php')){
									include('./site/email/index.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "View_all_post" :
								if(file_exists('./site/view_all_post.php')){
									include('./site/view_all_post.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "CPanel" :
								if(file_exists('./RPanel/home.php')){
									include('./RPanel/home.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "MSC" :
								if(file_exists('./RPanel/login.php')){
									include('./RPanel/login.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Reg_Video":
								if(file_exists('./site/reg_video.php')){
									include('./site/reg_video.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Reg_Karya_Tulis" :
								if(file_exists('./site/reg_karya_tulis.php')){
									include('./site/reg_karya_tulis.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Reg_Lomba_Puisi" :
								if(file_exists('./site/reg_puisi.php')){
									include('./site/reg_puisi.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Submit_Reg_Video" :
								if(file_exists('./site/submit_video.php')){
									include('./site/submit_video.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Submit_Reg_Karya_Tulis" :
								if(file_exists('./site/submit_karya_tulis.php')){
									include('./site/submit_karya_tulis.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Submit_Puisi" :
								if(file_exists('./site/submit_puisi.php')){
									include('./site/submit_puisi.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Print" :
								if(file_exists('./RPanel/print_preview.php')){
									include('./RPanel/print_preview.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Upload_Cash" :
								if(file_exists('./RPanel/function/submit_upload.php')){
									include('./RPanel/function/submit_upload.php');
								}else{
									include('./site/show_404.php');
								}
								break;
						case "Doc_Ketentuan" :
								if(file_exists('./RPanel/files/ketentuan MSC.docx')){
									echo "<a href=\"./RPanel/files/ketentuan MSC.docx\"></a>";
								}else{
									include('./site/show_404.php');
								}
								break;
						default :
								include('./site/show_404.php');
								break;
					}
				break;
			case "Administrator" :
					switch($menus){
						case "Daftar Peserta":
								if(file_exists('./admin41732/peserta.php')){
									include('./admin41732/peserta.php');
								}else{
									include('./site/show_404.php');
								}	
								break;
						case "Edit Peserta":
								if(file_exists('./admin41732/peserta.php#edit')){
									include('./admin41732/peserta.php#edit');
								}else{
									include('./site/show_404.php');
								}	
								break;
								
					}
				break;
				
			case "Act" :
				switch($menus){
					case "Set_Notif_Act":
						header('Location:./site/act.php');
						break;
					case "Submit_Login" :
						include('./RPanel/function/submit.php');
						break;
					case "Print_Card" :
						if(file_exists('./pdf/link.php')){
									include('./pdf/link.php');
								}else{
									include('./site/show_404.php');
								}	
						break;
					case "Logout" :
								include('./RPanel/function/logout.php');
							break;	
				}
			break;
			
		}
	
	
	}
	
	public function getRegisterID(){
		$sq = mysql_query("SELECT * FROM registrasi") or die(mysql_error());
		$num_row = mysql_num_rows($sq);
		$DT = getdate();
		$DR = $DT['year']."".$DT['mon']."".$DT['mday'];
		if($num_row <= 0){
			$number = 1;
			$id_reg = "REG".$DR."0".$number;
		}else{
			$number = $num_row + 1;
			if($number < 10){
				$id_reg = "REG".$DR."0".$number;
			}else{
				$id_reg = "REG".$DR.$number;
			}
		}
			return $id_reg;
	}
	
	/* Kode Lomba Video 03  */
	public function getTimVideoID(){
		$version = "03";
		$sq = mysql_query("SELECT * FROM tim_video") or die(mysql_error());
		$num_row = mysql_num_rows($sq);
		$DT = getdate();
		$DR = $DT['year']."".$DT['mon']."".$DT['mday'];
		if($num_row <= 0){
			$number = 1;
			$id_reg = "VIDEO-".$DR."-0".$number."-".$version;
		}else{
			$number = $num_row + 1;
			if($number < 10){
				$id_reg = "VIDEO-".$DR."-0".$number."-".$version;
			}else{
				$id_reg = "VIDEO-".$DR."-".$number."-".$version;
			}
		}
		return $id_reg;
	}
	
	/* Kode Lomba 02*/
	public function getTimKtiID(){
		$version = "02";
		$sq = mysql_query("SELECT * FROM tbl_kti") or die(mysql_error());
		$num_row = mysql_num_rows($sq);
		$DT = getdate();
		$DR = $DT['year']."".$DT['mon']."".$DT['mday'];
		if($num_row <= 0){
			$number = 1;
			$id_reg = "KTI-".$DR."-0".$number."-".$version;
		}else{
			$number = $num_row + 1;
			if($number < 10){
				$id_reg = "KTI-".$DR."-0".$number."-".$version;
			}else{
				$id_reg = "KTI-".$DR."-".$number."-".$version;
			}
		}
		return $id_reg;
	}
	
	/* Kode Lomba Puisi 04 */
	public function getRegPuisiID(){
		$version = "04";
		$sq = mysql_query("SELECT * FROM tbl_puisi") or die(mysql_error());
		$num_row = mysql_num_rows($sq);
		$DT = getdate();
		$DR = $DT['year']."".$DT['mon']."".$DT['mday'];
		if($num_row <= 0){
			$number = 1;
			$id_reg = "PUISI-".$DR."-0".$number."-".$version;
		}else{
			$number = $num_row + 1;
			if($number < 10){
				$id_reg = "PUISI-".$DR."-0".$number."-".$version;
			}else{
				$id_reg = "PUISI-".$DR."-".$number."-".$version;
			}
		}
		return $id_reg;
	}
}	
