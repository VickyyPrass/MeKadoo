<?php 
session_start();
include "koneksi.php";

$id_pembelian = $_GET['id'];
$sql = mysqli_query($mysqli_connect,"SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$data=mysqli_fetch_assoc($sql);

if(empty($data)){
    echo "<script>alert('Tidak ada data pembayaran!');</script>";
    echo "<script>location='account.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">

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
    <title>Data Pembayaran | Mekadoo</title>
</head>
<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="container mt-5 mb-5">
            <h3>Lihat Data Pembayaran</h3>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $data['nama']; ?></td>
                        </tr>

                        <tr>
                            <th>Bank</th>
                            <td><?php echo $data['bank']; ?></td>
                        </tr>

                        <tr>
                            <th>Jumlah</th>
                            <td>Rp. <?php echo number_format($data['total_pembayaran']); ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal</th>
                            <td><?php echo $data['tgl_pembayaran']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="../bukti_bayar/<?php echo $data['bukti_bayar']; ?>" class="img-thumbnail" alt="<?php echo $data['bukti_bayar']; ?>">
                </div>
            </div>
        </div>
    </main>

    <?php 
    require_once "nav/footer.php";
    ?>
</body>
</html>