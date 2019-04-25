<?php
$host="localhost";
$user="root";
$pass="";
$db="bemon";

$kon=mysql_connect($host,$user,$pass) or die ('Database Tidak Terkoneksi');
mysql_select_db($db);
?>