<?php
include 'koneksi.php';

$id_user	= $_POST['id_user'];
$email		= $_POST['email'];
$password	= md5($_POST['sandi2']);
$sql		= mysql_query("UPDATE customer_acc SET email = '$email', password = '$password' where id_customer = '$id_user'");
if($sql){
	$_SESSION['email']= $email;
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/be-mon/index.php';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>