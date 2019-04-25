<?php
session_start();
include 'koneksi.php';
$username	= $_POST['username']; 
$password	= md5($_POST['password']);  
$query		= mysql_query("select * from montir_acc where email='$username' and password='$password'"); 
$cek 		= mysql_num_rows($query);
if($cek >= 0){
	$_SESSION['montir'] = $username;
	echo"<script>alert('Welcome $username')</script>";
	echo"<script>document.location='dashboard.php'</script>";
}else{
	echo"<script>alert('Username Atau Password Salah')</script>";
	echo"<script>document.location='index.php'</script>";
}
?>