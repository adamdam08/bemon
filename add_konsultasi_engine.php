<?php
include 'koneksi.php';
$id_layanan	 = $_POST['id_layanan'];
$id_user	 = $_POST['id_user'];
$id_kendaraan= $_POST['id_kendaraan'];
$keluhan	 = $_POST['keluhan'];
$status		 = "Mencari montir";
$price		 = $_POST['price'];

$sql 		 = mysql_query("INSERT INTO order_konsultasi VALUES ('','$id_user','$id_layanan','$id_kendaraan','$status','$price','$keluhan','0')");

if($sql){
	header('Location: index.php');
}else{
	header('Location: index.php');
}

?>