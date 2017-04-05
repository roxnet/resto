<?php
session_start();
include"koneksi.php";

error_reporting(E_ALL ^ (E_NOTICE));
$userid = $_POST['userid'];
$psw = $_POST['psw'];
$op=$_GET['op'];
if($op=="in"){
	$cek = mysql_query("SELECT * FROM admin WHERE id='$userid' AND password='$psw'");
	if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
		$c = mysql_fetch_array($cek);
		$_SESSION['id'] = $c['id'];
			header("location:home_admin.php");
	}		
	else{
	die("Login salah <a href=\"javascript:history.back()\">kembali</a>");
	}
}

else if($op=="out"){
	unset($_SESSION['id']);
	header("location:mlebu.php");
}
?>