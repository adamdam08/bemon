<?php
include 'koneksi.php';
$id_order	= $_POST['id_saldo'];
$filename   = $_FILES['image']['name'];
	mysql_query("UPDATE saldo SET status='Menunggu Konfirmasi Admin' where id_saldo ='$id_order'");
	move_uploaded_file($_FILES['image']['tmp_name'],"admin/image/".$_FILES['image']['name']);
	mysql_query("INSERT into pembayaran_saldo VALUES ('','$id_order','$filename')");
	header('Location: box_bepay.php');