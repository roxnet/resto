<?php
						$pages_dir = 'delivery';
						if(!empty($_GET['ma'])){
							$pages = scandir($pages_dir, 0);
							unset($pages[0], $pages[1]);
 
							$p = $_GET['ma'];
							if(in_array($p.'.php', $pages)){
							include($pages_dir.'/'.$p.'.php');
							} else {
							echo 'Halaman tidak ditemukan! :(';
							}
						} 
						else {
						include($pages_dir.'/paket.php');
						}
?>