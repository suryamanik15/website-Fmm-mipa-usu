<?php
	$sub = new APPSUB();
	$id_posting = mysql_real_escape_string($_GET['id_post']);
	$Q = "SELECT * FROM posting WHERE id_posting = '$id_posting'";
	$c = $sub->executeQuery($Q);
	$data = mysql_fetch_object($c);	
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>HMM - FMIPA USU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="icon" type="image/png" href="./site/images/logo.png" />
    <link href="./site/scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./site/scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="./site/scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="./site/scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="./site/scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->


    <link href="http://fonts.googleapis.com/css?family=Allura" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet" type="text/css">

    <link href="./site/styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body id="pageBody">

<div id="decorative2">
    <div class="container">

        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <!--<a href="./index.php" id="divSiteTitle">HMM - FMIPA USU</a><br />-->
						<a href="./index.php" id="divSiteTitle"><img src="./site/images/logo.png" alt="Site Name" title="Site Name" /></a><br/>
                        <a href="./index.php" id="divTagLine">hmm-fmipausu.org</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                   <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            NAVIGATION <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                                <li class="dropdown"><a href="./index.php">Home</a></li>
								<li class="dropdown"><a href="./index.php?View=User&Menu=About">Tentang Kami</a></li>
                                <li class="dropdown">
                                    <a href="page.html" class="dropdown-toggle">Berita <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                        <?php
							$dmenu = "SELECT * FROM posting WHERE kategori != 'sosial' AND kategori != 'struktur'";
							$ql = $sub->executeQuery($dmenu);
							$num = $sub->num_rows($dmenu);
						while($mm = mysql_fetch_object($ql)){	
						?>
                            <li><a href="./index.php?View=User&Menu=Page&id_post=<?php echo $mm->id_posting; ?>"><?php echo $mm->judul_posting; ?></a></li>
							
						<?php
							}
						?>	
                            <!---<li><a href="2-column.html">Two Column</a></li>!--->
                            <!---<li><a href="3-column.html">Three Column</a></li>!--->
							<!---<li><a href="../documentation/index.html">Dokumentasi</a></li>--->
							<li class="dropdown">
                            <!--<a href="#" class="dropdown-toggle">Kegiatan &nbsp;&raquo;</a>-->
                            <!--<ul class="dropdown-menu sub-menu">
                            <li><a href="#">Dropdown Item</a></li>
                            <li><a href="#">Dropdown Item</a></li>
                            <li><a href="#">Dropdown Item</a></li>
                            </ul>-->
                            </li>
                            </ul>
                                </li>
                                <li class="dropdown"><a href="./index.php?View=User&Menu=Galeri">Galeri</a></li>
                                <li class="dropdown"><a href="./index.php?View=User&Menu=Kontak">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
                <a href="./index.php?View=User&Menu=Page&id=<?php echo $id_posting; ?>"><?php echo $data->judul_posting; ?></a> &nbsp;/&nbsp; <span>Diposting Oleh : <?php echo $data->pemosting; ?>, tanggal <?php echo $sub->changeDateFormat($data->tanggal_posting)." ".$data->waktu; ?></span>
            </div> 
        <!--Edit Main Content Area here-->
        <div class="row-fluid">
                <div class="span8" id="divMain">
		
                    <h1><?php echo $data->judul_posting; ?></h1>
					<p>
                    <img src="./site/images/<?php echo $data->image; ?>" class="img-polaroid" style="margin:12px 0px;">  </p>  
					
					<p><?php echo $data->isi; ?></p>
					
                </div>
				<!--Edit Sidebar Content Area here-->
                <div class="span4 sidebar">

                    <div class="sidebox">
                        <h3 class="sidebox-title">Berita Terkini</h3>
						<p></p>
						<hr>
		<?php
					$nQ = "SELECT * FROM posting WHERE kategori != 'struktur' ORDER BY tanggal_posting 
											DESC LIMIT 4";
					$nw = mysql_query($nQ) or die(mysql_error());
					$num_of_news = mysql_num_rows($nw);
					
					if($num_of_news <= 0){
						echo "<div class=\"row-fluid\">	";
						echo "<div class=\"span8\"> ";
						echo "<p>No News Available....</p> ";
						echo "</div>";
						echo "</div>";
					}else{	
							while($news_data = mysql_fetch_object($nw)){
									echo "<div class=\"row-fluid\">	";
									echo "<div class=\"span4\"> ";
									echo "<img src=\"./site/images/".$news_data->image."\" class=\"img-polaroid\" style=\"margin:5px 0px 15px;\" alt=\"\">   </div> ";
									echo "<div class=\"span8\"> ";
									echo "<p>".$sub->seeMore3($news_data->isi)."<a href='./index.php?View=User&Menu=Page&id_post=".$news_data->id_posting."'>Selengkapnya</a> </p>";
									echo "</div>";
									echo "</div>";
							}
					}		
				?>					
        
                    </div>
                    
                </div>
				<!--End Sidebar Area here-->
            </div>
			<!--End Main Content Area here-->

        <div id="footerInnerSeparator"></div>
    </div>

