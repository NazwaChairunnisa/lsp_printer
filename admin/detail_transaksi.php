<?php
session_start();
if (!isset($_SESSION["username"])) {
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";
}

require 'function.php';
$id = $_GET['id'];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = '$id'")[0];

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
        <h2 class="judul">Data Transaksi</h2>
        <hr>
        <div class="detail-transaksi">
            <div class="foto">
                <img src="../foto/<?= $transaksi['foto_produk']; ?>">
            </div>
            <div class="transaksi">
                <h3>Nama Pembeli: <?= $transaksi["name"]; ?></h3>
                <h3>Alamat: <?= $transaksi["alamat"]; ?></h3>
                <h3>Nomor Handphone: <?= $transaksi["no_hp"]; ?></h3>
                <h3>Nama Produk: <?= $transaksi["nama_produk"]; ?></h3>
                <h3>Harga: <?= number_format($transaksi["harga_produk"]); ?></h3>
                <h3>SubTotal: <?= number_format($transaksi["subtotal"]); ?></h3>
                <h3>Status: <?= $transaksi["status"]; ?></h3>
                <?php
                if ($transaksi["status"] == "proses") { ?>
                    <div class="aksi">
                        <a href="verif.php?id=<?= $transaksi["id_transaksi"] ?>" class="verif">Verifikasi Transaksi</a>

                        <a href="reject.php?id=<?= $transaksi["id_transaksi"] ?>" class="reject">Reject</a>
                    </div> 
                    <?php
                        } elseif ($transaksi["status"] == "dikirim") {
                            ?>
                    <button class="btn1">Produk telah dikirim</button>
                    <?php
                        } elseif ($transaksi["status"] == "ditolak") {
                            ?>
                    <button class="btn1">Produk ditolak</button>
                <?php
                        }
                ?>
            </div>
        </div><hr>
    </div>
</body>

</html>