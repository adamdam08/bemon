<?php include 'koneksi.php';
$id		= $_GET['id']; 
$delete	= mysql_query("DELETE FROM admin_acc WHERE id_admin = '$id'");
$delete	= mysql_query("DELETE FROM admin WHERE id_admin = '$id'");
if($delete){
	echo"<script>alert('Berhasil Hapus')</script>";
	echo "<script>window.history.go(-1);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>