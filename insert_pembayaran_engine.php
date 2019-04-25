<?php
include 'koneksi.php';
$a1			= $_POST['id_pass'];
$a2			= $_POST['email'];
$a3			= $_POST['id_book'];
$a4			= $_POST['kategori'];
$filename   = $_FILES['image']['name'];
$b1			= $_POST['id_jadwal'];
$ttl		= $_POST['price'];
$ed_sql		= mysql_query("UPDATE booking SET status='Menunggu Konfirmasi Admin' where id_booking ='$a3'");
if($ed_sql){
	move_uploaded_file($_FILES['image']['tmp_name'],"admin/image/".$_FILES['image']['name']);
	mysql_query("INSERT into pembayaran VALUES ('','$a3','$a2','$filename','$ttl')");
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/ukk_real/index.php';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}