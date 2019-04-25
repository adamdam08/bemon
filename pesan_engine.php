<?php
include 'koneksi.php';
$id_jadwal 	= $_REQUEST['id_jadwal'];
$email  	= $_REQUEST['user'];
$dws  		= $_REQUEST['dws'];
$blt 		= $_REQUEST['blt'];
$tgl 		= date('Y-m-d');
$total		= $_REQUEST['ttl'];
$tam		= $dws + $blt;
$stoklft	= $_REQUEST['stok_kur'] - $tam;
$ed_sql		= mysql_query("UPDATE jadwal_pes SET stok_kursi = '$stoklft' where id_jadwal_pes = '$id_jadwal' ");
$sql 		= mysql_query("INSERT into booking VALUES ('','$id_jadwal','$email','Belum DiKonfirmasi','Pesawat','$dws','$blt','$tgl','$total','sekali pergi')");
if($sql && $ed_sql){
	echo "<script>alert('Berhasil :D')</script>";
	echo "<script>alert('Cek Box Pesawat Anda')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}