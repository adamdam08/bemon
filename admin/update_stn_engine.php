<?php include 'koneksi.php';
$a		=$_POST['id_st_ker'];
$a2		=$_POST['st_kode'];
$b1		=$_POST['kota'];
$b2		=$_POST['nm_st'];
$sql 	=mysql_query("UPDATE stasiun SET st_kode = '$a2',kota = '$b1',st_nama = '$b2' where id_st_ker = '$a' ");
if($sql){
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>