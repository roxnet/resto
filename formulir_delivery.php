<link rel="stylesheet" type="text/css" href="css/style.css" />	
	<div id="bg"><h2 style='color:white;margin-left:20px;'>Formulir Pemesan :</h2>
 		<div id="box">
			<div class="isinya">
				<h4>Harap mengisi data diri dengan benar ..</h4><hr/>
				
<form method="post">
	<table>
		<tr>
			<td><?php
			$meja=$_POST['meja'];
			echo "<input type='hidden' value='".$meja."' name='id' />";
			?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type='text' name='nama' required/></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td>:</td>
			<td><input type='text' name='alamat' required/></td>
		</tr>
		<tr>
			<td>no-telepon</td>
			<td>:</td>
			<td><input type='text' name='telepon' required/></td>
		</tr>
		<tr>
			<td><input type="submit" value="PESAN" name="pesan" class="tombol"></td>
			<td></td>
			<td><input type="reset" value="RESET" class="tombol"></td>
		</tr>
	</table>
</form>

<?php
include "koneksi.php";
if(isset($_POST['pesan'])){
	$a=$_POST['id'];
	$b=$_POST['nama'];
	$c=$_POST['alamat'];
	$d=$_POST['telepon'];
	$query="insert into deliver values('$a','$b','$c','$d')";
	$benar=mysql_query($query)or die("Mohon Diisi dengan Lingkap");
	if($benar){
		mysql_close();
		header("location:kirim_delivery.php?id=$a");
	}
	else echo"Mohon Diisi Dengan Lengkap!";
}
?>
		</div>
	</div>
</div>