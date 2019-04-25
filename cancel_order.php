<?php 
include 'koneksi.php';
session_start();
$id_order 	 = $_GET['id'];
$dt_order 	 = $_GET['dt'];
if($dt_order == "order_konsultasi"){
	$sql = mysql_query("delete from order_konsultasi where id_order = '$id_order'");
	header('Location: box.php?serv=konsultasi');
	
}else if($dt_order == "order_emergency"){
	$sql = mysql_query("delete from order_emergency where id_order = '$id_order'");
	header('Location: box.php?serv=konsultasi');

}else if($dt_order == "order_servis_umum"){
	$sql = mysql_query("delete from order_servis_umum where id_order = '$id_order'");
	header('Location: box.php?serv=umum');

}else if($dt_order == "order_servis_berkala"){
	$sql = mysql_query("delete from order_servis_berkala where id_order = '$id_order'");
	header('Location: box.php?serv=berkala');
	
}else if($dt_order == "order_cleaning"){
	$sql = mysql_query("delete from order_cleaning where id_order = '$id_order'");
	header('Location: box.php?serv=emergency');
	
}else{
	header('Location: index.php');
}
?>