<?php include 'koneksi.php';
error_reporting(0);
$nama 	= $_POST['nama_kendaraan'];
$cc 	= $_POST['cc'];


session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	$sql1 	= mysql_query("INSERT INTO tipe_kendaraan VALUES('','$nama','$cc')");
	echo"<script>alert('Berhasil')</script>";
	echo "<script>window.history.go(-2);</script>";
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}
?>