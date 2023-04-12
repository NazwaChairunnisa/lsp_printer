<?php
session_start();
require 'function.php';
if (!isset($_SESSION["username"])) {
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";
}
if ($_SESSION['roles'] != "Admin") {
    echo "
    <script type='text/javascript'>
        alert('anda bukan admin')
        window.location = '../login/index.php';
    </script>";
}

$produk = query("SELECT * FROM produk");

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
        <h2 class="judul">Data Produk</h2>
        <hr><br>
        <a href="tambah_produk.php" class="tambah">Tambah (+)</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga (Rp)</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($produk as $data) : ?>
                <tr>

                    <td><?= $i; ?></td>
                    <td><?= $data["nama_produk"]; ?></td>
                    <td>Rp. <?= number_format($data["harga_produk"]); ?> ,-</td>
                    <td><?= $data["deskripsi_produk"]; ?></td>
                    <td><img src="../foto/<?= $data["foto_produk"] ?>" width="100px" alt=""> </td>
                    <td><?= $data["stok_produk"]; ?></td>
                    <td>
                        <a href="edit_produk.php?id=<?= $data["id_produk"]; ?>" onclick="return confirm('Apakah Anda yakin ingin edit data ini?')" class="edit">Edit</a>

                        <a href="delete_produk.php?id=<?= $data["id_produk"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="hapus">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>