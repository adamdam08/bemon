<?php include 'koneksi.php';
$a			=$_REQUEST['id_promo'];
$a2			=$_REQUEST['kode'];
$b1			=$_REQUEST['diskon'];
$b2			=$_REQUEST['judul'];
$b3			=$_REQUEST['isi'];
$filename	=$_FILES['image']['name'];
if($filename){
	echo"<script>alert('Berhasil :D')</script>";
	move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES['image']['name']);
	mysql_query("UPDATE promo SET kode = '$a2',diskon = '$b1',judul_promo = '$b2',gambar='$filename' where id_promo = '$a' ");
	echo "<script>window.history.go(-2);</script>";
}else if($a){
	echo"<script>alert('Berhasil :)')</script>";
	mysql_query("UPDATE promo SET kode = '$a2',diskon = '$b1',judul_promo = '$b2',isi_promo='$b3' where id_promo = '$a' ");
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>