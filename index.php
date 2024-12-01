<?php 
// menghubungkan file config dengan index
include ("config.php");
session_start(); // memulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa | SMKN 4 Tanjungpinang </title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
    }
  </style>
</head>
<body>
  <h2>Data Siswa</h2>
  <!-- Tampilkan Notifikasi Jika ada -->
  <?php if (isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notiifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
  <?php endif; ?>
  <table>
    <thead>
      <th>#</th>
      <th>NIS</th>
      <th>Nama Siswa</th>
      <th>L/P</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th><a href="form-tambah.php">Tambah Data</a></th>
    </thead>
    <tbody>
      <?php
      $no = 1; // membuat variabel $no untuk penomoran
      // membuat variable untuk menjalankan query SQL
      $query = $db->query("SELECT * FROM tb_siswa");
      /* Perulangan while akan terus berjalan (menampilkan data)
      selama kondisi query bernilai true (adanya data pada tabel tb_siswa) */
      while ($siswa = $query->fetch_assoc()){
        // fungsi fetch_assoc digunakan untuk mengambil data perulangan
        // dalam bentuk array
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $siswa['nis'] ?></td>
          <td><?php echo $siswa['namaLengkap'] ?></td>
          <td><?php echo $siswa['jenis_kelamin'] ?></td>
          <td><?php echo $siswa['tempat_lahir'] ?></td>
          <td><?php echo $siswa['tanggal_lahir'] ?></td>
          <td><?php echo $siswa['alamat'] ?></td>
          <td align="center">
            <!-- URL ke halaman edit data menggunakan parameter
            id pada kolom tabel ( *.php?id= )-->
            <a href="form-edit.php?id=<?php echo $siswa['id'] ?>"></a>
            <!-- URL untuk hapus data menggunakan parameter
            id pada kolom tabel dan alert konfirmasi hapus data -->
            <a href="hapus.php?id=<?php echo $siswa['id'] ?>"
            onclick="return confirm('Anda yakin ingin menghapus data?')"></a>
          </td>
        </tr>
        <?php
      } // Mengakhiri proses perulangan while yang dimulai pada baris ke-46
      ?>
    </tbody>
  </table>
  <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>