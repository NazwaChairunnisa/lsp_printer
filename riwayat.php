<?php include 'layout/navbar.php'; ?>
<?php $data = query("SELECT * FROM transaksi WHERE name = '{$_SESSION['name']}'"); ?>
<?php if (!isset($_SESSION["username"])) :
    echo "<script>
        alert('Anda belum login, silahkan login dulu!');
        window.location = 'login/index.php';
        </script>";
endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Customer</title>
    <link rel="stylesheet" href="style/style2.css">
</head>

<body>
    <div class="container">
        <div class="informasi">
            <h2>Selamat Datang <?= $_SESSION["name"]; ?>, ini adalah halaman riwayat transaksi kamu</h2><br>
        </div>
        <div class="data-transaksi">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($data as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["name"]; ?></td>
                        <td><?= $data["nama_produk"]; ?></td>
                        <td><?= number_format($data["harga_produk"]); ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td><img src="foto/<?= $data['foto_produk']; ?>" width="100px" alt=""></td>
                        <td><?= $data["status"]; ?></td>
                        <td>
                            <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="detail">Detail →</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>