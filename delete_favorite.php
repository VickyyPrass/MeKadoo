<?php 
session_start();
$id_barang = $_GET["id"];
unset($_SESSION["favorit"][$id_barang]);

echo "<script>location='wishlist.php';</script>";
?>