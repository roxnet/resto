<!DOTYPE HTML>
<html>
	<head>
		<title>ROXOR RESTO</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="google.js"></script>
		<script type="text/javascript">$('document').ready(function(){
		$('#list a').click(function(){
			var url=$(this).attr('href');
			$('.key').load(url);
			return false;
			});
			});
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
						<li><a href="delivery.php?ma=paket">PAKET</a></li>
						<li><a href="about.php">TENTANG KAMI</a></li>
					</ul>
				</div>
				<div id="footer">@copyright coegTeam.com
				</div>
			</div>
			<div id="main">
				
				<div id="list" >
					<?php
						include "dinamis_delivery.php";
					?>
				</div>
			</div>
			<div id="luar">
				
				<ul>
					<li>
					<a href="#"><div id="pesanan"> <img src='image/list.png' width='30' class='ls'/>
						
					</a>
					
						<ul>
							<li><div id="label">
									<div id="harga" class="key">
									<?php
										include "pesan_delivery.php";
										?>
									</div>
							</div></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</body>
</html>