<?php 
include 'koneksi.php';
session_start();
$id_user	 = $_POST['id_user'];
$id_montir	 = $_POST['id_montir'];
$id_order 	 = $_POST['id_order'];
$dt_order 	 = $_POST['dt_order'];
$det_laporan = $_POST['det_laporan'];
if($dt_order == "order konsultasi"){
	mysql_query("UPDATE order_konsultasi SET status = 'Ditunda' where id_order = '$id_order'");
	mysql_query("INSERT INTO laporan VALUES ('','$id_user','$id_order','order_konsultasi','$id_montir','$det_laporan')");
	header('Location: dashboard.php');
}else if($dt_order == "order emergency"){
	$sql = mysql_query("UPDATE order_emergency SET status = 'Ditunda' where id_order = '$id_order'");
	header('Location: dashboard.php');

}else if($dt_order == "order servis umum"){
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Ditunda' where id_order = '$id_order'");
	header('Location: dashboard.php');

}else if($dt_order == "order servis berkala"){
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Ditunda' where id_order = '$id_order'");
	header('Location: dashboard.php');
	
}else if($dt_order == "order cleaning"){
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Ditunda' where id_order = '$id_order'");
	header('Location: dashboard.php');
	
}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
unset($_SESSION['item']);
?>