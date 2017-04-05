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
	
	$query="select distinct(no),nama,count(a.id_menu) as jum,date,waktu,a.harga,sum(a.harga) as total
		from pesan a,menu b 
		where no='".$a."' and date='".$b."' and waktu='".$c."'
		and  a.id_menu=b.id_menu
		group by no,nama,date,waktu,a.harga;
	";
	$ambil=mysql_query($query);
	$q="select distinct(no),date,waktu,harga,sum(harga) as total
		from pesan
		where no='".$a."' and date='".$b."' and waktu='".$c."';
	";
	$aml=mysql_query($q);
	$total=mysql_fetch_array($aml);
	
	$que="select distinct(no),c.nama_paket,count(a.id_paket) as jumlah,date,waktu,a.harga,sum(a.harga) as total
		from pesan a, paket c 
		where no='".$a."' and date='".$b."' and waktu='".$c."'
		and a.id_paket=c.id_paket;
	";
	$amb=mysql_query($que);
	
 echo "
		<table border='0' style='text-align:center'>
			<tr>
				<th>NO MEJA :<hr/></th>
				<th>".$total['no']."<hr/></th>
				
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
			
	while($jalan=mysql_fetch_array($ambil)){
	echo"<tr>
	
				<td>".$jalan['nama']."</td>
				<td>";
				if($jalan['jum']==0){
				} else{
				echo $jalan['jum'];
				}
		echo "</td>
				<td>".$jalan['total']."</td>
				
			</tr>";
			}
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
				<td>".$total['total']."</td>
			</tr></table>";
		echo "<a href='../home_admin.php' ><button class='tombol'>KEMBALI</button></a>
				<a href='#'><button onClick='window.print();' class='tombol'>CETAK</button></a>
		";
	}
	mysql_close();
?>

</div>
	</div>
</div>