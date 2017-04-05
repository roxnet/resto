<?php
	$server="localhost";
	$user="root";
	$password="";
	$database="resto";
	mysql_connect($server,$user,$password)or die ("Gagal Koneksi"); 
	mysql_select_db($database)or die ("Tidak Ada Database");
?>