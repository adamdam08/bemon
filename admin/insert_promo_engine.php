<?php
include 'koneksi.php';
$a1			= $_POST['kode'];
$a2s		= $_POST['isi'];
$a2			= $_POST['judul'];
$filename   = $_FILES['image']['name'];
$dsk		= $_POST['diskon'];
$gam 		= move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES['image']['name']);
$sql 		= mysql_query("INSERT into promo VALUES ('','$a1','$a2','$a2s','$filename','$dsk')");
if($sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/ukk_real/admin/promo.php';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}