<?php include 'koneksi.php';
$nama		=$_POST['kd_bandara'];
$fr_stn		=$_POST['kota'];
$to_stn		=$_POST['nm_bandara'];
if(!empty($nama && $fr_stn && $to_stn)){
	mysql_query("INSERT INTO bandara VALUES('','$nama','$fr_stn','$to_stn')");
	echo"<script>alert('Berhasil')</script>";
	echo"<script>document.location='bandara.php'</script>";
}else{
	echo"<script>alert('Gagal')</script>";
	echo"<script>document.location='bandara.php'</script>";
}
?>