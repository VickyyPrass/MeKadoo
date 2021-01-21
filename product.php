<?php 
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/img/logo/MeKadooLogoMain.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/framework/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/framework/fontawesome/css/all.css">

    <!-- My Template CSS -->
    <link rel="stylesheet" href="asset/css/template.css">
    <link rel="stylesheet" href="asset/css/main.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Produk | MeKadoo</title>
    
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="container">
            <div class="box-menu-product">
                <div class="box-menu-product-content">
                    <!-- box-menu-product-content -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-Gambar-Digital-tab" data-toggle="pill" href="#pills-Gambar-Digital" role="tab" aria-controls="pills-Gambar-Digital" aria-selected="true">Gambar Digital</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-Parcel-Mahar-tab" data-toggle="pill" href="#pills-Parcel-Mahar" role="tab" aria-controls="pills-Parcel-Mahar" aria-selected="false">Parcel & Mahar</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-Scrapframe3D-tab" data-toggle="pill" href="#pills-Scrapframe3D" role="tab" aria-controls="pills-Scrapframe3D" aria-selected="false">Scrapframe 3D</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-Gambar-Digital" role="tabpanel" aria-labelledby="pills-Gambar-Digital-tab">
                            <!-- Product Item 1 -->
                            <div class="row">
                                <?php 
                                $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang 
                                WHERE kategori_barang LIKE '%gambar digital%'");
                                ?>
                                <?php while($data = mysqli_fetch_assoc($sql)){ ?>
                                <div class="col-md-4 productItem mb-4 mt-3">
                                    <div class="productImage">
                                        <img src="../foto_produk/<?php echo $data['gambar']; ?>" class="img-thumbnail" />
                                    </div>

                                    <div class="productDetails d-flex flex-row justify-content-between mt-2">
                                        <div class="productTitle">
                                                <p>                                
                                                    <?php echo $data['nama_barang']; ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Rp. <?php echo number_format($data['harga']); ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Ukuran : <?php echo $data['ukuran']; ?>
                                                </p>
                                        </div>

                                        <div class="productAction">
                                            <a href="add_wishlist.php?id=<?php echo $data['id_barang']; ?>">
                                                <i class="fas fa-heart" title="Tambahkan ke Favorit"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="productView mt-n2">
                                        <a href="buy_product.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary">
                                            Beli Produk
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- End Product Item 1 -->
                        </div>

                        <div class="tab-pane fade" id="pills-Parcel-Mahar" role="tabpanel" aria-labelledby="pills-Parcel-Mahar-tab">
                            <!-- Product Item 2 -->
                            <div class="row">
                                <?php 
                                $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang 
                                WHERE kategori_barang LIKE '%mahar%'");
                                ?>
                                <?php while($data = mysqli_fetch_assoc($sql)){ ?>
                                <div class="col-md-4 productItem mb-4 mt-3">
                                    <div class="productImage">
                                        <img src="../foto_produk/<?php echo $data['gambar']; ?>" class="img-thumbnail" />
                                    </div>

                                    <div class="productDetails d-flex flex-row justify-content-between mt-2">
                                        <div class="productTitle">
                                                <p>                                
                                                    <?php echo $data['nama_barang']; ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Rp. <?php echo number_format($data['harga']); ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Ukuran : <?php echo $data['ukuran']; ?>
                                                </p>
                                        </div>

                                        <div class="productAction">
                                            <a href="add_wishlist.php?id=<?php echo $data['id_barang']; ?>">
                                                <i class="fas fa-heart" title="Tambahkan ke Favorit"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="productView mt-n2">
                                        <a href="buy_product.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary">
                                            Beli Produk
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <!-- End Product Item 2 -->
                        </div>

                        <div class="tab-pane fade" id="pills-Scrapframe3D" role="tabpanel" aria-labelledby="pills-Scrapframe3D-tab">
                            <!-- Product Item 3 -->
                            <div class="row">
                                <?php 
                                $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang 
                                WHERE kategori_barang LIKE '%scrapframe 3D%'");
                                ?>
                                <?php while($data = mysqli_fetch_assoc($sql)){ ?>
                                <div class="col-md-4 productItem mb-4 mt-3">
                                    <div class="productImage">
                                        <img src="../foto_produk/<?php echo $data['gambar']; ?>" class="img-thumbnail" />
                                    </div>

                                    <div class="productDetails d-flex flex-row justify-content-between mt-2">
                                        <div class="productTitle">
                                                <p>                                
                                                    <?php echo $data['nama_barang']; ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Rp. <?php echo number_format($data['harga']); ?>
                                                </p>
                                                <p class="mt-n3">
                                                    Ukuran : <?php echo $data['ukuran']; ?>
                                                </p>
                                        </div>

                                        <div class="productAction">
                                            <a href="add_wishlist.php?id=<?php echo $data['id_barang']; ?>">
                                                <i class="fas fa-heart" title="Tambahkan ke Favorit"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="productView mt-n2">
                                        <a href="buy_product.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary">
                                            Beli Produk
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- End Product Item 3 -->
                        </div>
                    </div>
                    <!-- End box-menu-product-content -->
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
</body>

</html>