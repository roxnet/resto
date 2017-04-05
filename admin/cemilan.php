
<?php
	//untuk menampilkan daftar makanan
	include "koneksi.php";
	include "cek_admin.php";
?>

<?php
	$panggil= "select * from menu where id_jenis='ce001'";
	$hasil=mysql_query($panggil) or die(mysql_error());
	$total=mysql_num_rows($hasil);
	
	$pang= "select * from jenis_menu where j_menu='ce001'";
	$hasl=mysql_query($pang) or die(mysql_error());
	$judul=mysql_fetch_array($hasl);
	echo "<div id='title' style='text-align:center;color:white;font-size:3em'>
				".$judul['nama_jenis']."
				<br/><div id='txt'>Halaman Untuk mengatur daftar ".$judul['nama_jenis']."&nbsp;<br />
				Admin dapat menambahkan, merubah, dan menghapus dari daftar ".$judul['nama_jenis']."&nbsp;yang ada
				</div></div>";
				
	echo "<form action='/resto/admin/insert.php' method='get'>
		<input type='hidden' name='a' value='snack' />
		<input type='submit' value='TAMBAH CEMILAN' />
    </form>";
	
	if(mysql_num_rows($hasil)==0)
		{
			echo "<table align='center' cellpadding='3' cellspacing='1'>
			<tr><td colspan='2' align='center'>
			Tidak ada menu!</td></tr></table>";
		}
	else{	echo "<div style='overflow:auto;height:390px;'>";
			while($tampil=mysql_fetch_array($hasil))
				{
					echo "<tr><td>
							<div id='daftar' >
						<div class='besar'><img src='admin/thumb/t_{$tampil['foto']}' height='50px'/></div>
							<div class='nama' style='width:200px;float:left;'>".$tampil['nama']."</div>
							<div class='nama' style='width:150px;float:left;'>Rp. ".$tampil['harga']."</div>
						
						<a class='link' href='admin/delete.php?hapus=".$tampil["id_menu"]."'>
							<div class='nama' style='float:right;margin-left:10px;'>HAPUS</div>
						</a>
						<a  class='link'  href='admin/edit.php?menu=".$tampil["id_menu"]."'>
							<div class='nama' style='float:right;margin-right:10px;'>EDIT</div>
						</a>
						</div>
							</td></tr> 
						";
				}
			echo "</div></table>";
		}
	mysql_close();
?>
