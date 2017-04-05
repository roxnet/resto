
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
	include "cek_admin.php";
?>

<?php
	$panggil= "select * from paket";
	$hasil=mysql_query($panggil) or die(mysql_error());
	$total=mysql_num_rows($hasil);
	
	
	
	echo"<form action='/resto/admin/insert.php' method='get'>
		<input type='hidden' name='a' value='paket' />
		<input type='submit' value='TAMBAH PAKET' />
    </form>";
	
	if(mysql_num_rows($hasil)==0)
		{
			echo "<table align='center' cellpadding='3' cellspacing='1' border='1'>
			<tr><td colspan='2' align='center'>
			Tidak ada menu paket!</td></tr></table>";
		}
	else{
			echo "<div style='overflow:auto;height:590px;'>";
			while($tampil=mysql_fetch_array($hasil))
				{
					echo "
					<div style='background-color:gray;border-radius:10px;margin-bottom:10px'>
					<table>
						
					<tr><td>
							<tr><td>
							<div id='daftar' style='margin-bottom:0px;margin-left:10px;' >
							<div class='besar' style='float:left;'><img src='admin/thumb/t_{$tampil['foto']}' /></div>
							<div class='nama' style='height:auto;width:150px;float:left;'>".$tampil['nama_paket']."</div>
							<div class='nama' style='height:auto;width:150px;float:left;'>Rp. ".$tampil['harga']."</div>
							
							<a   class='link'  href='admin/delete.php?hap=".$tampil["id_paket"]."'>
							<div class='nama' style='height:auto;width:100px;float:right;'>HAPUS</div>
							</a>
							<a   class='link'  href='admin/edit.php?paket=".$tampil["id_paket"]."'>
							<div class='nama' style='height:auto;width:100px;float:right;'>EDIT</div>
						</a>
							</div>
						</td></tr>
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
				echo "</table></div>";
				}
			echo "</div>";
		}
		mysql_close();
?>
