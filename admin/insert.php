<?php
	include "../koneksi.php";
	include "cek_admin.php";
?>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<div id='bg'><h2 style='color:white;margin-left:20px;'>Insert Page</h2>
	 <div id='box'>
	<div class='isinya'>
		
<?php
	$menu=$_GET['a'];
	
	if($menu=="makanan"){
	echo '<form action="../home_admin.php">
	<table cellpadding="3" cellspacing="0">
	<tr>
		<input type="hidden" name="ma" value="makanan">
		<td><input type="submit" value="KEMBALI" class="tombol"></td>
	</tr>
	<tr>
		<td><br/></td>
	</tr>
	</table>
</form>';
	
		$liat="select * from menu where id_jenis='ma001'";
		$tampil=mysql_query($liat);
		echo "<table border='1'>";
		while($tamp=mysql_fetch_array($tampil)){
			echo "
					<tr>
						<td>".$tamp['id_menu']."</td>
						<td>".$tamp['nama']."</td>
						<td>".$tamp['harga']."</td>
					</tr>
			";
		}
		echo "</table>";
		echo "
			<form method='post' enctype='multipart/form-data'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga'/></td>
			</tr>
			<tr>
				<td><input type='hidden' name='id_jenis' value='ma001'/></td>
			</tr>
			<tr>
				<td colspan='2'>Gambar [max=1.5MB]</td>
				<td><input type='file' name='foto'></td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol' /></td>
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
		
		$foto=$_FILES['foto']['name'];
		$tmpName=$_FILES['foto']['tmp_name'];
		$size=$_FILES['foto']['size'];
		$type=$_FILES['foto']['type'];
		
		$maxsize=1500000;
		$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");
		
		$dirFoto ="pict";
		if(!is_dir($dirFoto))
			mkdir($dirFoto);
		$fileTujuanFoto=$dirFoto."/".$foto;
		
		$dirThumb	="thumb";
		if(!is_dir($dirThumb))
			mkdir($dirThumb);
		$fileTujuanThumb=$dirThumb."/t_".$foto;
		
		if($size>0){
			if($size>$maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			}
			if(!in_array($type,$typeYgBoleh)){
			echo "Type File Tidak Dikenal<br/>";
			}
		}
		
		$tangkap="insert into menu values ('$a','$b','$c','$d','$foto')";
		$hasil=mysql_query($tangkap);
		if($hasil){
			echo 'Data berhasil di tambahkan! <br/>';
			echo '<a href="insert.php?a=makanan">Tambah Kembali</a>';
		}
		else{
			echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=makanan">Ulangi</a>';
		}
		
		function buat_thumbnail($file_src,$file_dst){
			//hapus jika thumbnail sebelumnya sudah ada
			list($w_src,$h_src,$type) =getImageSize ($file_src);
			
			switch($type){
			case 1: //gif ->jpg
			$img_src=imagecreatefromgif($file_src);
			break;
			case 2: //jpeg ->jpg
			$img_src=imagecreatefromjpeg($file_src);
			break;
			case 2: //png ->jpg
			$img_src=imagecreatefrompng($file_src);
			break;
			}
			$thumb=100; //max. size untuk thumb
			if($w_src>$h_src){
				$w_dst=$thumb; //landscape
				$h_dst=round($thumb/$w_src * $h_src);
			}else{
				$w_dst=round($thumb/$h_src*$w_src);//portrait
				$h_dst=$thumb;
			}
			
			$img_dst=imagecreatetruecolor($w_dst,$h_dst);//resample
			
			imagecopyresampled($img_dst,$img_src, 0,0,0,0,
				$w_dst,$h_dst,$w_src,$h_src);
			imagejpeg($img_dst,$file_dst);//simpan thumbnail
			//bersihkan memori
			imagedestroy($img_src);
			imagedestroy($img_dst);
		}
		
		if($size>0){
			if(!move_uploaded_file($tmpName,$fileTujuanFoto)){
				echo "Gagal Upload Gambar..<br/>";
			}else{
				buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
			}
		}
		
		echo "<br/>File sudah diupload. <br/>";
		
		
		}
	}
	
	else if($menu=='minuman'){
	echo '<form action="../home_admin.php">
	<table cellpadding="3" cellspacing="0">
	<tr>
		<input type="hidden" name="ma" value="minuman">
		<td><input type="submit" value="KEMBALI" class="tombol" ></td>
	</tr>
	<tr>
		<td><br/></td>
	</tr>
	</table>
</form>';
		$liat="select * from menu where id_jenis='mi001'";
		$tampil=mysql_query($liat);
		echo "<table border='1'>";
		while($tamp=mysql_fetch_array($tampil)){
			echo "
					<tr>
						<td>".$tamp['id_menu']."</td>
						<td>".$tamp['nama']."</td>
						<td>".$tamp['harga']."</td>
					</tr>
			";
		}
		echo "</table>";
		echo "
			<form method='post' enctype='multipart/form-data'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga'/></td>
			</tr>
				<tr>
					<td><input type='hidden' name='id_jenis' value='mi001'/></td>
				</tr>
			<tr>
				<td colspan='2'>Gambar [max=1.5MB]</td>
				<td><input type='file' name='foto'></td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol' /></td>
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
		
		$foto=$_FILES['foto']['name'];
		$tmpName=$_FILES['foto']['tmp_name'];
		$size=$_FILES['foto']['size'];
		$type=$_FILES['foto']['type'];
		
		$maxsize=1500000;
		$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");
		
		$dirFoto ="pict";
		if(!is_dir($dirFoto))
			mkdir($dirFoto);
		$fileTujuanFoto=$dirFoto."/".$foto;
		
		$dirThumb	="thumb";
		if(!is_dir($dirThumb))
			mkdir($dirThumb);
		$fileTujuanThumb=$dirThumb."/t_".$foto;
		
		if($size>0){
			if($size>$maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			}
			if(!in_array($type,$typeYgBoleh)){
			echo "Type File Tidak Dikenal<br/>";
			}
		}
		
		$tangkap="insert into menu values ('$a','$b','$c','$d','$foto')";
		$hasil=mysql_query($tangkap);
		if($hasil){
			echo 'Data berhasil di tambahkan! <br/>';
			echo '<a href="insert.php?a=minuman">Tambah Kembali</a>';
		}
		else{
			echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=minuman">Ulangi</a>';
		}
		function buat_thumbnail($file_src,$file_dst){
			//hapus jika thumbnail sebelumnya sudah ada
			list($w_src,$h_src,$type) =getImageSize ($file_src);
			
			switch($type){
			case 1: //gif ->jpg
			$img_src=imagecreatefromgif($file_src);
			break;
			case 2: //jpeg ->jpg
			$img_src=imagecreatefromjpeg($file_src);
			break;
			case 2: //png ->jpg
			$img_src=imagecreatefrompng($file_src);
			break;
			}
			$thumb=100; //max. size untuk thumb
			if($w_src>$h_src){
				$w_dst=$thumb; //landscape
				$h_dst=round($thumb/$w_src * $h_src);
			}else{
				$w_dst=round($thumb/$h_src*$w_src);//portrait
				$h_dst=$thumb;
			}
			
			$img_dst=imagecreatetruecolor($w_dst,$h_dst);//resample
			
			imagecopyresampled($img_dst,$img_src, 0,0,0,0,
				$w_dst,$h_dst,$w_src,$h_src);
			imagejpeg($img_dst,$file_dst);//simpan thumbnail
			//bersihkan memori
			imagedestroy($img_src);
			imagedestroy($img_dst);
		}
		
		if($size>0){
			if(!move_uploaded_file($tmpName,$fileTujuanFoto)){
				echo "Gagal Upload Gambar..<br/>";
			}else{
				buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
			}
		}
		
		echo "<br/>File sudah diupload. <br/>";
		
		}
	}
	
	else if($menu=='snack'){
	echo '<form action="../home_admin.php">
	<table cellpadding="3" cellspacing="0">
	<tr>
		<input type="hidden" name="ma" value="cemilan">
		<td><input type="submit" value="KEMBALI" class="tombol"></td>
	</tr>
	<tr>
		<td><br/></td>
	</tr>
	</table>
</form>';
		$liat="select * from menu where id_jenis='ce001'";
		$tampil=mysql_query($liat);
		echo "<table border='1'>";
		while($tamp=mysql_fetch_array($tampil)){
			echo "
					<tr>
						<td>".$tamp['id_menu']."</td>
						<td>".$tamp['nama']."</td>
						<td>".$tamp['harga']."</td>
					</tr>
			";
		}
		echo "</table>";
		echo "
			<form method='post' enctype='multipart/form-data'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga'/></td>
			</tr>
				<tr>
					<td><input type='hidden' name='id_jenis' value='ce001'/></td>
				</tr>
			<tr>
				<td colspan='2'>Gambar [max=1.5MB]</td>
				<td><input type='file' name='foto'></td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol' /> </td>
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
		
		$foto=$_FILES['foto']['name'];
		$tmpName=$_FILES['foto']['tmp_name'];
		$size=$_FILES['foto']['size'];
		$type=$_FILES['foto']['type'];
		
		$maxsize=1500000;
		$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");
		
		$dirFoto ="pict";
		if(!is_dir($dirFoto))
			mkdir($dirFoto);
		$fileTujuanFoto=$dirFoto."/".$foto;
		
		$dirThumb	="thumb";
		if(!is_dir($dirThumb))
			mkdir($dirThumb);
		$fileTujuanThumb=$dirThumb."/t_".$foto;
		
		if($size>0){
			if($size>$maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			}
			if(!in_array($type,$typeYgBoleh)){
			echo "Type File Tidak Dikenal<br/>";
			}
		}
		
		$tangkap="insert into menu values ('$a','$b','$c','$d','$foto')";
		$hasil=mysql_query($tangkap);
		if($hasil){
			echo 'Data berhasil di tambahkan! <br/>';
			echo '<a href="insert.php?a=snack">Tambah Kembali</a>';
		}
		else{
			echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=snack">Ulangi</a>';
		}
		
		function buat_thumbnail($file_src,$file_dst){
			//hapus jika thumbnail sebelumnya sudah ada
			list($w_src,$h_src,$type) =getImageSize ($file_src);
			
			switch($type){
			case 1: //gif ->jpg
			$img_src=imagecreatefromgif($file_src);
			break;
			case 2: //jpeg ->jpg
			$img_src=imagecreatefromjpeg($file_src);
			break;
			case 2: //png ->jpg
			$img_src=imagecreatefrompng($file_src);
			break;
			}
			$thumb=100; //max. size untuk thumb
			if($w_src>$h_src){
				$w_dst=$thumb; //landscape
				$h_dst=round($thumb/$w_src * $h_src);
			}else{
				$w_dst=round($thumb/$h_src*$w_src);//portrait
				$h_dst=$thumb;
			}
			
			$img_dst=imagecreatetruecolor($w_dst,$h_dst);//resample
			
			imagecopyresampled($img_dst,$img_src, 0,0,0,0,
				$w_dst,$h_dst,$w_src,$h_src);
			imagejpeg($img_dst,$file_dst);//simpan thumbnail
			//bersihkan memori
			imagedestroy($img_src);
			imagedestroy($img_dst);
		}
		
		if($size>0){
			if(!move_uploaded_file($tmpName,$fileTujuanFoto)){
				echo "Gagal Upload Gambar..<br/>";
			}else{
				buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
			}
		}
		
		echo "<br/>File sudah diupload. <br/>";
		
		}
	}
	
	else if($menu=='paket'){
	echo '<form action="../home_admin.php">
	<table cellpadding="3" cellspacing="0">
	<tr>
		<input type="hidden" name="ma" value="paket">
		<td><input type="submit" value="KEMBALI" class="tombol"></td>
	</tr>
	<tr>
		<td><br/></td>
	</tr>
	</table>
</form>';
		$liat="select * from paket";
		$tampil=mysql_query($liat);
		echo "<table border='1'>";
		while($tamp=mysql_fetch_array($tampil)){
			echo "
					<tr>
						<td>".$tamp['id_paket']."</td>
						<td>".$tamp['nama_paket']."</td>
						<td>".$tamp['harga']."</td>
					</tr>
			";
		}
		echo "</table>";
		echo "
			<form method='post' enctype='multipart/form-data'>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id'/></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><input type='text' name='nama'/></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type='text' name='harga'/></td>
			</tr>
			<tr>
				<td colspan='2'>Gambar [max=1.5MB]</td>
				<td><input type='file' name='foto'></td>
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
			<td>CEMILAN</td>
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
				<td><input type='submit' value='Simpan' name='simpan' class='tombol' /> </td>
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
		$d=$_POST['p_makan'];
		$e=$_POST['p_minum'];
		$f=$_POST['p_cemilan'];
		
		$foto=$_FILES['foto']['name'];
		$tmpName=$_FILES['foto']['tmp_name'];
		$size=$_FILES['foto']['size'];
		$type=$_FILES['foto']['type'];
		
		$maxsize=1500000;
		$typeYgBoleh=array("image/jpeg","image/png","image/pjpeg");
		
		$dirFoto ="pict";
		if(!is_dir($dirFoto))
			mkdir($dirFoto);
		$fileTujuanFoto=$dirFoto."/".$foto;
		
		$dirThumb	="thumb";
		if(!is_dir($dirThumb))
			mkdir($dirThumb);
		$fileTujuanThumb=$dirThumb."/t_".$foto;
		
		if($size>0){
			if($size>$maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			}
			if(!in_array($type,$typeYgBoleh)){
			echo "Type File Tidak Dikenal<br/>";
			}
		}
		
		$tangkap="insert into paket values ('$a','$b','$c','$foto');";
		$tang="insert into menu_paket values ('$d','$a'),('$e','$a'),('$f','$a');";
		$has=mysql_query($tangkap)or die(mysql_error());
		$hasil=mysql_query($tang)or die(mysql_error());
		if($hasil && $has){
			echo 'Data berhasil di tambahkan! <br/>';
			echo '<a href="insert.php?a=paket">Tambah Kembali</a>';
		}
		else{
			echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=paket">Ulangi</a>';
		}
		
		function buat_thumbnail($file_src,$file_dst){
			//hapus jika thumbnail sebelumnya sudah ada
			list($w_src,$h_src,$type) =getImageSize ($file_src);
			
			switch($type){
			case 1: //gif ->jpg
			$img_src=imagecreatefromgif($file_src);
			break;
			case 2: //jpeg ->jpg
			$img_src=imagecreatefromjpeg($file_src);
			break;
			case 2: //png ->jpg
			$img_src=imagecreatefrompng($file_src);
			break;
			}
			$thumb=100; //max. size untuk thumb
			if($w_src>$h_src){
				$w_dst=$thumb; //landscape
				$h_dst=round($thumb/$w_src * $h_src);
			}else{
				$w_dst=round($thumb/$h_src*$w_src);//portrait
				$h_dst=$thumb;
			}
			
			$img_dst=imagecreatetruecolor($w_dst,$h_dst);//resample
			
			imagecopyresampled($img_dst,$img_src, 0,0,0,0,
				$w_dst,$h_dst,$w_src,$h_src);
			imagejpeg($img_dst,$file_dst);//simpan thumbnail
			//bersihkan memori
			imagedestroy($img_src);
			imagedestroy($img_dst);
		}
		
		if($size>0){
			if(!move_uploaded_file($tmpName,$fileTujuanFoto)){
				echo "Gagal Upload Gambar..<br/>";
			}else{
				buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
			}
		}
		
		echo "<br/>File sudah diupload. <br/>";
		
		}
	}
	
