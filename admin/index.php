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
        <h2 class="judul">Selamat Datang, <?= $_SESSION['name']; ?></h2><hr>
        <p>Anda Login sebagai <?= $_SESSION['roles']; ?></p>
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total Produk
                        </div>
                        <div class="card-body">
                            <?php 
                            
                            include '../koneksi.php';
    
                            $query = "SELECT count(*) as total FROM produk";
                            $result = mysqli_query($conn, $query);
                            $hasil = mysqli_fetch_assoc($result);
    
                            echo $hasil['total'];
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total Transaksi
                        </div>
                        <div class="card-body">
                        <?php 
                            
                            include '../koneksi.php';
    
                            $query = "SELECT count(*) as total FROM transaksi";
                            $result = mysqli_query($conn, $query);
                            $hasil = mysqli_fetch_assoc($result);
    
                            echo $hasil['total'];
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total User
                        </div>
                        <div class="card-body">
                        <?php 
                            
                            include '../koneksi.php';
    
                            $query = "SELECT count(*) as total FROM user";
                            $result = mysqli_query($conn, $query);
                            $hasil = mysqli_fetch_assoc($result);
    
                            echo $hasil['total'];
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>     
    </div>
</body>
</html>