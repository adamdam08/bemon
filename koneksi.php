<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING | E_DEPRECATED )); 
$host="localhost"; 
$user="root"; 
$password=""; 
$database="bemon"; 
$koneksi=mysql_connect($host,$user,$password); 
mysql_select_db($database,$koneksi); 
?>  