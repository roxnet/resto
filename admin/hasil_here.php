<div id="" style="background-color:red; text-color:white; text-align:center;"><h3>Daftar Pesan di Tempat</h3></div>
<?php

include "../koneksi.php";
include "cek_admin.php";
$muncul="select distinct(date),no,waktu from pesan group by no,waktu order by date desc,waktu asc ";
	$query=mysql_query($muncul);
	
	echo "<table style='border:2px solid black; text-decoration:none;'>
			<tr>
				<td>NO MEJA &
				WAKTU</td>
			</tr>
	";
		while($hasil=mysql_fetch_array($query)){
		echo "<tr>
			<td><a href='admin/tampil.php?a=".$hasil['no']."&b=".$hasil['date']."&c=".$hasil['waktu']."' > 
			<div style='background-color:black;width:320px;height:40px;margin-bottom:5px;border-radius:10px;text-align:center;'> ".$hasil['no']."
				&nbsp&nbsp&nbsp".$hasil['date']."&nbsp&nbsp&nbsp".$hasil['waktu']."
				
				<a href='admin/delete.php?a=".$hasil['no']."&b=".$hasil['date']."&c=".$hasil['waktu']."'>
							<div class='nama' style='height:auto;width:150px;float:right;'>HAPUS</div>
				</div></a>
				</a></td>
		</tr>
		";
		}
	echo "</table>";
	mysql_close();
	?>
