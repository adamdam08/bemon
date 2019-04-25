<?php
include 'koneksi.php';
$a1			= $_POST['id_pass'];
$a2			= $_POST['email'];
$a3			= $_POST['id_book'];
$ttl		= $_POST['price'];
$kurang		= $_POST['saldo']-$ttl;
$ed_sql		= mysql_query("UPDATE booking SET status='Lunas' where id_booking ='$a3'");
$ed_sqc		= mysql_query("UPDATE customer SET saldo='$kurang' where email ='$a2'");
if($ed_sql && $ed_sqc){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/ukk_real/index.php';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}