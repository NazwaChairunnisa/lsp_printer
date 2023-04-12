<?php
require 'function.php';

$id = $_GET['id'];

if(hapusProduk($id) > 0){
    echo "
        <script type='text/javascript'>
        alert('Data Berhasil di Hapus!')
        window.location= 'product.php'
        </script>
        ";
}else{
    echo "
        <script type='text/javascript'>
        alert('Yahh, Data Gagal di Hapus!')
        window.location= 'product.php'
        </script>
        ";
}