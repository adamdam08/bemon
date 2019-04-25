<?php include 'koneksi.php';
$d1		= $_GET['book']; 
$d2		= $_GET['em']; 
$del0	= mysql_query("DELETE FROM customer WHERE id_customer = '$d1'");
$del1	= mysql_query("DELETE FROM pembayaran WHERE email = '$d2'");
$del2	= mysql_query("DELETE FROM pembayaran_saldo WHERE email = '$d2'");
$del3	= mysql_query("DELETE FROM passenger WHERE email = '$d2'");
$del4	= mysql_query("DELETE FROM booking WHERE email = '$d2'");
if($del0 && $del1 && $del2 && $del3 && $del4){
	echo"<script>alert('Berhasil Blok')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>