<?php include 'koneksi.php';
$a			=$_REQUEST['id_pw'];
$a2			=$_REQUEST['maskapai'];
$b1			=$_REQUEST['alamat'];
$b2			=$_REQUEST['telp'];
$filename	=$_FILES['image']['name'];

if($filename){
	echo"<script>alert('Berhasil :D')</script>";
	move_uploaded_file($_FILES['image']['tmp_name'],"logo/".$_FILES['image']['name']);
	mysql_query("UPDATE pesawat SET maskapai = '$a2',alamat = '$b1',telepon = '$b2',logo = '$filename' where id_pesawat = '$a' ");
	echo "<script>window.history.go(-2);</script>";
}else if($a){
	echo"<script>alert('Berhasil :)')</script>";
	mysql_query("UPDATE pesawat SET maskapai = '$a2',alamat = '$b1',telepon = '$b2' where id_pesawat = '$a' ");
	echo "<script>window.history.go(-2);</script>";
}else{
	echo "<script>window.history.go(-1);</script>";
}
?>