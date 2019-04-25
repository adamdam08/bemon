<?php include 'koneksi.php';
$d1		= $_GET['book']; 
$d2		= $_GET['nm']; 
$del0	= mysql_query("DELETE FROM stasiun WHERE id_st_ker = '$d1'");
$del1	= mysql_query("DELETE FROM jadwal_ker WHERE lokasi_awal = '$d2'");
$del2	= mysql_query("DELETE FROM jadwal_ker WHERE lokasi_tiba = '$d2'");
if($del0 && $del1 && del2){
	echo"<script>alert('Berhasil Hapus')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>