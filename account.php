<?php 
session_start();
include "koneksi.php";

if(!isset($_SESSION['user'])){
    header("location:login.php");
}
$username = $_SESSION['user'];

$sql = mysqli_query($mysqli_connect,"SELECT * FROM pembeli WHERE username = '$username' ");
$row = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

$sql1 = mysqli_query($mysqli_connect,"SELECT * FROM user WHERE username = '$username' ");
$data1 = mysqli_fetch_array($sql1);

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

    <title>Akun Saya | MeKadoo</title>
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="bg-image text-white d-flex flex-column justify-content-center align-items-center">
            <h2>Akun Saya</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active " aria-current="page">Akun Saya</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-5 mb-5">
            <!-- Box Account -->
            <div class="box-account">
                <h3>Selamat Datang,<?php echo $_SESSION['user']; ?>!</h3><br>
                <div class="row">
                    <!-- Menu -->
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Riwayat Belanja</a>
                            <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Akun Saya</a>
                        </div>
                    </div>
                    <!-- End Menu -->

                    <!-- Content Menu -->
                    <div class="col-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Orders -->
                            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                <h2>Riwayat Pesanan Saya</h2>
                                <hr>
                                <table class="table table-bordered table-responsive-md">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>No Resi</th>
                                            <th>Total</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php 
                                        $no=1;
                                        $id_pembeli = $data['id_pembeli'];
                                        $sql2 = mysqli_query($mysqli_connect,"SELECT * FROM pembelian WHERE id_pembeli = '$id_pembeli' ");
                                        
                                        while($data2 = mysqli_fetch_assoc($sql2)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <?php echo $data2['tgl_pembelian'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data2['status'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data2['resi'] ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo number_format($data2['total_bayar']); ?>
                                            </td>
                                            <td>
                                                <a href="nota.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-info">Nota</a>
                                                
                                                <?php if($data2['status'] == "Belum Bayar"){ ?>
                                                <a href="pembayaran.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
                                                <?php }else{ ?>
                                                    <a href="lihat_pembayaran.php?id=<?php echo $data2['id_pembelian'] ?>" class="btn btn-warning">Lihat Pembayaran</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Orders -->

                            <!-- Account -->
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                                <form action="auth/function/simpan_data.php" method="POST">
                                    <h2>Akun Saya</h2>
                                    <hr>
                                    <div class="form-group">
                                        <label for="namaLengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kodePos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kodePos" name="kodePos" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">No Telepon</label>
                                        <input type="tel" class="form-control" id="telepon" name="telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user']; ?>" disabled>
                                    </div>
                                    <button type="submit" name="simpan_data" class="btn btn-primary">Simpan</button>
                                    <button type="button" name="update_data" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateData">Ubah</button>
                                    <button type="button" name="update_data" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateAkun">Ubah Akun</button>
                                    <button type="reset" name="update_data" class="btn btn-primary">Batal</button>
                                </form>
                            </div>
                            <!-- End Account -->
                        </div>
                    </div>
                    <!-- End Content Menu -->

                    <!-- Modal Update Data -->
                    <div class="modal fade" id="modalUpdateData" tabindex="-1" aria-labelledby="ModalUpdateDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalUpdateDataLabel">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <!-- Modal Edit Data -->
                                <div class="modal-body">
                                    <form action="auth/function/edit_data.php" method="POST">
                                    <div class="form-group">
                                            <label for="namaPembeli">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="namaPembeli" name="namaPembeli" value="<?php echo $data['nama_pembeli'] ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamatPembeli" name="alamatPembeli" value="<?php echo $data['alamat'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="kodePos">Kode Pos</label>
                                            <input type="text" class="form-control" id="kodePosPembeli" name="kodePosPembeli" value="<?php echo $data['kode_pos'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="telepon">No Telepon</label>
                                            <input type="tel" class="form-control" id="teleponPembeli" name="teleponPembeli" value="<?php echo $data['no_telp'] ?>">
                                        </div>
                                        <button type="submit" name="update_pembeli" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit Data -->

                    <!-- Modal Update Akun -->
                    <div class="modal fade" id="modalUpdateAkun" tabindex="-1" aria-labelledby="ModalUpdateAkunLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalUpdateAkunLabel">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <p class="ml-auto mr-auto text-danger">Anda harus login kembali ketika selesai!</p>

                                <!-- Content Modal Edit Akun -->
                                <div class="modal-body">
                                    <form action="auth/function/edit_akun.php" method="POST">
                                        <div class="form-group">
                                            <label for="alamat">Username</label>
                                            <input type="text" class="form-control" id="usernameUser" name="usernameUser" value="<?php echo $data1['username'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Password</label>
                                            <input type="password" class="form-control" id="passwordUser" name="passwordUser" value="<?php echo $data1['password'] ?>">
                                        </div>
                                        <button type="submit" name="update_user" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                                <!-- Content Modal Edit Akun -->
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit Akun -->
                </div>
                <button type="button" class="btn-account-logout mt-5">
                    <a href="auth/function/logout.php" class="nav-link text-white"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </button>
            </div>
            <!-- End Box Account -->
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