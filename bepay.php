<?php 
include 'koneksi.php';
session_start();
$id_order 	 = $_POST['id'];
$dt_order 	 = $_POST['dt'];
$saldo_awal	 = $_POST['saldo'];
$biaya		 = $_POST['price'];
$id_user	 = $_POST['id_user'];
$id_struk	 = $_POST['id_s'];
$saldo_akhir = $saldo_awal - $biaya;
if($dt_order == "order_konsultasi"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_konsultasi SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=konsultasi');

}else if($dt_order == "order_emergency"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_emergency SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=emergency');

}else if($dt_order == "order_servis_umum"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_servis_umum SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=umum');

}else if($dt_order == "order_servis_berkala"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_servis_berkala SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=berkala');
	
}else if($dt_order == "order_cleaning"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_cleaning SET status = 'Pembayaran Selesai' where id_order = '$id_order'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=cleaning');
	
}else if($dt_order == "order_spare_part"){
	mysql_query ("UPDATE customer SET saldo = '$saldo_akhir' where id_customer = '$id_user'");
	mysql_query("UPDATE order_spare_part SET status = 'Pembayaran Selesai' where id_struk = '$id_struk'");
	echo"<script>alert('Tunggu sejenak, montir akan datang')</script>";
	header('Location: box.php?serv=sparepart');
	
}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
?>