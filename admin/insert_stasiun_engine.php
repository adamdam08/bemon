<?php include 'koneksi.php';
$nama		=$_POST['kd_stasiun'];
$fr_stn		=$_POST['kota'];
$to_stn		=$_POST['st_nama'];
if(!empty($nama && $fr_stn && $to_stn)){
	mysql_query("INSERT INTO stasiun VALUES('','$nama','$fr_stn','$to_stn')");
	echo"<script>alert('Berhasil')</script>";
	echo"<script>document.location='stasiun.php'</script>";
}else{
	echo"<script>alert('Gagal')</script>";
	echo"<script>document.location='stasiun.php'</script>";
}
?>