<?php 

session_start();
// mendapatkan id produk sesuai yang di pilih
$id_barang = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_barang])){
    // jika ada produk di keranjang, maka produk +1 
    $_SESSION['keranjang'][$id_barang]+=1;

}else{
    // jika tidak ada produk dianggap 1
    $_SESSION['keranjang'][$id_barang]=1;

}
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='cart.php';</script>";
?>