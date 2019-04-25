<?php include 'koneksi.php';
$nama		=$_POST['maskapai'];
$eco		=$_POST['alamat'];
$buss		=$_POST['telp'];
$filename   = $_FILES['image']['name'];
if(!empty($nama && $eco && $buss)){
	move_uploaded_file($_FILES['image']['tmp_name'],"logo/".$_FILES['image']['name']);
	mysql_query("INSERT INTO pesawat VALUES('','$nama','$eco','$buss','$filename')");
	echo"<script>alert('Berhasil')</script>";
	echo"<script>document.location='pesawat.php'</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>