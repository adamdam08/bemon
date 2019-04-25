<?php include 'koneksi.php';
$id			= $_POST['id'];
$nama 		= $_POST['nama'];
$hp 		= $_POST['no_hp'];
$email 		= $_POST['email'];
$old_pass	= md5($_POST['old_pass']);
$new_pass	= md5($_POST['new_pass']);
$key		= $_POST['key'];
session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];
if($answer == $user_answer){
	if($new_pass != md5(0)){
		if($old_pass == $key){
			echo"<script>alert('Berhasil memperbarui kata sandi')</script>";
			mysql_query("UPDATE customer_acc SET email = '$email',password = '$new_pass' where id_customer = '$id' ");
			echo "<script>window.history.go(-2);</script>";
		}else{
			echo"<script>alert('$new_pass')</script>";
			echo"<script>alert('Password Lama salah!')</script>";
			echo "<script>window.history.go(-1);</script>";
	}
	}else if($email){
		echo"<script>alert('Berhasil Memperbarui Akun')</script>";
		$_SESSION['username'] = $email;
		mysql_query("UPDATE customer SET nama='$nama',no_hp='$hp',saldo='$saldo' where id_customer = '$id' ");
		mysql_query("UPDATE customer_acc SET email = '$email' where id_customer = '$id' ");
		echo "<script>window.history.go(-2);</script>";
	}else if($nama){
		echo"<script>alert('Berhasil Memperbarui Biodata')</script>";
		mysql_query("UPDATE customer SET nama='$nama',no_hp='$hp',saldo='$saldo' where id_customer = '$id' ");
		mysql_query("UPDATE customer_acc SET email = '$email' where id_customer = '$id' ");
		echo "<script>window.history.go(-2);</script>";
	}
}else{
	echo"<script>alert('Jawaban Salah,Hitung Kembali!')</script>";
	echo "<script>window.history.go(-1);</script>";
}

?>