<?php include 'layout/navbar.php'; ?>

<?php

if (empty($_SESSION["cart"] )) {
    echo "<script>alert('keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<!-- Style -->
<style>
    .container {
        margin-top: 50px;
        margin-left: 50px;
    }

    .card-cart {
        padding: 10px;
        width: 30%;
        border-radius: 10px;
        margin-bottom: 10px;
        background-color: #A9D400;
    }

    .card-cart img {
        width: 50%;
    }

    .card-cart .text-card a.cart-delete{
        background: #FF1818;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .card-cart .text-card a.cart-delete:hover{
        background: rgb(216, 0, 0);
        color: #fff;
        transition: 0.3s;
    }
    
    .card-cart .text-card a.checkout{
        background: #7137C9;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .card-cart .text-card a.checkout:hover{
        background: #6021be;
        color: #fff;
        transition: 0.3s;
    }

</style>

<!-- HTML -->
<div class="container">
    <?php foreach ($_SESSION["cart"] as $id_produk => $hasil) : ?>
        <?php
        $data = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];
        $subtotalHarga = $hasil * $data["harga_produk"];
        ?>

        <div class="card-cart">
            <div class="child-cart">
                <img src="foto/<?php echo $data["foto_produk"]; ?>" alt="">
            </div>
            <div class="text-card">
                <h3>Nama Produk : <?= $data['nama_produk']; ?></h3>
                <h3>Harga Satuan : Rp <?= number_format($data["harga_produk"]); ?></h3>
                <h3 style="margin-top: 10px">Total Harga : Rp <?= number_format($subtotalHarga); ?></h3>
                <h3 style="margin-top: 10px; margin-bottom: 20px;"><?php echo $_SESSION['name']; ?></h3>

                <a href="cart-delete.php?id=<?= $data["id_produk"]; ?>" class="cart-delete">Hapus</a>
            </div><br><hr>
        </div>
        <button><a href="checkout.php" class="checkout">Checkout Produk</a></button>
    <?php endforeach; ?>
</div>