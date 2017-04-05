<?php

session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die(
header("location:../index.php"));//jika belum login jangan lanjut..
}
?>