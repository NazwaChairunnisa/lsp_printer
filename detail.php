<?php include 'layout/navbar.php'; ?>
<?php
$id = $_GET["id"];
$data = query("SELECT * FROM produk WHERE id_produk = $id")[0];
?>

<div class="container">
    <div class="text-produk">
        <h2>Produk Terbaru</h2>
    </div>

    <div class="wrapper-detail-produk">
        <div class="item">
            <img src="foto/<?=$data["foto_produk"]; ?>">
        </div>
        <form action="" method="post">
            <div class="detail-produk">
                <h4 class="nama-produk">Nama Produk:&nbsp;<?= $data["nama_produk"];?></h4>
                <p class="harga_produk">Harga: Rp. <?= number_format($data["harga_produk"]) ;?>,-</p>
                <p class="deskripsi_produk">Deskripsi:&nbsp;<?=$data["deskripsi_produk"];?></p>
                <p class="stok_produk">Stok &nbsp;<?=$data["stok_produk"];?></p>
                <label>Jumlah</label>
                <input type="number" name="qty" value="1">

                <button type="submit" name="beli">Beli</button>
            </div>
        </form>
    </div>
</div>

<?php
    if (isset($_POST["beli"])) {
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;

        echo '
        <script type="text/javascript">
        alert("Produk telah ditambahkan ke dalam keranjang")</script>';

        echo '
        <script type="text/javascript">
            location = "cart.php";
        </script>';
    }
?>