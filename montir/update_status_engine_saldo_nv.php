<?php 
include 'koneksi.php';
$a1			= $_REQUEST['id_sal'];
$a2			= $_REQUEST['id_pem'];
$ed_sql		= mysql_query("UPDATE saldo SET status='Tidak Valid' where id_saldo = '$a1' ");
$del		= mysql_query("DELETE FROM pembayaran_saldo WHERE id_pembayaran = '$a2'");
if($del && $ed_sql){
	echo "<script>alert('Terkirim :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}?>