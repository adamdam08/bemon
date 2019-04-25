<?php include 'koneksi.php';
$d1		= $_GET['book']; 
$d2		= $_GET['nm']; 
$del0	= mysql_query("DELETE FROM kereta WHERE id_kereta = '$d1'");
$del1	= mysql_query("DELETE FROM jadwal_ker WHERE nama = '$d2'");
if($del0 && $del1){
	echo"<script>alert('Berhasil Hapus')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>