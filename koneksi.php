<?php
function connection() {
   // membuat konekesi ke database system
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "transupn";

   $koneksi = mysqli_connect($dbServer, $dbUser, $dbPass);

   if(!$koneksi) {
      die('Koneksi gagal: ' . mysqli_error($koneksiTransUpn));
   }

   // memilih database yang akan dipakai
   mysqli_select_db($koneksi, $dbName);

   return $koneksi;
}
?>