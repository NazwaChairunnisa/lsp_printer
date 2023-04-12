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

$id = $_GET["id"];
$data = query("SELECT * FROM produk WHERE id_produk = $id")[0];

$produk = query("SELECT * FROM produk");

if (isset($_POST["submit"])) {
    if (editProduk($_POST) > 0) {
        echo "<script type='text/javascript'>
        alert('Data Berhasil di Ubah!');
        window.location = 'product.php';</script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Data Gagal di Ubah!');
        window.location = 'product.php';</script>";
    }
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
        <h2>Edit Produk</h2>
        <div class="box">
            <form method="post" enctype="multipart/form-data">
                <label>Nama Produk</label>

                <input type="hidden" name="id_produk" class="form-control" value="<?= $data['id_produk']; ?>">

                <input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk']; ?>">

                <label>Harga Produk</label>
                <input type="text" name="harga_produk" class="form-control" value="<?= $data['harga_produk']; ?>">

                <label>Stok Produk</label>
                <input type="text" name="stok_produk" class="form-control" value="<?= $data['stok_produk']; ?>">

                <label>Foto Produk</label>
                <input type="file" name="foto_produk" class="form-control" value="<?= $data['foto_produk']; ?>">

                <label>Deskripsi Produk</label>
                <textarea name="deskripsi_produk" rows="10" class="form-control"><?= $data["deskripsi_produk"]; ?></textarea>
                <hr>
                <button type="submit" name="submit">Edit Produk</button>
            </form>
        </div><br>
    </div>