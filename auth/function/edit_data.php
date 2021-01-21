<?php 
session_start();
if(isset($_POST["update_pembeli"])){
    $namaPembeli = $_POST['namaPembeli'];
    $alamatPembeli = $_POST['alamatPembeli'];
    $kodePosPembeli = $_POST['kodePosPembeli'];
    $teleponPembeli = $_POST['teleponPembeli'];
    $dataUser = $_SESSION['user'];
    include "../../koneksi.php";

    $query = mysqli_query($mysqli_connect,"UPDATE pembeli SET nama_pembeli='$namaPembeli', alamat='$alamatPembeli',   kode_pos='$kodePosPembeli', no_telp='$teleponPembeli' WHERE username= '$dataUser' ");

}else{
    echo "Data gagal dimasukkan!";
}
header("location:../../account.php");
?>