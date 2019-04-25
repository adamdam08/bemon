<?php 
include 'koneksi.php';
$id_ctr		= $_REQUEST['id_ctr'];
$id_sal		= $_REQUEST['id_saldo'];
$a2i		= $_REQUEST['saldo1'];
$a2c		= $_REQUEST['saldo2'];
$a2s		= $a2i + $a2c;
$ed_sql		= mysql_query("UPDATE saldo SET status='Lunas' where id_saldo = '$id_sal' ");
$ed_sql		= mysql_query("UPDATE customer SET saldo = '$a2s' where id_customer = '$id_ctr' ");
if($ed_sql){
	echo "<script>alert('Terkirim :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}?>