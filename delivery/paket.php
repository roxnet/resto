
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
?>

<?php
	$panggil= "select * from paket";
	$hasil=mysql_query($panggil) or die(mysql_error());
	$total=mysql_num_rows($hasil);
	if(mysql_num_rows($hasil)==0)
		{
			echo "<table align='center' cellpadding='3' cellspacing='1'>
			<tr><td colspan='2' align='center'>
			Tidak ada menu!</td></tr></table>";
		}
	else{	echo "<div style='overflow:auto;height:390px;'>";
			while($tampil=mysql_fetch_array($hasil))
				{
					echo "<table><tr><td><a href='pesan_delivery.php?pa=".$tampil['id_paket']."'>
							<div id='daftar' >
							<div class='besar' style='float:left;'><img src='admin/thumb/t_{$tampil['foto']}' /></div>
							<div class='nama' style='height:auto;width:250px;float:left;'>".$tampil['nama_paket']."</div>
							<div class='nama' style='height:auto;width:150px;float:left;'>Rp. ".$tampil['harga']."</div>
							</div>
							</a>
						</tr>
						";
			$pan= "select * from menu_paket a,paket b,menu c where a.id_paket=b.id_paket and a.id_menu=c.id_menu and a.id_paket='$tampil[id_paket]'";
	$has=mysql_query($pan) or die(mysql_error());
	$to=mysql_num_rows($has);
			while($tam=mysql_fetch_array($has)){
				echo "		<tr>
							<td>
							<div class='nama' style='margin:0 auto;height:auto;width:250px;background-color:blue;color:white;text-align:center'>".$tam['nama']."</div></td>
							</tr>";
					}
				echo "</div>";
				}
			echo "</table></div>";
		}
		mysql_close();
?>
