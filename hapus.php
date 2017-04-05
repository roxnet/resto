<?php
	include "koneksi.php";
	$no=$_GET['hapus'];
	$ambil="delete from sementara where no='$no'";
	$nilai=mysql_query($ambil) or die (mysql_error());
	mysql_close();
	header('location:home.php');
	
?>