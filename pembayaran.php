<?php 
session_start();
include "koneksi.php";
if(!isset($_SESSION['user'])){
    echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
    echo "<script>location='login.php';</script>";
}
$id_pembelian = $_GET['id'];

$sqlPembelian = mysqli_query($mysqli_connect,"SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian' ");
$dataPembelian = mysqli_fetch_array($sqlPembelian);

$username = $_SESSION['user'];
$sqlPembeli = mysqli_query($mysqli_connect,"SELECT * FROM pembeli WHERE username = '$username' ");
$dataPembeli = mysqli_fetch_array($sqlPembeli);

$id_pembeli = $dataPembeli['id_pembeli'];

if($id_pembeli !== $id_pembelian){
    echo "<script>alert('Data ini tidak ada dalam pembelian anda!');</script>";
    echo "<script>location='account.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/img/logo/MeKadooLogoMain.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/framework/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/framework/fontawesome/css/all.css">

    <!-- My  CSS -->
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="asset/css/template.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Pembayaran | MeKadoo</title>
</head>
<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="container mt-5 mb-5">
            <h2 class="text-center">Konfirmasi Pembayaran Anda disini!</h2>
            <div class="alert alert-info">
                <p class="text-center mb-n1">
                    Total Tagihan Anda Rp. <?php echo number_format($dataPembelian['total_bayar']); ?>
                </p>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="namaPengirim">Nama Pengirim</label>
                    <input type="text" class="form-control" id="namaPengirim" name="namaPengirim" required/>
                </div>

                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" id="bank" name="bank" required/>
                </div>

                <div class="form-group">
                    <label for="total_pembayaran">Total Pembayaran</label>
                    <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" required/>
                </div>

                <div class="form-group">
                    <label for="namaProduk">Foto Bukti Pembayaran</label>
                    <input type="file" class="form-control" name ="bukti_bayar" id="bukti_bayar" required>
                    <p class="text-danger">Foto bukti maksimal 2MB</p>
                </div>
                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
            </form>
        </div>

        <?php 
        if(isset($_POST["kirim"])){
            // upload foto bukti
            $namafoto = $_FILES["bukti_bayar"]["name"];
            $lokasifoto = $_FILES["bukti_bayar"]["tmp_name"];
            $namafotoakhir = date("d F Y_his").$namafoto;
            move_uploaded_file($lokasifoto,"../bukti_bayar/$namafotoakhir");

            $namaPengirim = $_POST["namaPengirim"];
            $bank = strtoupper($_POST["bank"]);
            $total_pembayaran = $_POST["total_pembayaran"];
            $tanggal = date("Y-m-d");

            // simpan pembayaran
            $sql = mysqli_query($mysqli_connect,"INSERT INTO pembayaran (id_pembelian,nama,bank,total_pembayaran,tgl_pembayaran,bukti_bayar)
            VALUES('$id_pembelian','$namaPengirim','$bank','$total_pembayaran','$tanggal','$namafotoakhir')");

            // update status pembelian
            $sql = mysqli_query($mysqli_connect,"UPDATE pembelian SET status = 'Dibayar'
            WHERE id_pembelian='$id_pembelian'");

            echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran!');</script>";
            echo "<script>location='account.php';</script>";
        }
        ?>
    </main>
    
    <?php 
    require_once "nav/footer.php";
    ?>

    <script src="asset/framework/jquery/jquery-3.5.1.min.js"></script>
    <script src="asset/framework/bootstrap/js/bootstrap.js"></script>
    <!-- Personal Javascript -->
    <script src="asset/js/main.js"></script>
</body>
</html>