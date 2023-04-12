<?php include 'layout/navbar.php'; ?>
<?php
$data = query("SELECT * FROM produk");
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<link rel="stylesheet" href="style/index.css">
<div class="hero">
    <div class="hero-text">
        <?php if (isset($_SESSION["username"])) : ?>
            <h1 style="font-size:80px; font-family:'Tangerine', serif;">Hi <strong><?= $_SESSION["name"]; ?></strong></h1>
            <h4>- Store Laptop -</h4>
            <?php endif; ?>
        <?php if (!isset($_SESSION["username"])) : ?>
            <h1 style="font-size: 50px;">S t o r e - L a p t o p</h1>
            <h4>- Harap Login atau Daftar Terlebih Dahulu -</h4>
        </ul>
        <?php endif; ?>
    </div>
    <div class="banner-img">
        <img src="wallpaper/Asus ROG Strix Scar II.png" alt="">
    </div>
</div>

<div class="container">
    <div class="text-produk">
        <h2>Produk Tersedia</h2>
        <hr>
    </div>
    <div class="wrapper-produk">
        <?php foreach ($data as $produk) : ?>
            <div class="produk">
                <a href="detail.php?id=<?= $produk["id_produk"]; ?> ">
                    <img src="foto/<?= $produk["foto_produk"]; ?>"><br>
                    <h2><?= $produk["nama_produk"]; ?></h2><br>
                    <p>Barang Tersisa: <?= number_format($produk["stok_produk"]); ?></p>
                    <p>Rp. <?= number_format($produk["harga_produk"]); ?></p><br>
                    <a href="detail.php?id=<?= $produk["id_produk"]; ?>" class="btn btn-success"><i class="fa-solid fa-basket-shopping me-2"></i>Pesan Sekarang</a><br>
                    <a href="detail_barang.php">Detail</a>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "layout/footer.php"; ?>