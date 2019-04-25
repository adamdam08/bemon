<?php 
session_start();
include 'koneksi.php';
unset($_SESSION['montir']);
	echo"<script>alert('Berhasil Logout')</script>";
	echo"<script>document.location='index.php'</script>";
?>