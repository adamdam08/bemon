<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                            // Passing `true` enables exceptions

include 'koneksi.php';
$nama 	  = $_POST['nama'];
$email 	  = $_POST['email'];
$key 	  = base64_encode($email);
$no_hp    = $_POST['telp'];
$password1 = md5($_POST['sandi1']);
$filename   = $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"admin/kitas/".$_FILES['image']['name']);
$customer 		= mysql_query("INSERT INTO customer VALUES ('','$nama','$no_hp',0,'$filename')");
$customer_acc 	= mysql_query("INSERT INTO customer_acc VALUES ('','$email','$password1','belum')");
if($customer && $customer_acc){
	session_start();
	$_SESSION['email']= $email;
	echo "<script>alert('Selamat Datang Di Bemon.com :D')</script>";
	echo "<script>alert('Silahkan buka email anda untuk melakukan verifikasi')</script>";
	echo "<script>window.history.go(-1);</script>";
	try {
    //Server settings
    $mail->SMTPDebug = 3;                                 	// Enable verbose debug output
    $mail->isSMTP();                                      	// Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               	// Enable SMTP authentication
    $mail->Username = 'adamrahmawan110@gmail.com';          // SMTP username
    $mail->Password = 'adam251100';                         // SMTP password
    $mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    	// TCP port to connect to

    //Recipients
    $mail->setFrom('adamrahmawan110@gmail.com', 'Bemon');
    $mail->addAddress($email, $nama); // Add a recipient

    //Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Autentikasi akun bemon';
    $mail->Body    = 'Untuk menyelesaikan verifikasi klik link ini : http://localhost/be-mon/verifikasi.php?e='.$key.'';
    $mail->AltBody = 'Untuk menyelesaikan verifikasi klik link ini : http://localhost/be-mon/verifikasi.php?e='.$key.'';

    $mail->send();
    echo 'Message has been sent';
	} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}else{
    $_SESSION['status']= "relogin";
	echo "<script>window.history.go(-1);</script>";
}