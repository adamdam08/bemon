<?php
include 'koneksi.php';
session_start();
$email	=	$_POST['email']; 
$password	= md5($_POST['pass']); 
$query	=	mysql_query("SELECT * FROM customer_acc where email='$email' and password='$password'"); 
$cek	=	mysql_num_rows($query);
if($cek){
	$_SESSION['email']= $email;
	echo"<script>alert('Welcome, $email')</script>";
	echo"<script>window.history.go(-1)</script>";
}else{
	echo"<script>alert('Email Atau Password Salah')</script>";
	echo"<script>window.history.go(-1)</script>";
}
?>