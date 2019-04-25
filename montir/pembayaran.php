<?php 
include 'koneksi.php';
session_start();
$id_order 	 = $_GET['id'];
$dt_order 	 = $_GET['dt'];
$id_struk 	 = $_GET['id_s'];
if($dt_order == "order konsultasi"){
	$sql = mysql_query("UPDATE order_konsultasi SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: dashboard.php');

}else if($dt_order == "order emergency"){
	$sql = mysql_query("UPDATE order_emergency SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: dashboard.php');

}else if($dt_order == "order servis umum"){
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: dashboard.php');

}else if($dt_order == "order servis berkala"){
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: dashboard.php');
	
}else if($dt_order == "order cleaning"){
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	header('Location: dashboard.php');

}else if($dt_order == "order sparepart"){
	$sql = mysql_query("UPDATE order_spare_part SET status = 'Pembayaran Selesai' where id_struk = '$id_struk'");
	header('Location: dashboard.php');

}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
?>