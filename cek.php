<?php
	include "koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<div id='bg'><h2 style='color:white;margin-left:20px;'>CEK PESANAN</h2>
 <div id='box'>
	<div class='isinya'>
<?php
	//error_reporting(E_ALL^(E_NOTICE|E_WARNING));
	$ambil="select distinct id_menu,nama,count(nama) as jumlah,harga,sum(harga) as total from sementara group by id_menu,harga;";
	$nilai=mysql_query($ambil) or die (mysql_error());
	$key=mysql_num_rows($nilai);
$tot="select no,sum(harga) as total from sementara group by no";
$bil=mysql_query($tot) or die (mysql_error());
$has=mysql_num_rows($bil);
$total=mysql_fetch_array($bil);
	
 echo "<form action='kirim.php' method='post'>
		<table border='0'>
			<tr>
				<th>NO MEJA :<hr/></th>
				<th><input type='hidden' value='".$total['no']."' name='meja'>".$total['no']."<hr/></th>
			</tr>
			<tr>
				<td>PESANAN</td>
				<td>JUMLAH</td>
				<td>HARGA</td>
			</tr>";
	
		while($muncul=mysql_fetch_array($nilai)){
		
		echo"<tr>
	
				<td><input type='hidden' value='".$muncul['nama']."'>".$muncul['nama']."</td>
				<td><input type='hidden' value='".$muncul['jumlah']."'>".$muncul['jumlah']."</td>
				<td><input type='hidden' value='".$muncul['total']."'>".$muncul['total']."</td>
				
			</tr>";
			}
		echo "	<tr><td><hr/></td></tr><tr><td></td></tr>
			<tr>
					<td colspan='2'>TOTAL BAYAR<hr/></td>
				<td>".$total['total']."</td>
			</tr>
			<tr><td></td></tr><tr><td></td></tr>
			<tr>
				<td colspan='2'><a href='hapus.php?hapus=".$total['no']."' class='tombol'><input type='button' name='hapus' value='HAPUS' class='tombol'></a> 
				&nbsp
				<a href='home.php' class='tombol'><input type='button' value='BATAL PESAN' class='tombol'></a>&nbsp&nbsp</td>
				<td><input type='submit' value='PESAN' class='tombol' name='kirim'></td>
			</tr>
		</table></form>";
		mysql_close();
?>
		</div>
	</div>
</div>
