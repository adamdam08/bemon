<?php 
include 'koneksi.php';
$a1			= $_REQUEST['book'];
$a2			= $_REQUEST['struk'];
$ed_sql		= mysql_query("UPDATE booking SET status='Tidak Valid' where id_booking = '$a1' ");
$del		= mysql_query("DELETE FROM pembayaran WHERE id_struk = '$a2'");
if($del && $ed_sql){
	echo "<script>alert('Terkirim :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}?>