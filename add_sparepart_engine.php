<?php
session_start();
include 'koneksi.php';
$result = mysql_query ("select max(id_struk) as id_struk from order_spare_part");
$row = mysql_fetch_array($result);
$id_s = $row["id_struk"] + 1;
echo "<script>alert('$id_s')</script>";
foreach ($_SESSION['item'] as $key => $val) {
$query = mysql_query("select * from sparepart where id_sparepart = '$key'");
$rs = mysql_fetch_array($query);
$harga 		= $rs[3];
$id			= $_POST['id_user'];
$items		= $key;
$sql 		= mysql_query("INSERT INTO order_spare_part VALUES ('','$id','$key','sparepart','Mencari montir','$harga','',0,'$id_s')");
if($sql){
	unset($_SESSION['item']);
	header('Location: index.php');
}else{
	header('Location: index.php');
}
}
?>