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
if($_SESSION['roles'] !="Admin"){
    echo "
    <script type='text/javascript'>
        alert('anda bukan admin')
        window.location = '../login/index.php';
    </script>";
}

$produk = query("SELECT * FROM produk");

if(isset($_POST["submit"])){
    if (tambahProduk($_POST) > 0) {
        echo "<script type='text/javascript'>
        alert('Data Berhasil di Tambahkan!');
        window.location = 'product.php';</script>";
    }else {
        echo "<script type='text/javascript'>
        alert('Data Gagal di Tambahkan!');
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
    <h2>Tambah Produk</h2>
    <div class="box">
        <form method="post" enctype="multipart/form-data">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">

            <label>Harga Produk</label>
            <input type="text" name="harga_produk" class="form-control">

            <label>Stok Produk</label>
            <input type="text" name="stok_produk" class="form-control">

            <label>Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control">

            <label>Deskripsi Produk</label>
            <textarea name="deskripsi_produk" rows="10" class="form-control"></textarea><hr>
            <button type="submit" name="submit">Tambah Produk</button>
        </form>
    </div><br>
</div>