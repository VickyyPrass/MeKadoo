<?php 
session_start();
include "koneksi.php";

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

    <title>Favorit | MeKadoo</title>
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="bg-image text-white d-flex flex-column justify-content-center align-items-center">
            <h2>Produk Favorit</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product.php">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Favorit</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <table class="table table-bordered table-hover text-center mt-5 mb-5 table-responsive-md">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>

                    <?php 
                    if(!isset($_SESSION['favorit'])){
                        echo '<div class="alert alert-info mt-4 mb-n4">
                        Anda belum mempunyai barang favorit apapun.
                        </div>';  
                    }else{
                        foreach($_SESSION['favorit'] as $id_barang => $jumlah): ?>
                        <!-- menampilkan produk berdasarkan id -->
                        <?php 
                        
                        $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang WHERE id_barang = '$id_barang'");
                        $data = mysqli_fetch_assoc($sql);
                        ?>
                    
                    <tr>
                        <th scope="row "><?php echo $no; ?></th>
                        <td>
                            <?php echo $data['nama_barang']; ?>
                        </td>

                        <td>
                            <img src="../foto_produk/<?php echo $data['gambar']; ?>" class="img-thumbnail" width="100" />
                        </td>

                        <td>
                            Rp.<?php echo number_format($data['harga']) ; ?>
                        </td>

                        <td>
                            <a href="delete_favorite.php?id=<?php echo $id_barang; ?>" class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i> Hapus
                            </a>

                            <a href="buy_product.php?id=<?php echo $id_barang; ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah ke keranjang
                            </a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                        <?php endforeach ?>
                    <?php } ?>
                </tbody>
            </table>

            <a href="product.php" class="btn btn-primary">Lanjutkan Belanja</a>
        </div>
    </main>

    <?php 
    require_once "nav/footer.php";
    ?>

    <div class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="asset/framework/jquery/jquery-3.5.1.min.js "></script>
    <script src="asset/framework/bootstrap/js/bootstrap.js "></script>
    <!-- Personal Javascript -->
    <script src="asset/js/main.js "></script>
</body>

</html>