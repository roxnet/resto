
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
?>

<?php
	$panggil= "select * from menu where id_jenis='ma001'";
	$hasil=mysql_query($panggil) or die(mysql_error());
	$total=mysql_num_rows($hasil);
	
	$pang= "select * from jenis_menu where j_menu='ma001'";
	$hasl=mysql_query($pang) or die(mysql_error());
	$judul=mysql_fetch_array($hasl);
	echo "<div id='title' >
				".$judul['nama_jenis']."
				<br/><div id='txt'>Silahkan memilih dari ".$judul['nama_jenis']."&nbsp;yang tersedia dengan klik/tekan 
				pada nama dari Makanan yang ingin di pesan & untuk melihat daftar yang telah di pesan, dapat dengan 
				mengarahkan kursor pada icon list di kanan layar anda
				</div></div>";
	if(mysql_num_rows($hasil)==0)
		{
			echo "<table align='center' cellpadding='3' cellspacing='1'>
			<tr><td colspan='2' align='center'>
			Tidak ada menu!</td></tr></table>";
		}
	else{ echo "<div style='overflow:auto;height:390px;'>";
			while($tampil=mysql_fetch_array($hasil))
				{
					echo "<tr><td><a style='text-decoration:none;' href='pesan.php?id=".$tampil['id_menu']."'>
							<div id='daftar' >
							<div class='besar' style='float:left;'><img src='admin/thumb/t_{$tampil['foto']}' height='50px' width='50px' /></div>
							<div class='nama' style='height:auto;width:200px;float:left;'>".$tampil['nama']."</div>
							<div class='nama' style='height:auto;width:150px;float:right;'>Rp. ".$tampil['harga']."</div>
							</div>
							</a>
						</td></tr>
						";
				}
			echo "</div></table>";
		}
	mysql_close();
?>
