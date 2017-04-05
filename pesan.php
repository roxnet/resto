
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
?>
<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
	session_start();
	echo "NO MEJA ANDA : ".$_SESSION['meja']."";
	
	$meja="update meja set pakai='y' where no='".$_SESSION['meja']."'";
	mysql_query($meja) or die (mysql_error());
	

	if(isset($_GET['id'])){
	$kode=$_GET['id'];
	$panggil="select * from menu where id_menu='".$kode."'";
	$hasil=mysql_query($panggil) or die (mysql_error());
	$tampil=mysql_fetch_array($hasil);
	$masuk="insert into sementara (no,id_menu,nama,harga)values ('".$_SESSION['meja']."','".$tampil['id_menu']."','".$tampil['nama']."','".$tampil['harga']."');";
	mysql_query($masuk) or die (mysql_error());
	}
	
	if(isset($_GET['pa'])){
	$kode=$_GET['pa'];
	$panggil="select * from paket where id_paket='".$kode."'";
	$hasil=mysql_query($panggil) or die (mysql_error());
	$tampil=mysql_fetch_array($hasil);
	$masuk="insert into sementara (no,id_paket,nama,harga)values ('".$_SESSION['meja']."','".$tampil['id_paket']."','".$tampil['nama_paket']."','".$tampil['harga']."');";
	mysql_query($masuk) or die (mysql_error());
	}
	
	if(isset($_GET['nama'])){
	$ko=$_GET['nama'];
	$panggil="select * from sementara where nama='".$ko."'";
	$hasil=mysql_query($panggil) or die (mysql_error());
	$no=mysql_fetch_array($hasil);
	header('location:home.php');
	}
	
	
				
	
	if($no['nama']==$no['nama']){
	$hapus="delete from sementara where nama='".$no['nama']."'";
	mysql_query($hapus) or die (mysql_error());
	$num="delete from sementara where nama='' or harga=0";
	mysql_query($num) or die (mysql_error());
	}
	
	$ambil="select distinct nama,count(nama) as jumlah,harga from sementara group by harga;";
	$nilai=mysql_query($ambil) or die (mysql_error());
	$key=mysql_fetch_array($nilai, mysql_num);	
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
				<td><a href='pesan.php?nama=".$muncul['nama']."'>
							X
					</a></td>
			</tr>";
			
				
			}
		echo"<tr>
				<td colspan='4' align='center'><a href='cek.php' class='tombol'><input type='button' value='CEK PESANAN' class='tombol'></td>
			</tr>
			</table>";
			mysql_close();
?>