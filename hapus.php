<?php

session_start();
include ("config.php");

// periksa apakah ada ID yang dikirim melalui URL
if(isset($_GET['id'])){
  // ambil ID dari URL
  $id = $_GET['id'];
  // membuat query untuk menghapus data siswa berdasarkan ID
  $sql = "DELETE FROM tb_siswa WHERE id = $id";
  $query = mysqli_query($db, $sql);

  // Simpan pesan notifikasi dalam session berdasarkan hasil query
  if($query){
    $_SESSION['notifikasi'] = "Data Siswa berhasil dihapus!";
  } else {
    $_SESSION['notifikasi'] = "Data Siswa gagal dihapus!";
  }
  // Alihkan ke halaman index.php
  header('Location: index.php');
} else {
  // Jika akses langsung tanpa ID, tampilkan pesan error
  die ("Akses ditolak...");
}
