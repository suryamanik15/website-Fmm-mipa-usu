<?php
	$kategori = $_GET['lomba_kategori'];
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	session_destroy();
?>
<script>
	var kategori = "<? echo $kategori;?>";
	document.location.href = "./index.php?View=User&Menu=MSC&lomba_kategori="+kategori;
</script>