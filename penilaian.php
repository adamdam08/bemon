<?php
include 'koneksi.php';
$id_o		= $_POST['id_order'];
$id_u		= $_POST['id_user'];
$id_m		= $_POST['id_montir'];
$id_struk		= $_POST['id_s'];
$saran		= $_POST['saran'];
$rating		= $_POST['rating'];
$dt_order 	 = $_POST['dt_order'];


if($dt_order == "order_konsultasi"){
		echo"<script>alert(' $dt_order ')</script>";
	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_konsultasi SET status = 'Selesai' where id_order = '$id_o'");
	header('Location: box.php?serv=konsultasi');

}else if($dt_order == "order_emergency"){

	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_emergency SET status = 'Selesai' where id_order = '$id_o' ");
	header('Location: box.php?serv=emergency');

}else if($dt_order == "order_servis_umum"){
	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Selesai' where id_order = '$id_o'");
	header('Location: box.php?serv=umum');

}else if($dt_order == "order_servis_berkala"){
	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Selesai' where id_order = '$id_o'");
	header('Location: box.php?serv=berkala');
	
}else if($dt_order == "order_cleaning"){
	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Selesai' where id_order = '$id_o'");
	header('Location: box.php?serv=cleaning');
	
}else if($dt_order == "order_spare_part"){
	$sqz		= mysql_query("UPDATE montir SET rating = '$rating' where id_montir = '$id_m'");
	$sqc		= mysql_query("INSERT INTO penilaian VALUES ('$id_o','$id_u','$id_m','$saran') ");
	$sql = mysql_query("UPDATE order_spare_part SET status = 'Selesai' where id_struk = '$id_struk'");
	header('Location: box.php?serv=sparepart');
	
}else{
	header('Location: index.php');
}
?>