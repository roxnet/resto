<!DOTYPE HTML>

<html>
	<head>
		<title>NFS RESTO</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="google.js"></script>
		<script>
			setInterval(function(){
				$("#ulang").load("admin/hasil_here.php");},5000);
			setInterval(function(){
				$("#ulang1").load("admin/hasil_delivery.php");},5000);
		</script>
	</head>
	<body>
		<div id="countainer">
			<div id="menu">
				<div id="logo">
					<img id="logo" src="image/logo.png"  />
				</div>
				<div id="navigasi">
					<div id="judul"><h4>MENU:</h4></div>
					<ul>
						<li><a href="home_admin.php?ma=pesan">PESANAN</a></li>
						<li><a href="home_admin.php?ma=makanan">MAKANAN</a></li>
						<li><a href="home_admin.php?ma=minuman">MINUMAN</a></li>
						<li><a href="home_admin.php?ma=cemilan">CEMILAN</a></li>
						<li><a href="home_admin.php?ma=paket">PAKET</a></li>
						<li><a href="home_admin.php?ma=meja">MEJA</a></li>
					</ul>
					<ul>
						<li><a href="log.php?op=out">LOGOUT</a></li>
					</ul>
				</div>
				<div id="footerad">@copyright nfsresto.tk
				</div>
			</div>
			<div id="main">
				
				<div id="list1" >
					<?php
						include "dinamis_admin.php";
					?>
				</div>
			</div>
	</div>
	</body>
</html>