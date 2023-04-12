<?php 
session_start();
require 'koneksi.php';

function query($query){
    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function checkoutProduk($data){
    global $conn;
    foreach($_SESSION['cart'] as $produk_id => $result):
        $barang = query("SELECT * FROM produk WHERE id_produk = '$produk_id'")[0];
        $totalHarga = $result * $barang["harga_produk"];
        $name = $_SESSION['name'];
        $alamat = $data['alamat'];
        $no_hp = $data['no_hp'];
        $nama_produk = $barang['nama_produk'];
        $harga = $barang['harga_produk'];
        $price = $totalHarga;
        $foto = $barang['foto_produk'];
        $id = $barang['id_produk'];
        $stok = $barang['stok_produk'];
        $sisa = $stok - $result;
        $st = 'proses';
        
        if ($sisa <= 0) {
            // hapus produk jika stok habis
            $hapusProduk = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");
            unset($_SESSION['cart'][$produk_id]);
            continue;
        }
        
        $queryCheckout = "INSERT INTO transaksi VALUES(NULL, '$name', '$alamat', '$no_hp', '$nama_produk','$harga','$price','$foto','$st')";
        mysqli_query($conn, $queryCheckout);
        if ($queryCheckout) {
            $updateStok = mysqli_query($conn, "UPDATE produk SET stok_produk = '$sisa' WHERE id_produk = '$id'");
        }
    endforeach; 
    unset($_SESSION['cart']);
    return mysqli_affected_rows($conn);
}
