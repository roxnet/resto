<?php
	include "../koneksi.php";
	include "cek_admin.php";
?>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<div id='bg'><h2 style='color:white;margin-left:20px;'>CEK PESANAN</h2>
 <div id='box'>
	<div class='isinya'>
	
<?php
	if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])){
	$a=$_GET['a'];
	$b=$_GET['b'];
	$c=$_GET['c'];
	
	$q="select distinct(a.id_user),nama,alamat,no_telpon,date,waktu,harga,sum(harga) as total
		from order_deliver a,deliver b
		where a.id_user='".$a."' and date='".$b."' and waktu='".$c."'
		and a.id_user=b.id_user
		group by nama,alamat,no_telpon,date,waktu,harga;
		;
	";
	$aml=mysql_query($q)or die("Gagal");
	$total=mysql_fetch_array($aml);
	
	$abc="select sum(harga) as total from order_deliver where id_user='".$a."' and date='".$b."' and waktu='".$c."'";
	$cba=mysql_query($abc);
	
	$que="select nama_paket,count(b.id_paket)as jumlah,sum(a.harga) as total from order_deliver a,paket b
		where a.id_user='".$a."' and date='".$b."' and waktu='".$c."'
		and a.id_paket=b.id_paket group by nama_paket;
	";
	$amb=mysql_query($que)or die("gagal line 29");
	
 echo "
		<table border='0' style='text-align:center'>
			<tr>
				<th>Nama:<hr/></th>
				<th>".$total['nama']."<hr/></th>
			</tr>
			<tr>
				<th>Alamat:<hr/></th>
				<th>".$total['alamat']."<hr/></th>
			</tr>
			<tr>
				<th>No Telp:<hr/></th>
				<th>".$total['no_telpon']."<hr/></th>
			</tr>
			<tr>
				<th>DATE :<hr/></th>
				<th>".$total['date']."<hr/></th>
				
			</tr>
			<tr>
				<th>WAKTU :<hr/></th>
				<th>".$total['waktu']."<hr/></th>
				
			</tr>
			<tr>
				<td>PESANAN</td>
				<td>JUMLAH</td>
				<td>HARGA</td>
			</tr>";
			
	
	while($paket=mysql_fetch_array($amb)){
	echo"<tr>
	
				<td>".$paket['nama_paket']."</td>
				<td>";
				if($paket['jumlah']==0){
						
				} else{
					echo $paket['jumlah'];
				}
			echo "</td>
				<td>".$paket['total']."</td>
				
			</tr>";
			}
		echo "	<tr><td><hr/></td></tr><tr><td></td></tr>
			<tr>
					<td colspan='2'>TOTAL BAYAR<hr/></td>
				<td>";
		while ($hasil=mysql_fetch_array($cba)){echo $hasil['total'];}
		echo "</td>
			</tr></table>";
		echo "<a href='../home_admin.php'>KEMBALI</a>
				<a href='#'><button onClick='window.print();'>CETAK</button></a>
		";
	}
	mysql_close();
?>

</div>
	</div>
</div>