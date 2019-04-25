<?php 
include 'koneksi.php';
session_start();
$id_order 	 = $_GET['id'];
$dt_order 	 = $_GET['dt'];
$id_struk	 = $_GET['id_s'];
if($dt_order == "order_konsultasi"){
	$sql = mysql_query("UPDATE order_konsultasi SET status = 'Pembayaran Tunai' where id_order = '$id_order'");
	header('Location: box.php?serv=konsultasi');

}else if($dt_order == "order_emergency"){
	$sql = mysql_query("UPDATE order_emergency SET status = 'Pembayaran Tunai' where id_order = '$id_order'");
	header('Location: box.php?serv=emergency');

}else if($dt_order == "order_servis_umum"){
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Pembayaran Tunai' where id_order = '$id_order'");
	header('Location: box.php?serv=umum');

}else if($dt_order == "order_servis_berkala"){
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Pembayaran Tunai' where id_order = '$id_order'");
	header('Location: box.php?serv=berkala');
	
}else if($dt_order == "order_cleaning"){
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Pembayaran Tunai' where id_order = '$id_order'");
	header('Location: box.php?serv=cleaning');

}else if($dt_order == "order_spare_part"){
	$sql = mysql_query("UPDATE order_spare_part SET status = 'Pembayaran Tunai' where id_struk = '$id_struk'");
	header('Location: box.php?serv=sparepart');
	
}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
?>