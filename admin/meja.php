<?php
	//untuk menampilkan meja
	include "koneksi.php";
	include "cek_admin.php";
	
	$panggil= "select * from meja";
	$hasil=mysql_query($panggil) or die(mysql_error());
	$total=mysql_num_rows($hasil);
	
	echo "
	<div id='title' style='text-align:center;color:white;font-size:3em'>
				Atur Meja
				<br/><div id='txt'>Halaman Untuk mengatur Meja yang Tersedia<br />
				Admin dapat menambahkan, merubah, dan menghapus dari daftar Meja yang ada
				</div></div>
	
	<form action='/resto/admin/insert.php' method='get'>
		<input type='hidden' name='a' value='meja' />
		<input type='submit' value='TAMBAH MEJA' />
    </form>";
	
	if(mysql_num_rows($hasil)==0)
		{
			echo "<table align='center' cellpadding='3' cellspacing='1'>
			<tr><td colspan='2' align='center'>
			Tidak ada meja!</td></tr>";
		}
	else{	echo "<div style='overflow:auto;height:390px;'>";
			while($tampil=mysql_fetch_array($hasil))
				{
					echo "<tr><td>
							<div id='daftar' >
							<div class='nama' style='height:auto;width:200px;float:left;'>".$tampil['no']."</div>
							<div class='nama' style='height:auto;width:150px;float:left;'>".$tampil['kapasitas']."</div>
							<div class='nama' style='height:auto;width:150px;float:left;'>".$tampil['pakai']."</div>
						
						<a href='admin/delete.php?delete=".$tampil["no"]."'>
							<div class='nama' style='height:auto;width:150px;float:right;'>HAPUS</div>
						</a>
						<a href='admin/edit.php?meja=".$tampil["no"]."'>
							<div class='nama' style='height:auto;width:150px;float:right;'>EDIT</div>
						</a>
						</div>
							</td></tr> 
						";
				}
			echo "</div></table>";
		}
	mysql_close();
?>