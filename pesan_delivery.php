
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
?>
<?php
	session_start();
	$nmr=$_SESSION['nomer'];
	//error_reporting(E_ALL^(E_NOTICE|E_WARNING));
	if(isset($_GET['pa'])){
	$kode=$_GET['pa'];
	$panggil="select * from paket where id_paket='".$kode."'";
	$hasil=mysql_query($panggil) or die (mysql_error());
	$tampil=mysql_fetch_array($hasil);
	$masuk="insert into sementara_deliver (no,id_paket,nama,harga)values ('".$nmr."','".$tampil['id_paket']."','".$tampil['nama_paket']."','".$tampil['harga']."');";
	mysql_query($masuk) or die (mysql_error());
	}
	
	if(isset($_GET['nama'])){
	$ko=$_GET['nama'];
	$panggil="select * from sementara_deliver where nama='".$ko."'";
	$hasil=mysql_query($panggil) or die (mysql_error());
	$no=mysql_fetch_array($hasil);
	header('location:delivery.php');
	}
	
	
				
	
	if(isset($no['nama'])){
	$hapus="delete from sementara_deliver where nama='".$no['nama']."'";
	mysql_query($hapus) or die (mysql_error());
	$num="delete from sementara_deliver where nama='' or harga=0";
	mysql_query($num) or die (mysql_error());
	}
	
	$ambil="select distinct nama,count(nama) as jumlah,harga from sementara_deliver group by harga;";
	$nilai=mysql_query($ambil) or die (mysql_error());
	$key=mysql_num_rows($nilai);
	echo "No Pemesan ".$nmr."<br/>";
	echo "<table border='1' class='tabelpesanan'>
			<tr>
				<td>Pesanan</td>
				<td>Harga</td>
				<td>Jumlah</td>
				<td>Batal</td>
			</tr>";
	
		while($muncul=mysql_fetch_array($nilai)){
		
		echo"<tr>
				<td>".$muncul['nama']."</td>
				<td>".$muncul['harga']."</td>
				<td>".$muncul['jumlah']."</td>
				<td><a href='pesan_delivery.php?nama=".$muncul['nama']."'>
							X
					</a></td>
			</tr>";
			
				
			}
		echo"<tr>
				<td colspan='4' align='center'><a href='cek_delivery.php' class='tombol'><input type='button' value='CEK PESANAN' class='tombol'></td>
			</tr>
			</table>";
			mysql_close();
?>