<?php 
session_start();
include "koneksi.php";
if(!isset($_SESSION['user'])){
    echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
    echo "<script>location='login.php';</script>";
}

$sql = mysqli_query($mysqli_connect,"SELECT pembeli.id_pembeli,pembelian.id_pembelian,
pembeli.nama_pembeli,pembeli.alamat,pembeli.kode_pos,pembeli.no_telp,pembelian.total_bayar,pembelian.tgl_pembelian,barang.nama_barang,barang.ukuran,barang.gambar,barang.harga,detail_pembelian.kuantitas,opsi_pengiriman.nama_jasa
FROM pembelian
INNER JOIN detail_pembelian ON pembelian.id_pembelian=detail_pembelian.id_pembelian
INNER JOIN pembeli ON pembelian.id_pembeli=pembeli.id_pembeli
INNER JOIN barang ON detail_pembelian.id_barang=barang.id_barang
INNER JOIN opsi_pengiriman ON pembelian.id_opsi_pengiriman=opsi_pengiriman.id_opsi_pengiriman
WHERE pembelian.id_pembelian='$_GET[id]'");
$data = mysqli_fetch_assoc($sql);

$id_pembelian = $data['id_pembelian'];
$id_pembeli = $data['id_pembeli'];

if($id_pembeli !== $id_pembelian){
    echo "<script>alert('Data ini tidak ada dalam pembelian anda!');</script>";
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
    <title>Nota Pembelian | MeKadoo</title>
</head>
<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="container">
            <div class="title d-flex justify-content-between mt-4">
                <p class="pt-4">Tanggal : <?php echo $data['tgl_pembelian']; ?> </p>
                <img src="asset/img/logo/MeKadoo.png"  class="logo" alt="" width="180">
                <p></p>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <form role="form">
                        <div class="form-group">
                            <label for="namaPembeli">Nama Pembeli</label>
                            <input type="text" class="form-control" id="namaPembeli" name="namaPembeli" value="<?php echo $data['nama_pembeli']; ?>" disabled />
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" disabled />
                        </div>

                        <div class="form-group">
                            <label for="kodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" name="kodePos" value="<?php echo $data['kode_pos']; ?>" disabled />
                        </div>

                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $data['no_telp']; ?>" disabled />
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <h3><?php echo $data['nama_barang']; ?></h3>
                    <img src="../foto_produk/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_barang']; ?>" width="200">
                    <p class="pt-2 ml-4">Ukuran : <?php echo $data['ukuran']; ?></p>
                    <p class="pt-2">Jumlah : <?php echo $data['kuantitas']; ?></p>
                </div>
            </div>

            <div class="alert alert-info">
                <p class="text-center mb-n1">
                    Silahkan lakukan pembayaran Rp. <?php echo number_format($data['total_bayar']); ?> ke <br>
                    <strong>BANK BRI 137-642683-4783 AN. Vicky Galih Prasetyawan</strong>
                </p>
            </div>
        </div>                                  
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