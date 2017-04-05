<!DOTYPE HTML>
<html>
	<head>
		<title>ROXOR RESTO</title>
		<link rel="stylesheet" type="text/css" href="css/home2.css" />
	</head>
	<body>
		<div id="countainer">
			<div id="header">
				<img id="logo" src="image/logo.png"  />
				<div id='backText'>
					<div class='text'>
						<h3>Selamat Datang Di layanan Website Restoran FS&amp;D </h3><hr/>
						disini kami menyediakan dua jenis layanan, yaitu :
						<ul>
							<li>-Menu Order : untuk pemesanan di tempat</li>
							<li>-Menu Delivery Order : untuk pemesanan pesan antar, </li>
						</ul>
					</div>
				</div>
			</div>
			<div id="conten">
				<div id="kiri" class="here">
					<a href="#popup"><img src="image/tp.png"/></a>
				</div>
				
				<a href="cekked.php?nmr=1">
				<div id="kanan" class="here">
					<img src="image/dv.png"/>
				</div>
				</a>
				
			</div>
			<div style='clear:both;margin-top:-60;margin-left:180px;width:250px'>

<!--popup Untuk memasukan nomer meja-->
		<div id="popup">
           <div class="window">
               <a href="#" class="close-button" title="Close">X</a>
               <h3>Silahkan Pilih No Meja</h3>
               <hr/>
			   <form action='cekked.php' method='post'>
			   <?php
				include "koneksi.php";
					$panggil="select no from meja where pakai='t'";
					$hasil=mysql_query($panggil);
					mysql_num_rows($hasil);
					echo "
							<select name='pilihan'>
								<option>-</option>
						";
					while($total=mysql_fetch_array($hasil)){
						
						$_SESSION["$a"]=$total['no'];
						echo "
								<option value='".$_SESSION["$a"]."'>".$_SESSION["$a"]."</option>
						";
					}
					mysql_close();
					echo "</select>";
			   ?>
			   		<br/><br/>
					<input type='submit' value='PESAN!!!' class='tombol' />
			   </form>
			<?php
			error_reporting(E_ALL^(E_NOTICE|E_WARNING));
			 $komen=$_GET['kom'];
			if($komen=='kosong'){
			echo "<div id='popup2'>";
           	echo "		<div class='window2'>";
            echo "  		 <a href='index.php?kom=kosong#popup' class='close-button2' title='Close2'>X</a>";
            echo "   		<h3>Anda Belum Mengisi No Meja!!</h3><hr/>";
			echo "   		<h4>Silahkan Mengisi No Meja Terlebih Dahulu Sebelum Memesan</h4>";
			}
			?>
           </div>
       </div>
			</div>
		</div>
	</body>
</html>

