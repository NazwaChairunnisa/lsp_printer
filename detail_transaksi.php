<?php include 'layout/navbar.php'; ?>

<?php
$id = $_GET['id'];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = '$id'")[0];
?>
<link rel="stylesheet" href="style/detail.css">
<div class="container">
    <div class="main">
        <h2 class="judul">Data Transaksi</h2>
        <hr>
        <div class="detail-transaksi">
            <tr>
                <div class="transaksi">
                    <?php
                    if ($transaksi["status"] == "proses") { ?>
                        <button class="proses">Pesanan kamu lagi di proses nih, di tunggu ya</button>
                    <?php
                    } elseif ($transaksi["status"] == "dikirim") { ?>
                        <button class="dikirim">Produkmu udah dikirim nih, di tunggu ya</button>
                    <?php
                    } elseif ($transaksi["status"] == "ditolak") { ?>
                        <button class="ditolak">Pesananmu di tolak, coba cek lagi pesanan kamu deh</button>
                    <?php
                    }
                    ?>
                    <h3>Nama Pembeli: <?= $transaksi["name"]; ?></h3>
                    <h3>Alamat: <?= $transaksi["alamat"]; ?></h3>
                    <h3>Nomor Handphone: <?= $transaksi["no_hp"]; ?></h3>
                    <h3>Nama Produk: <?= $transaksi["nama_produk"]; ?></h3>
                    <h3>Harga: <?= number_format($transaksi["harga_produk"]); ?></h3>
                    <h3>SubTotal: <?= number_format($transaksi["subtotal"]); ?></h3>
                    <h3>Status: <?= $transaksi["status"]; ?></h3>
                </div>
            </tr>
            <div class="foto-transaksi">
                <img src="foto/<?= $transaksi['foto_produk']; ?>" width="250px" class="foto-produk">
            </div>
        </div>
    </div>
</div>