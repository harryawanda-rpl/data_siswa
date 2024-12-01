<?php

// memulai sesi
session_start();
// menghubungkan file proses-tambah.php dengan file konfigurasi database
include("config.php");

// mengecek apakah tombol 'simpan' sudah ditekann
if(isset($_POST['simpan'])){
  /* Mengambil nilai dari form input
  dan menyimpan ke dalam variabel */ 
  $nis = $_POST['nis'];
  $namaLengkap = $_POST['namaLengkap'];
  $jk = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  /* Menyusun query SQL untuk menambahkan data
  ke tabel 'tb_siswa' */
  $sql = "INSERT INTO tb_siswa (nis, namaLengkap, jenis_kelamin,
  tempat_lahir, tanggal_lahir, alamat) VALUES ('$nis','$namaLengkap',
  '$jk','$tempat_lahir','$tanggal_lahir','$alamat')";

  // menjalankan query dan menyimpan hasilnya dalam variabel $query
  $query = mysqli_query($db, $sql);

  // simpan peesan di sesi
  if($query){
    $_SESSION['notifikasi'] = "Data siswa berhasil ditambahkan!";
  } else {
    $_SESSION['notifikasi'] = "Data siswa gagal ditambahkan!";
  }
  // Alihkan ke halaman index.php
  header('Location: index.php');
} else {
  die ("Akses ditolak...");
}