else if($menu=="meja"){
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
	
		$liat="select * from meja";
		$tampil=mysql_query($liat);
		echo "<table border='1'>
				<tr>
					<th>NO MEJA</th>
					<th>KAPASITAS</th>
				</tr>";
		while($tamp=mysql_fetch_array($tampil)){
			echo "
					<tr>
						<td>".$tamp['no']."</td>
						<td>".$tamp['kapasitas']."</td>
					</tr>
			";
		}
		echo "</table>";
		
		echo "
			<form method='post'>
		<table>
			<tr>
				<td>NO MEJA</td>
				<td>:</td>
				<td><input type='text' name='no'/></td>
			</tr>
			<tr>
				<td>KAPASITAS</td>
				<td>:</td>
				<td><input type='text' name='kapasitas'/></td>
			</tr>
			<tr>
				<td><input type='hidden' name='pakai' value='t'/></td>
			</tr>
				<td><input type='submit' value='Simpan' name='simpan' class='tombol' /> </td>
				<td></td>
				<td><input type='reset' value='Batal' onclick='return confirm('Ingin ulangi data yang telah diinput?')' class='tombol' /></td>
			</tr>
		</table>
		</form>
		";
		if(isset($_POST['simpan'])){
		$a=$_POST['no'];
		$b=$_POST['kapasitas'];
		$c=$_POST['pakai'];
		
		$tangkap="insert into meja values ($a,'$b','$c')";
		$hasil=mysql_query($tangkap);
		if($hasil){
			echo 'Data berhasil di tambahkan! <br/>';
			echo '<a href="insert.php?a=meja">Tambah Kembali</a>';
		}
		else{
			echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
			echo '<a href="insert.php?a=meja">Ulangi</a>';
		}
		
		}
	}
	
	mysql_close();
?>
		</div>
	</div>
</div>