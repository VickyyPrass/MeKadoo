<?php 
include "koneksi.php";
$keyword = $_GET["search_keyword"];

$data = array();
$sql = mysqli_query($mysqli_connect,"SELECT * FROM barang 
WHERE kategori_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' ");
while($hasil = mysqli_fetch_assoc($sql)){
    $data[] = $hasil; 
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
    <title>Pencarian Produk | MeKadoo</title>
</head>
<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="container mt-5 mb-5">
            <h3>Hasil Pencarian : <?php echo $keyword; ?></h3>

            <?php if(empty($data)){ ?>
                <div class="alert alert-danger">Produk <strong><?php echo $keyword; ?></strong> tidak ditemukan</div>
            <?php } ?>

            <div class="row">
                <?php foreach($data as $key => $value){ ?>
                    <div class="col-md-4 productItem">
                        <div class="productImage">
                            <img src="../foto_produk/<?php echo $value['gambar']; ?>" class="img-thumbnail" />
                        </div>

                        <div class="productDetails d-flex flex-row justify-content-between mt-2">
                            <div class="productTitle">
                                    <p>                                
                                        <?php echo $value['nama_barang']; ?>
                                    </p>
                                    <p class="mt-n3">
                                        Rp. <?php echo number_format($value['harga']); ?>
                                    </p>
                                    <p class="mt-n3">
                                        Ukuran : <?php echo $value['ukuran']; ?>
                                    </p>
                            </div>

                            <div class="productAction">
                                <a href="add_wishlist.php?id=<?php echo $value['id_barang']; ?>">
                                    <i class="fas fa-heart" title="Tambahkan ke Favorit"></i>
                                </a>
                            </div>
                        </div>

                        <div class="productView mt-n2">
                            <a href="buy_product.php?id=<?php echo $value['id_barang']; ?>" class="btn btn-primary">
                                Beli Produk
                            </a>
                        </div>
                    </div>
                <?php } ?>
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