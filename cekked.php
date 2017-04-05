<?php
	session_start();
	$ambil=$_POST['pilihan'];
	if($ambil=='-'){
		header('location:index.php?kom=kosong#popup2');
	}
	else{
		$_SESSION['meja']=$ambil;
		header('location:home.php');
	}
	
	if(isset($_SESSION['besok'])){
	$date=date("Y-m-d");
	$esok=$_SESSION['besok'];
			if($esok==$date){
				if(isset($_SESSION['nomer'])){
					unset($_SESSION['nomer']);
				}
			}
		}
		
	if(isset($_GET['nmr'])){
	$nmr=$_GET['nmr'];
		include "koneksi.php";
		$query="select * from deliver";
		$hasil=mysql_query($query);
		if(mysql_num_rows($hasil)==0){
		$_SESSION['nomer']=$nmr;
		header('location:delivery.php');
		}
		else{ $nilai=mysql_num_rows($hasil);
		$_SESSION['nomer']=$nilai+1;
		header('location:delivery.php');
		}
	}
	
?>