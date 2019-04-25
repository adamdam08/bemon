<?php
include 'koneksi.php';
$a1			= $_POST['kode'];
$a2			= $_POST['nominal'];
$a3			= $_POST['stok'];
$sql 		= mysql_query("INSERT into saldo VALUES ('','$a1','$a2','$a3')");
if($sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}