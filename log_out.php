<?php 
session_start();
include 'koneksi.php';
unset($_SESSION['email']);
echo"<script>Good Bye :D</script>";
echo"<script>window.history.go(-1)</script>";
?>