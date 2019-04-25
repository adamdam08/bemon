<?php include 'koneksi.php';
$d1		= $_GET['book']; 
$del0	= mysql_query("DELETE FROM jadwal_pes WHERE id_jadwal_pes = '$d1'");
if($del0){
	echo"<script>alert('Berhasil Hapus')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>