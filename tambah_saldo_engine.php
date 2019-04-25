<?php
include 'koneksi.php';
$id_user 	= $_POST['id_user'];
$saldo 	  	= $_POST['saldo'];
$sql	  	= mysql_query("INSERT into saldo values('','$id_user','$saldo','Pembayaran')");
if($sql){
	echo "<script>alert('Segera Masukkan Bukti Pembayaran')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>alert('gagal')</script>";
	echo "<script>window.history.go(-1);</script>";
}
?>