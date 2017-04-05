<?php
	//untuk menampilkan daftar makanan
	include "../koneksi.php";
	include "cek_admin.php";
	if(isset($_GET["hapus"])){
	$hapus=$_GET["hapus"];
	
	$amb="select id_jenis,foto from menu where id_menu='".$hapus."'";
	$cek=mysql_query($amb) or die(mysql_error());
	$kembali=mysql_fetch_array($cek);
	$foto=$kembali['foto'];
	$gbr="pict/$foto";
	if(file_exists($gbr)) unlink($gbr);
	$gbr="thumb/t_$foto";
	if(file_exists($gbr)) unlink($gbr);
	
	$ambil="delete from menu where id_menu='".$hapus."'";
	mysql_query($ambil) or die(mysql_error());
	
	
	
	if($kembali['id_jenis']=='ma001')
	header("location:../home_admin.php?ma=makanan");
	else if($kembali['id_jenis']=='mi001')
	header("location:../home_admin.php?ma=minuman");
	else if($kembali['id_jenis']=='ce001')
	header("location:../home_admin.php?ma=cemilan");
	else
	header("location:../home_admin.php?ma=paket");
	};
	
	if(isset($_GET["hap"])){
	$hapus=$_GET["hap"];
	
	$amb="select foto from paket where id_paket='".$hapus."'";
	$cek=mysql_query($amb) or die(mysql_error());
	$kembali=mysql_fetch_array($cek);
	$foto=$kembali['foto'];
	$gbr="pict/$foto";
	if(file_exists($gbr)) unlink($gbr);
	$gbr="thumb/t_$foto";
	if(file_exists($gbr)) unlink($gbr);
	
	$ambil="delete from menu_paket where id_paket='".$hapus."'";
	$cek=mysql_query($ambil) or die(mysql_error());
	$amb="delete from paket where id_paket='".$hapus."'";
	$cek=mysql_query($amb) or die(mysql_error());
	header("location:../home_admin.php?ma=paket");
	}
	
	if(isset($_GET['delete'])){
	$hapus=$_GET['delete'];
	$ambil="delete from meja where no='".$hapus."'";
	mysql_query($ambil) or die(mysql_error());
	header("location:../home_admin.php?ma=meja");
	}
	
	if(isset($_GET['a'])&&isset($_GET['b'])&&isset($_GET['c'])){
	$a=$_GET['a'];
	$b=$_GET['b'];
	$c=$_GET['c'];
	$ambil="delete from pesan where no='".$a."' and date='".$b."' and waktu='".$c."';";
	mysql_query($ambil) or die(mysql_error());
	header("location:../home_admin.php?ma=pesan");
	}
	if(isset($_GET['d'])&&isset($_GET['e'])&&isset($_GET['f'])){
	$a=$_GET['d'];
	$b=$_GET['e'];
	$c=$_GET['f'];
	$ambil="delete from order_deliver where id_user='".$a."' and date='".$b."' and waktu='".$c."';";
	mysql_query($ambil) or die(mysql_error());
	header("location:../home_admin.php?ma=pesan");
	}
	mysql_close();
?>