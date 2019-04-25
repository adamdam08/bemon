<?php 
include 'koneksi.php';
session_start();
$id_order 	= $_POST['id_order'];
$id_struk 	= $_POST['id_struk'];
$id_montir 	= $_POST['id_montir'];
$dt_order 	= $_POST['dt_order'];
if($dt_order == "order_konsultasi"){
	$sql = mysql_query("UPDATE order_konsultasi SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_order = '$id_order'");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
	$_SESSION['order'] = "true";
}else if($dt_order == "order_emergency"){
	echo"<script>alert('$dt_order, $id_montir,$id_order')</script>";
	$sql = mysql_query("UPDATE order_emergency SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_order = '$id_order'");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
}else if($dt_order == "order_servis_umum"){
	echo"<script>alert('$dt_order, $id_montir,$id_order')</script>";
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_order = '$id_order'");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
}else if($dt_order == "order_servis_berkala"){
	echo"<script>alert('$dt_order, $id_montir,$id_order')</script>";
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_order = '$id_order'");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
}else if($dt_order == "order_cleaning"){
	echo"<script>alert('$dt_order, $id_montir,$id_order')</script>";
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_order = '$id_order'");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
}else if($dt_order == "order_spare_part"){
	echo"<script>alert('$dt_order, $id_montir,$id_order')</script>";
	$sql = mysql_query("UPDATE order_spare_part SET status = 'Mengirim Pesan', id_montir = '$id_montir' where id_struk = '$id_struk' ");
	echo"<script>alert('Berhasil mengambil pesanan')</script>";
	header('Location: index.php');
}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
?>