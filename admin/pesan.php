
<?php
	//untuk menampilkan daftar makanan
	include "./koneksi.php";
	include "cek_admin.php";
	error_reporting(E_ALL^(E_NOTICE|E_WARNING));
?>

<div class="pesan" id="ulang">
<?php
include "hasil_here.php";
?>
</div>
<div class="pesan" id="ulang1">
<?php
include "hasil_delivery.php";
?>
</div>