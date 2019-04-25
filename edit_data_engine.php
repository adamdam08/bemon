<?php
include 'koneksi.php';
$id_data  =$_POST['id'];
$nama 	  = $_POST['nama'];
$email 	  = $_POST['email'];
$kota 	  = $_POST['kota'];
$negara	  = $_POST['negara'];
$password1 = md5($_POST['sandi1']);
$password2 = $_POST['sandi2'];
$sql 	   = mysql_query("UPDATE customer set nm_customer='$nama',email='$email',kota='$kota',negara='$negara',password='$password1' WHERE email='$email'");
if($sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	$_SESSION['email'] = $nama;
	echo "<script>alert('Password Not Match !!')</script>";
	echo "<script>document.location(-1)</script>";
}
?>