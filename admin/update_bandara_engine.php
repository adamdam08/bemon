<?php include 'koneksi.php';
$a		=$_POST['id_bn'];
$a2		=$_POST['kd_bn'];
$b1		=$_POST['kota'];
$b2		=$_POST['nm_bn'];
$b3		=$_POST['nm_bn_rl'];
if($a){
	mysql_query("UPDATE bandara SET kd_bandara = '$a2',kota = '$b1',nm_bandara = '$b2' where id_bandara = '$a' ");
	mysql_query("UPDATE jadwal_pes SET lokasi_awal = '$b2'  where lokasi_awal = '$b3' ");
	mysql_query("UPDATE jadwal_pes SET lokasi_tiba = '$b2'  where lokasi_tiba = '$b3' ");
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>