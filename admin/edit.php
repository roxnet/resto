<?php
	include "../koneksi.php";
	include "cek_admin.php";
?>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<div id='bg'><h2 style='color:white;margin-left:20px;'>Edit Page</h2>
	 <div id='box'>
	<div class='isinya'>

<?php
	
	if(isset($_GET['menu'])){
		$menu=$_GET['menu'];
		$liat="select * from menu a,jenis_menu b where a.id_jenis=b.j_menu and id_menu='$menu'";
		$tampil=mysql_query($liat);
		$ambil=mysql_fetch_array($tampil);
		echo '<form action="../home_admin.php">
			<table cellpadding="3" cellspacing="0">
				<tr>
					<input type="hidden" name="ma" value="'.$ambil['nama_jenis'].'">
					<td><input type="submit" value="KEMBALI" class="tombol"></td>
				</tr>
				<tr>
					<td><br/></td>
				</tr>
			</table>
		</form>';
		
		echo "
			<form method='post'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id' readonly='readonly' value='".$ambil['id_menu']."'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama' value='".$ambil['nama']."'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga' value='".$ambil['harga']."'/></td>
			</tr>
				<tr>
					<td><input type='hidden' name='id_jenis' value='".$ambil['id_jenis']."'/></td>
				</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol'/> </td>
				<td></td>
				<td><input type='reset' value='Batal' onclick='return confirm('Ingin ulangi data yang telah diinput?')' class='tombol' /></td>
			</tr>
		</table>
		</form>
		";

		if(isset($_POST['simpan'])){
		$a=$_POST['id'];
		$b=$_POST['nama'];
		$c=$_POST['harga'];
		$d=$_POST['id_jenis'];
		
		$tangkap="update menu set nama='$b',harga='$c',id_jenis='$d' where id_menu='$a'";
		$hasil=mysql_query($tangkap);
		
		$panggil="select * from jenis_menu where j_menu='$d'";
		$has=mysql_query($panggil);
		$tamp=mysql_fetch_array($has);
		if($hasil){
			echo 'Data berhasil di Ubah! <br/>';
			echo '<a href="../home_admin.php?ma='.$tamp['nama_jenis'].'">Kembali</a>';
		}
		else{
			echo 'Gagal mengubah data! ';	//Pesan jika proses tambah gagal
			echo '<a href="edit.php?menu='.$ambil['id_menu'].'">Ulangi</a>';
		}
		}
	}
	
	
	if(isset($_GET['paket'])){
	$paket=$_GET['paket'];
	echo '<form action="../home_admin.php">
	<table cellpadding="3" cellspacing="0">
	<tr>
		<td><input type="hidden" name="ma" value="paket">
		<td><input type="submit" value="KEMBALI" class="tombol"></td>
	</tr>
	<tr>
		<td><br/></td>
	</tr>
	</table>
</form>';

		$liat="select * from paket";
		$tampil=mysql_query($liat);
		$ambil=mysql_fetch_array($tampil);
		echo "
			<form method='post'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id' readonly='readonly' value='".$ambil['id_paket']."'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama' value='".$ambil['nama_paket']."'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga' value='".$ambil['harga']."'/></td>
			</tr>
			<tr>
				<td>ISI PAKET</td>
			</tr>
			<tr>
				<td>MAKANAN</td>
				<td>:</td>
				<td><select name='p_makan'>";
					$panggil="select * from menu where id_jenis='ma001'";
					$hasil=mysql_query($panggil);
					while($tampil=mysql_fetch_array($hasil))
					{
					echo("
						<option value=$tampil[id_menu]>$tampil[nama]</option>
					");
					}
				
		echo "	</select>
				</td>
			</tr>
			<tr>
				<td>MINUMAN</td>
				<td>:</td>
				<td><select name='p_minum'>";
					$panggil="select * from menu where id_jenis='mi001'";
					$hasil=mysql_query($panggil);
					while($tampil=mysql_fetch_array($hasil))
					{
					echo("
						<option value=$tampil[id_menu]>$tampil[nama]</option>
					");
					}
				
		echo "	</select>
				</td>
			</tr>
		<tr>
				<td>MINUMAN</td>
				<td>:</td>
				<td><select name='p_cemilan'>";
					$panggil="select * from menu where id_jenis='ce001'";
					$hasil=mysql_query($panggil);
					while($tampil=mysql_fetch_array($hasil))
					{
					echo("
						<option value=$tampil[id_menu]>$tampil[nama]</option>
					");
					}
				
		echo "	</select>
				</td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol'/> </td>
				<td></td>
				<td>&<input type='reset' value='Batal' onclick='return confirm('Ingin ulangi data yang telah diinput?')' class='tombol' /></td>
			</tr>
		</table>
		</form>
		";
		if(isset($_POST['simpan'])){
		$a=$_POST['id'];
		$b=$_POST['nama'];
		$c=$_POST['harga'];
		$d=$_POST['p_makan'];
		$e=$_POST['p_minum'];
		$f=$_POST['p_cemilan'];
		$tangkap="update paket set nama_paket='$b',harga='$c' where id_paket='$a';";
		$hapus="delete from menu_paket where id_paket='$a'";
		mysql_query($hapus);
		$tang="insert into menu_paket values ('$d','$a'),('$e','$a'),('$f','$a');";
		$has=mysql_query($tangkap)or die(mysql_error());
		$hasil=mysql_query($tang)or die(mysql_error());
		if($hasil && $has){
			echo 'Data berhasil di ubah! <br/>';
			echo '<a href="../home_admin.php?ma=paket" class="tombol">Kembali</a>';
		}
		else{
			echo 'Gagal mengubah data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=paket">Ulangi</a>';
		}
		}
	}
	
	if(isset($_GET['meja'])){
		$meja=$_GET['meja'];
		$liat="select * from meja where no='$meja'";
		$tampil=mysql_query($liat);
		$ambil=mysql_fetch_array($tampil);
		echo '<form action="../home_admin.php">
			<table cellpadding="3" cellspacing="0">
				<tr>
					<input type="hidden" name="ma" value="meja">
					<td><input type="submit" value="KEMBALI" class="tombol"></td>
				</tr>
				<tr>
					<td><br/></td>
				</tr>
			</table>
		</form>';
		
		echo "
			<form method='post'>
		<table>
			<tr>
				<td>NO MEJA</td>
				<td>:</td>
				<td><input type='text' name='no' readonly='readonly' value='".$ambil['no']."'/></td>
			</tr>
			<tr>
				<td>KAPASITAS</td>
				<td>:</td>
				<td><input type='text' name='kapasitas' value='".$ambil['kapasitas']."'/></td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol'/> </td>
				<td></td>
				<td><input type='reset' value='Batal' onclick='return confirm('Ingin ulangi data yang telah diinput?')' class='tombol' /></td>
			</tr>
		</table>
		</form>
		";

		if(isset($_POST['simpan'])){
		$a=$_POST['no'];
		$b=$_POST['kapasitas'];
		
		$tangkap="update meja set kapasitas='$b' where no='$a'";
		$hasil=mysql_query($tangkap);
		
		if($hasil){
			echo 'Data berhasil di Ubah! <br/>';
			echo '<a href="../home_admin.php?ma=meja" class="tombol" >Kembali</a>';
		}
		else{
			echo 'Gagal mengubah data! ';	//Pesan jika proses tambah gagal
			echo '<a href="edit.php?menu='.$ambil['meja'].'">Ulangi</a>';
		}
		}
		
	}
	
	mysql_close();
?>
		</div>
	</div>
</div>		
		