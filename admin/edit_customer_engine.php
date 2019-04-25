<?php include 'koneksi.php';
$id			= $_POST['id'];
$nama 		= $_POST['nama'];
$hp 		= $_POST['no_hp'];
$saldo			= $_POST['saldo'];
session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	if($nama){
		echo"<script>alert('Berhasil Memperbarui Biodata')</script>";
		mysql_query("UPDATE customer SET nama='$nama',no_hp='$hp',saldo='$saldo' where id_customer = '$id' ");
		mysql_query("UPDATE customer_acc SET email = '$email' where id_customer = '$id' ");
		echo "<script>window.history.go(-1);</script>";
	}
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}

?>