</div>

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span3" id="footerArea1">
                
                    <h3>Tentang HMM - FMIPA USU</h3>

                    <p><b>Himpunan Mahasiswa Matematika, Fakultas Matematika dan Ilmu Pengetahuan Alam (HMM- FMIPA USU)</b>, merupakan salah satu
					himpunan mahasiswa jurusan Matematika USU. Himpunan ini merupakan suatu wadah bagi para mahasiswa/i untuk menuangkan 
					aspirasi mereka dalam berorganisasi.</p>
                    
                   <p> 
                        <a href="./index.php?View=User&Menu=TEO" title="Terms of Use">Terms of Use</a><br />
                        <a href="./index.php?View=User&Menu=PP" title="Privacy Policy">Privacy Policy</a><br />
                        <a href="./index.php?View=User&Menu=FAQ" title="FAQ">FAQ</a><br />
                        <a href="./index.php?View=User&Menu=Sitemap" title="Sitemap">Sitemap</a>
                    </p>
                </div>
				
                <div class="span3" id="footerArea2">

                    <h3>Berita Terkini</h3> 
				<?php
					$news_Q = mysql_query("SELECT * FROM posting WHERE kategori != 'struktur' ORDER BY tanggal_posting 
											DESC LIMIT 4") or die(mysql_error());
					$num_of_news = mysql_num_rows($news_Q);
					if($num_of_news <= 0){
						echo "<p>No News Available.....</p>";
					}else{	
							while($news_data = mysql_fetch_object($news_Q)){
									echo "<p>";
									echo "<a href=\./index.php?View=User&Menu=Page&id_posting='".$news_data->id_posting."\' title=\"\">".$news_data->judul_posting."</a><br />";
									echo "<span style=\"text-transform:none;\">".$sub->changeDateFormat($news_data->tanggal_posting)."</span>";
									echo "</p>";
							}
					}		
				?>	
                </div>
				
				<div class="span3" id="footerArea3">

                    <h3>Sekilas HMM :</h3> 
                    <p>
						 <ul id="contact-info">
						 <li><a href="">Latar Belakang</a></li>
						 <li><a href="">Visi dan Misi</a></li>
						 <li><a href="">Struktur Kepengurusan</a></li>
                    </p>

                </div>
               
                <div class="span3" id="footerArea4">

                    <h3>Kontak Kami : </h3>  
                                                               
                    <ul id="contact-info">
                    <li>                                    
                        <i class="general foundicon-phone icon"></i>
                        <span class="field">Laman Web :</span>
                        <br />
                           www.hmm-usu.org                                                                     
                    </li>
                    <li>
                        <i class="general foundicon-mail icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:hmm.fmipausu@gmail.com" title="Email">hmm.fmipausu@gmail.com</a>
                    </li>
                    <li>
                        <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Alamat:</span>
                        <br />
                        Jl. Bioteknologi No. 1 <br />
                        Unit 7 Lt. 1 FMIPA <br />
                        USU P. Bulan Medan – 20155
                    </li>
                    </ul>

                </div>
            </div>

            <br /><br />
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright &copy; 2014 Bootstrap. All Rights Reserved.
                    </p>
                    <p class="social_bookmarks">
                        <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
						<a href="#"><i class="social foundicon-twitter"></i> Twitter</a>
                    </p>
                </div>
            </div>
            <br />

        </div>

    </div>
    
</div>

<script src="./site/scripts/jquery.min.js" type="text/javascript"></script> 
<script src="./site/scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./site/scripts/default.js" type="text/javascript"></script>

</body>
</html>