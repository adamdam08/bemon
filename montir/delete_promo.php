<?php include 'koneksi.php';
$d1		= $_GET['book']; 
$del	= mysql_query("DELETE FROM promo WHERE id_promo = '$d1'");
if($del){
	echo"<script>alert('Berhasil Hapus')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>