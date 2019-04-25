<?php
include 'koneksi.php';
$email = $_REQUEST['e'];
$key = base64_decode($email);
if($email != NULL){
	mysql_query("UPDATE customer_acc SET verifikasi = 'sudah' WHERE email = '$key'");
	echo "<script>alert('Akun anda telah diverifikasi')</script>";
	echo'<script>window.location="http://localhost/be-mon/";</script>';
}else{
	echo "<script>alert('Salah')</script>";
	echo'<script>window.location="http://localhost/be-mon/";</script>';
}
?>