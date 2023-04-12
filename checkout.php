<?php include'layout/navbar.php'; ?>

<?php

    if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
        echo "<script>alert('keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
        echo "<script>location='index.php';</script>";
    }

?>
<link rel="stylesheet" href="style/in.css">
<div class="container">
    <div class="card-checkout" style="margin-top: 50px;">
        <form action="" method="post">
            <!-- Nama User -->
            <label>Nama Penerima</label>
            <input type="text" name="name" class="form-control" value="<?=$_SESSION['name']; ?>">
            
            <!-- Alamat -->
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat">
            
            <!-- Nomor Telepon -->
            <label>Nomor Telepon</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp">
            
            <!-- Tombol Submit -->
            <button type="submit" name="checkout" class="btn-checkout">Kirim</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['checkout'])){
    if(checkoutProduk($_POST) > 0){
        echo "
        <script>
        alert('Pembelian Berhasil!');
        location='index.php';
        </script>
        ";
    }else{
        echo mysqli_error($dbconnect);
    }
}
?>