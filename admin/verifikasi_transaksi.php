<?php
session_start();
require 'function.php';
$produk = query("SELECT * FROM transaksi WHERE status = 'proses'")

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
        <h2 class="judul">Data Transaksi</h2><hr>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($produk as $data): ?>
            <tr>

                <td><?= $i; ?></td>
                <td><?= $data["name"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= number_format($data["harga_produk"]); ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><img src="../foto/<?= $data['foto_produk']; ?>" width="100px" alt=""></td>
                <td>
                    <a href="detail_transaksi.php?id=<?=$data["id_transaksi"]; ?>" 
                    class="detail">Detail →</a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        </table>
        </div>
</body>
</html>