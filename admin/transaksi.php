<?php
session_start();
require 'function.php';
if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";     
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>  
    <?php include '../layout/sidebar.php' ?>
    <div class="main">
        <h2 class="judul">Data Transaksi</h2><hr> <br>
        <a href="cetak_transaksi.php" class="tambah">Cetak Transaksi</a>   

            <!-- yg udah di tolak -->
            <h3>List Pesanan yang sudah di verifikasi</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama_lengkap</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $queryVer = mysqli_query($conn, "SELECT * FROM transaksi WHERE status LIKE '%Dikirim%'");
                $i = 1;
                foreach ($queryVer as $data) {
                ?>
                <tr>

                <td><?= $i++; ?></td>
                <td><?= $data["name"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= number_format($data["harga_produk"]); ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><img src="../foto/<?= $data['foto_produk']; ?>" width="100px" alt=""></td>
                <td>
                    <a href="detail_transaksi.php?id=<?=$data["id_transaksi"]; ?>" class="detail">Detail →</a>
                </td>
            </tr>
                <?php
                }
                ?>
            </table>
            <!-- yg udah di tolak -->
            <h3>List Pesanan yang sudah di Tolak</h3>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama_lengkap</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $queryVer = mysqli_query($conn, "SELECT * FROM transaksi WHERE status LIKE '%Ditolak%'");
                $i = 1;
                foreach ($queryVer as $data) {
                ?>
                <tr>

                <td><?= $i++; ?></td>
                <td><?= $data["name"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= number_format($data["harga_produk"]); ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><img src="../foto/<?= $data['foto_produk']; ?>" width="100px" alt=""></td>
                <td>
                    <a href="detail_transaksi.php?id=<?=$data["id_transaksi"]; ?>" class="detail">Detail →</a>
                </td>
            </tr>
                <?php
                }
                ?>
            </table>
        </div>
</body>
</html>