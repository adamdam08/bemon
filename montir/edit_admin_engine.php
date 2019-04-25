<?php include 'koneksi.php';
$id			= $_POST['id'];
$nama 		= $_POST['nama'];
$tanggal 	= $_POST['tgl_lahir'];
$ktp 		= $_POST['ktp'];
$hp 		= $_POST['no_hp'];
$jk			= $_POST['gender'];
session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	if($nama){
		echo"<script>alert('Berhasil Memperbarui Biodata')</script>";
		mysql_query("UPDATE admin SET nama='$nama',tgl_lahir='$tanggal',no_ktp='$ktp',no_hp='$hp',jenis_kelamin='$jk' where id_admin = '$id' ");
		mysql_query("UPDATE admin_acc SET email = '$email' where id_admin = '$id' ");
		echo "<script>window.history.go(-1);</script>";
	}
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}

?>