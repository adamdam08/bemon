<?php 
include 'koneksi.php';
$a1			= $_REQUEST['book'];
$ed_sql		= mysql_query("UPDATE booking SET status='Lunas' where id_booking = '$a1' ");
if($ed_sql){
	echo "<script>alert('Terkirim :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}?>