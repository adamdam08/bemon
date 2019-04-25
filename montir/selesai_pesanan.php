<?php 
include 'koneksi.php';
session_start();
$id_user	 = $_POST['id_user'];
$id_montir	 = $_POST['id_montir'];
$id_order 	 = $_POST['id_order'];
$dt_order 	 = $_POST['dt_order'];
$biaya 	 	 = $_POST['price'];
$result = mysql_query ("select max(id_struk) as id_struk from order_spare_part");
$row = mysql_fetch_array($result);
$id_s = $row["id_struk"] + 1;
if($dt_order == "order konsultasi"){
	$sql = mysql_query("UPDATE order_konsultasi SET status = 'Pekerjaan Selesai', biaya = '$biaya' where id_order = '$id_order'");
	if(!empty($_SESSION['items'])){
		foreach ($_SESSION['items'] as $key => $val) {
			$query = mysql_query("select * from sparepart where id_sparepart = '$key'");
			$rs = mysql_fetch_array($query);
			$harga 		= $rs[3];
			$items		= $key;
			mysql_query("INSERT INTO order_spare_part VALUES ('','$id_user','$key','order_konsultasi','selesai','$harga','$id_montir',$id_order,'$id_s')");
		}
	}
	header('Location: dashboard.php');
}else if($dt_order == "order emergency"){
	$sql = mysql_query("UPDATE order_emergency SET status = 'Pekerjaan Selesai', biaya = '$biaya' where id_order = '$id_order'");
	if(!empty($_SESSION['items'])){
		foreach ($_SESSION['items'] as $key => $val) {
			$query = mysql_query("select * from sparepart where id_sparepart = '$key'");
			$rs = mysql_fetch_array($query);
			$harga 		= $rs[3];
			$items		= $key;
			mysql_query("INSERT INTO order_spare_part VALUES ('','$id_user','$key','order_emergency','selesai','$harga','$id_montir',$id_order,'$id_s')");
		}
	}
	header('Location: dashboard.php');

}else if($dt_order == "order servis umum"){
	$sql = mysql_query("UPDATE order_servis_umum SET status = 'Pekerjaan Selesai', biaya = '$biaya' where id_order = '$id_order'");
	if(!empty($_SESSION['items'])){
		foreach ($_SESSION['items'] as $key => $val) {
			$query = mysql_query("select * from sparepart where id_sparepart = '$key'");
			$rs = mysql_fetch_array($query);
			$harga 		= $rs[3];
			$items		= $key;
			mysql_query("INSERT INTO order_spare_part VALUES ('','$id_user','$key','order_servis_umum','selesai','$harga','$id_montir',$id_order,'$id_s')");
		}
	}
	header('Location: dashboard.php');

}else if($dt_order == "order servis berkala"){
	$sql = mysql_query("UPDATE order_servis_berkala SET status = 'Pekerjaan Selesai', biaya = '$biaya' where id_order = '$id_order'");
	if(!empty($_SESSION['items'])){
		foreach ($_SESSION['items'] as $key => $val) {
			$query = mysql_query("select * from sparepart where id_sparepart = '$key'");
			$rs = mysql_fetch_array($query);
			$harga 		= $rs[3];
			$items		= $key;
			mysql_query("INSERT INTO order_spare_part VALUES ('','$id_user','$key','order_servis_berkala','selesai','$harga','$id_montir',$id_order,'$id_s')");
		}
	}
	header('Location: dashboard.php');
	
}else if($dt_order == "order cleaning"){
	$sql = mysql_query("UPDATE order_cleaning SET status = 'Pekerjaan Selesai', biaya = '$biaya' where id_order = '$id_order'");
	header('Location: dashboard.php');
	
}else{
	echo"<script>alert('order gagal diambil')</script>";
	header('Location: index.php');
}
unset($_SESSION['item']);
?>