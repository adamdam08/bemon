<?php include 'koneksi.php';
$a		=$_POST['id_jad'];
$a2		=$_POST['no_pes'];
$b1		=$_POST['fr_bn'];
$b2		=$_POST['to_bn'];
$c1		=$_POST['tgl_ber'];
$c2		=$_POST['tgl_tib'];
$d1		=$_POST['jm_bera'];
$d2		=$_POST['jm_tib'];
$e1 	=$_POST['stok'];
$f1		=$_POST['harga'];
$g1		=$_POST['kelas'];
$sql 	=mysql_query("UPDATE jadwal_pes SET no_pesawat = '$a2',lokasi_awal = '$b1',lokasi_tiba = '$b2',tgl_berangkat = '$c1',tgl_tiba = '$c2',jam_berangkat = '$d1',jam_tiba = '$d2',stok_kursi = '$e1',harga = '$f1',kelas='$g1' where id_jadwal_pes = '$a' ");
if($sql){
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>