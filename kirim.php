<html>
	<head>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
			</head>
	<body id="bg">
 		<div id="box">
			<div class="isinya">
<?php
include "koneksi.php";
	$meja=$_POST['meja'];
	
	$tampil="select * from sementara where no='".$meja."'";
	$query=mysql_query($tampil);
	
	$date=date("Y-m-d");
	$jam=date("h:m:s");
	while($hasil=mysql_fetch_array($query)){
	if($hasil['id_paket']==NULL){
	$simpan="insert into pesan (no,id_menu,date,waktu,harga)
	values ('".$hasil['no']."','".$hasil['id_menu']."','".$date."','".$jam."','".$hasil['harga']."')";
		$nama=mysql_query($simpan) or die("Belum berhasil <br/> <a href='index.php'><button class='tombol'>KEMBALI</button></a>");}
		
	if($hasil['id_menu']==NULL){
	$simpan="insert into pesan (no,id_paket,date,waktu,harga)
	values ('".$hasil['no']."','".$hasil['id_paket']."','".$date."','".$jam."','".$hasil['harga']."')";
		$nama=mysql_query($simpan) or die("Belum berhasil <br/> <a href='index.php'><button class='tombol'>KEMBALI</button></a>");}
	}
	
	session_start();
			if(isset($_SESSION['meja'])){
					$me="update meja set pakai='t' where no='".$_SESSION['meja']."' ";
					mysql_query($me);
			}
	if(isset($nama)){
			$hapus="delete from sementara where no='$meja'";
			mysql_query($hapus);
			
			
			
			echo '<div id="ulang">Selamat Anda Telah Berhasil Memesan! Mohon Ditunggu!!! <br/><br/></div>';
			echo '<a href="index.php"><button class="tombol">KEMBALI</button></a>';
		}
		else{
			echo 'Gagal Memesan! ';
			echo '<a href="index.php"><button class="tombol">KEMBALI</button></a>';
		}	
?>
		</div>
	</div>
</body>
</html>