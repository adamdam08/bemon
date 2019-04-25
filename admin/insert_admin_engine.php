<?php include 'koneksi.php';
error_reporting(0);
$nama 	= $_POST['nama'];
$tgl 	= $_POST['tgl_lahir'];
$ktp	= $_POST['ktp'];
$hp		= $_POST['no_hp'];
$gender	= $_POST['gender'];
$email  = $_POST['email'];
$pass	= md5($_POST['password']);

session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	$sql1 	= mysql_query("INSERT INTO admin VALUES('','$nama','$tgl','$ktp','$hp','$gender','')");
	$sql2	= mysql_query("INSERT INTO admin_acc VALUES('','$email','$pass')");
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}
?>