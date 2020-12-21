<?php include 'koneksi.php';
		error_reporting(0);
		session_start();
		if(!empty($_SESSION['username'])){
			echo"<script>document.location='dashboard.php'</script>";
		}
?>