<?php include 'koneksi.php';
$nama		= $_POST['perusahaan'];
$filename 	= $_FILES['image']['name'];
if(!empty($nama)){
	move_uploaded_file($_FILES['image']['tmp_name'],"logo/".$_FILES['image']['name']);
	mysql_query("INSERT INTO kereta VALUES('','$nama','$filename')");
	echo"<script>alert('Berhasil')</script>";
	echo"<script>document.location='kereta.php'</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>