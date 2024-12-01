<?php

$server = "localhost"; // membuat nama host: localhost
$user = "root"; // membuat nama pengguna MySQL, default: root
$password = ""; // Root secara default tidak memiliki password
$nama_database = "data_siswa"; // nama database yang akan digunakan
// Mencoba untuk membuat koneksi ke database
$db = mysqli_connect($server, $user, $password, $nama_database);
// Memeriksa apakah koneksi berhasil
if(!$db){
  die ("Gagal terhubung dengan database: ".mysqli_connect_error());
}

?>