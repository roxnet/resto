<?php
	include "koneksi.php";
	$hapus=$_GET['hapus'];
	$ambil="delete from sementara_deliver where no='$hapus'";
	$nilai=mysql_query($ambil) or die (mysql_error());
	header('location:delivery.php');
		mysql_close();
?>