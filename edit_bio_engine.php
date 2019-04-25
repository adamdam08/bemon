<?php
include 'koneksi.php';
$id_user	= $_POST['id_user'];
$nama		= $_POST['nama'];
$kontak		= $_POST['kontak'];
$sql		= mysql_query("UPDATE customer SET nama = '$nama', no_hp = '$kontak' where id_customer = '$id_user'");
if($sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/be-mon';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>