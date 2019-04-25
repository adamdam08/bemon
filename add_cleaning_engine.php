<?php
include 'koneksi.php';
$id_user		= $_POST['id_user'];
$id_layanan		= $_POST['id_layanan'];
$id_kendaraan	= $_POST['id_kendaraan'];
$status			= "Mencari montir";
$price			= $_POST['price'];
$sql 		= mysql_query("INSERT INTO order_cleaning VALUES ('','$id_user','$id_layanan','$id_kendaraan','$status','$price',0)");

if($sql){
	header('Location: index.php');
}else{
	header('Location: index.php');
}

?>