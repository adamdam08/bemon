<?php include 'koneksi.php';
		error_reporting(0);
		session_start();
			if($_SESSION['username']){
				echo"<script>document.location='index2.php'</script>";
		}
?>