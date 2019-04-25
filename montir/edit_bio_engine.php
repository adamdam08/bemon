<?php
include 'koneksi.php';
$id_montir	= $_POST['id_montir'];
$nama		= $_POST['nama'];
$kontak		= $_POST['kontak'];
$sql		= mysql_query("UPDATE montir SET nama = '$nama', no_hp = '$kontak' where id_montir = '$id_montir'");
if($sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>document.location='http://localhost/be-mon/montir';</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>