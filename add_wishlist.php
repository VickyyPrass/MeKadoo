<?php 

session_start();
// mendapatkan id produk sesuai yang di pilih
$id_barang = $_GET['id'];

if(isset($_SESSION['favorit'][$id_barang])){
    // jika ada produk di favorit 
    echo '<div class="alert alert-info mt-4 mb-n4">
    Anda belum belanja barang apapun.
    </div>';  

}else{
    // jika tidak ada produk di tambahkan
    $_SESSION['favorit'][$id_barang]=1;

}
echo "<script>alert('Produk telah disimpan ke favorit');</script>";
echo "<script>location='wishlist.php';</script>";
?>