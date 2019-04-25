<?php include 'koneksi.php';
error_reporting(0);
$a		=$_POST['perusahaan'];
$a2		=$_POST['no_pes'];
$b1		=$_POST['fr_bandara'];
$b2		=$_POST['to_bandara'];
$c1		=$_POST['tgl_ber'];
$c2		=$_POST['tgl_tib'];
$d1		=$_POST['jm_ber'];
$d2		=$_POST['jm_tib'];
$e1		=$_POST['stok'];
$f1		=$_POST['harga'];
$g1		=$_POST['kelas'];
$pol 	= mysql_query("select * from pesawat where maskapai = '$a'");
$klp	= mysql_fetch_array($pol);
$g2		= $klp[logo];
$sql 	= mysql_query("INSERT INTO jadwal_pes VALUES('','$a','$a2','$b1','$b2','$c1','$c2','$d1','$d2','$e1','$f1','$g1','$g2')");
if($sql){
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>