<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

    <div class="navbar">
        <div class="nav-logo">
            <a href="index.php" class="ucupstore">Store Laptop</a>
        </div>
        <div class="nav-links">
            <ul>
                <li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>
                    <a href="riwayat.php">Riwayat Transaksi</a>
                </li>
                <li>
                    <a href="cart.php">Keranjang</a>
                </li>
                <?php if(isset($_SESSION["username"])): ?>
                    <li>
                    <a href="logout.php" class="logout-btn">Logout</a>
                    </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION["username"])) : ?>
                    <li class="nav-active"><a href="login/index.php">Masuk</a></li>
                    <li class="nav-active"><a href="register/index.php">Daftar</a></li>
            </ul>
        <?php endif; ?>
        </div>
    </div>
</body>

</html>