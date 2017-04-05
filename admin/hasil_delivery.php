<div id="" style="background-color:red; text-color:white; text-align:center;"><h3>Daftar Pesan Antar</h3></div>
<?php

include "../koneksi.php";
include "cek_admin.php";
$muncul="select distinct(date),id_user,waktu from order_deliver order by date desc,waktu asc ";
	$query=mysql_query($muncul);
	
	echo "<table style='border:2px solid black;'>
			<tr>
				<td>NO ID &
				WAKTU</td>
			</tr>
	";
		while($hasil=mysql_fetch_array($query)){
		echo "<tr>
			<td><a href='admin/tampil_delivery.php?a=".$hasil['id_user']."&b=".$hasil['date']."&c=".$hasil['waktu']."'>  
				<div style='background-color:gray;width:320px;height:30px;margin-bottom:5px;border-radius:10px;text-align:center;'>
				".$hasil['id_user']."&nbsp;&nbsp;&nbsp;".$hasil['date']."&nbsp&nbsp&nbsp".$hasil['waktu']."
				
				<a href='admin/delete.php?d=".$hasil['id_user']."&e=".$hasil['date']."&f=".$hasil['waktu']."'>
							<div class='nama' style='height:auto;width:150px;float:right;'>HAPUS</div></a>
					</div></a>
			</td>
		</tr>
		";
		}
	echo "</table>";
	mysql_close();
	?>