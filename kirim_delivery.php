<link rel="stylesheet" type="text/css" href="css/style.css" />
		
	<div id="bg">
 		<div id="box">
			<div class="isinya">
<?php
include "koneksi.php";
	$no=$_GET['id'];
	
	$tampil="select * from sementara_deliver where no='".$no."'";
	$query=mysql_query($tampil);
	
	$date=date("Y-m-d");
	$jam=date("h:m:s");
	while($hasil=mysql_fetch_array($query)){
	
	$simpan="insert into order_deliver values('$no','".$hasil['id_paket']."','$date','$jam','".$hasil['harga']."')";
		$nama=mysql_query($simpan) or die("Belum berhasil <br/> <a href='index.php'><button class='tombol'>KEMBALI</button></a>");
	}
	if($nama){
			$hapus="delete from sementara_deliver where no='$no'";
			mysql_query($hapus);
			session_start();
			
			echo '<div id="ulang">Selamat Anda Telah Berhasil Memesan! Anda akan segera dihubungi!!! <br/></div>';
			echo '<a href="index.php" ><button class="tombol">KEMBALI</button></a>';
		}
		else{
			echo 'Gagal Memesan! ';
			echo '<a href="index.php" ><button class="tombol">KEMBALI</button></a>';
		}	
?>
		</div>
	</div>
</div>