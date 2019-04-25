<?php include 'koneksi.php';
error_reporting(0);
$nama 	= $_POST['nama'];
$tgl 	= $_POST['tgl_lahir'];
$gender	= $_POST['gender'];
$ktp	= $_POST['ktp'];
$sim    = $_POST['sim'];
$hp		= $_POST['no_hp'];
$email  = $_POST['email'];
$pass	= md5($_POST['password']);

session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	$sql1 	= mysql_query("INSERT INTO montir VALUES('','$nama','$tgl','$gender','$ktp','$sim','$hp','')");
	$sql2	= mysql_query("INSERT INTO montir_acc VALUES('','$email','$pass')");
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}
?>