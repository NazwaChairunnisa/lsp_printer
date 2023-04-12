<?php 
session_start();
$id = $_GET['id'];
unset($_SESSION["cart"][$id]);
echo "<script type='text/javascript'>
alert('Berhasil di Hapus');
window.location = 'cart.php';
</script>";

if(isset($_SESSION["cart"]) <0){
    echo "
    <script>
        alert('Keranjang Anda kosong!);
        window.location = 'index.php';
    </script>";
}