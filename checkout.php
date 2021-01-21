<?php 
session_start();
include "koneksi.php";
if(!isset($_SESSION['user'])){
    echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
    echo "<script>location='login.php';</script>";
}elseif(!isset($_SESSION['keranjang'])){
    echo "<script>alert('Tidak ada pembelian!');</script>";
    echo "<script>location='product.php';</script>";
}
?>

<!doctype html>
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

    <title>Kontak | MeKadoo</title>
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="bg-image text-white d-flex flex-column justify-content-center align-items-center">
            <h2>Checkout</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Troli</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="container mb-5">
            <table class="table table-bordered table-hover text-center mt-5 mb-5">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1; 
                    $totalBelanja=0; 
                    ?>

                    <?php 
                    if(!isset($_SESSION['keranjang'])){
                        echo "<script>alert('Produk kosong,Silahkan belanja terlebih dahulu!');</script>";
                        echo "<script>location='product.php';</script>";
                        
                    }else{
                        foreach($_SESSION['keranjang'] as $id_barang => $jumlah): ?>
                    
                        <!-- menampilkan produk berdasarkan id -->
                        <?php 
                        $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang WHERE id_barang = '$id_barang'");
                        $data = mysqli_fetch_assoc($sql);
                        $subTotal = $data['harga']*$jumlah;
                        ?>
                        <tr>
                            <th scope="row "><?php echo $no; ?></th>
                            <td>
                                <?php echo $data['nama_barang']; ?>
                            </td>

                            <td>
                                Rp. <?php echo number_format($data['harga']) ; ?>
                            </td>

                            <td>
                                <input type="text" name="" class="text-center" value="<?php echo $jumlah; ?>" style="width:30px;" disabled>
                            </td>

                            <td>
                                Rp.<?php echo number_format($subTotal); ?>
                            </td>

                        </tr>
                        <?php $no++; ?>
                        <?php $totalBelanja+=$subTotal; ?>
                        <?php endforeach ?>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalBelanja); ?></th>
                    </tr>
                </tfoot>
            </table>

            <div class="row">
                <div class="col-md-6">
                    <?php 
                    $username = $_SESSION['user'];
                    $sql = mysqli_query($mysqli_connect,"SELECT * FROM pembeli WHERE username = '$username'");
                    $row = mysqli_num_rows($sql);
                    $data = mysqli_fetch_assoc($sql);
                    ?>
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

                <div class="col-md-6">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaProduk">Upload Gambar</label>
                            <input type="file" class="form-control" name ="file" id="file" required>
                        </div>

                        <div class="form-group">
                            <label>Opsi Pengiriman</label>
                            <select class="form-control" name="opsiKirim" required>
                                <option value="">-Pilih Opsi Pengiriman dan Ongkos Kirim-</option>
                                <?php 
                                $sql = mysqli_query($mysqli_connect,"SELECT * FROM opsi_pengiriman");
                                while($data = mysqli_fetch_assoc($sql)){
                                ?>
                                <option value="<?php echo $data['id_opsi_pengiriman']; ?>"><?php echo $data['nama_jasa']; ?> - RP. <?php echo number_format($data['tarif_ongkir']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pembelian</label>
                            <textarea name="deskripsi" id="deskripsi" cols="74" rows="8" maxlength="100" autofocus required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
                    </form>
                    <?php 
                    
                    ?>
                    <?php 
                    $username = $_SESSION['user'];
                    $sql = mysqli_query($mysqli_connect,"SELECT * FROM pembeli WHERE username = '$username'");
                    $row = mysqli_num_rows($sql);
                    $data = mysqli_fetch_assoc($sql);

                    if(isset($_POST["checkout"])){
                        $id_pembeli = $data['id_pembeli'];
                        $opsi_kirim = $_POST['opsiKirim'];
                        $deskripsi = $_POST['deskripsi'];
                        $tgl_beli = date("Y-m-d");

                        // cari data tarif ongkir yang sesuai
                        $getIdKirim = mysqli_query($mysqli_connect,"SELECT * FROM opsi_pengiriman WHERE id_opsi_pengiriman = '$opsi_kirim'");
                        $dataKirim = mysqli_fetch_assoc($getIdKirim);
                        $tarif = $dataKirim['tarif_ongkir'];
                        $total_pembelian = $totalBelanja+$tarif;

                        // 1. simpan data ke tabel pembelian
                        $sql= mysqli_query($mysqli_connect,"INSERT INTO pembelian 
                        (id_pembeli,tgl_pembelian,id_opsi_pengiriman,total_bayar)
                        VALUES('$id_pembeli','$tgl_beli','$opsi_kirim','$total_pembelian')");

                        // ambil id pembelian yang terjadi
                        $id_pembelian = $mysqli_connect ->insert_id;

                        foreach($_SESSION["keranjang"] as $id_barang => $jumlah){
                            $foto= $_FILES['file']['name'];
                            $dataLokasiFoto = $_FILES['file']['tmp_name'];
                            move_uploaded_file($dataLokasiFoto,"../foto_produk/pesanan/".$foto);

                            $sql= mysqli_query($mysqli_connect,"INSERT INTO detail_pembelian 
                            (id_pembelian,id_barang,kuantitas,deskripsi,gambar)
                            VALUES('$id_pembelian','$id_barang','$jumlah','$deskripsi','$foto')");
                        }

                        // mengkosongkan keranjang belanja
                        unset($_SESSION["keranjang"]);

                        // alihkan ke nota
                        echo "<script>alert('Pembelian Berhasil, Silahkan lakukan pembayaran!');</script>";
                        echo "<script>location='account.php?id=$id_pembelian';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php 
    require_once "nav/footer.php";
    ?>

    <div class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="asset/framework/jquery/jquery-3.5.1.min.js"></script>
    <script src="asset/framework/bootstrap/js/bootstrap.js"></script>
    <!-- Personal Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>