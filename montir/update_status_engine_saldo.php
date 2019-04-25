<?php 
include 'koneksi.php';
$a1			= $_REQUEST['id_sal'];
$a2			= $_REQUEST['em'];
$a2i		= $_REQUEST['saldo1'];
$a2c		= $_REQUEST['saldo2'];
$a2s		= $a2i + $a2c;
$ed_sql		= mysql_query("UPDATE saldo SET status='Lunas' where id_saldo = '$a1' ");
$ed_sql		= mysql_query("UPDATE customer SET saldo = '$a2s' where email = '$a2' ");
if($ed_sql){
	echo "<script>alert('Terkirim :D')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}?>