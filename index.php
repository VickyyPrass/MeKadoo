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

    <title>MeKadoo Official E-Commerce Indonesia | Hadiah dan Lainnya</title>
    
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <div class="banner">
        <div class="bg-slide">
            <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="product.php">
                            <img src="asset/img/banner/banner1.png" class="d-block" alt="Produk MeKadoo">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php">
                            <img src="asset/img/banner/banner2.png" class="d-block" alt="Produk MeKadoo">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php">
                            <img src="asset/img/banner/banner3.png" class="d-block" alt="Produk MeKadoo">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php">
                            <img src="asset/img/banner/banner4.png" class="d-block" alt="Produk MeKadoo">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product.php">
                            <img src="asset/img/banner/banner5.png" class="d-block" alt="Produk MeKadoo">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


    <section class="some-category">
        <div class="contain-some-category pt-5 pb-5">
            <div class="container">
                <h4 class="text-dark pb-2">Produk Popular</h4>
                <!-- Product Popular -->
                <div class="row m-auto">

                    <?php 
                    $sql = mysqli_query($mysqli_connect,"SELECT * FROM barang LIMIT 0,3");
                    ?>
                    <?php while($data = mysqli_fetch_assoc($sql)){ ?>
                    <div class="col-md-4 productItem">
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
                <!-- End Product Popular -->

                

                <h4 class="text-dark pt-5 pb-2">Produk Terbaru</h4>
                <!-- New Product -->
                <div class="row m-auto">

                    <?php 
                    $sql2 = mysqli_query($mysqli_connect,"SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3");
                    ?>

                    <?php while($data2 = mysqli_fetch_assoc($sql2)){ ?>
                    <div class="col-md-4 productItem">
                        <div class="productImage">
                            <img src="../foto_produk/<?php echo $data2['gambar']; ?>" class="img-thumbnail" />
                        </div>

                        <div class="productDetails d-flex flex-row justify-content-between mt-2">
                            <div class="productTitle">
                                <p>                                
                                    <?php echo $data2['nama_barang']; ?>
                                </p>
                                <p class="mt-n3">
                                    Rp. <?php echo number_format($data2['harga']); ?>
                                </p>
                                <p class="mt-n3">
                                    Ukuran : <?php echo $data2['ukuran']; ?>
                                </p>
                            </div>
                            
                            <div class="productAction">
                                <a href="add_wishlist.php?id=<?php echo $data2['id_barang']; ?>">
                                    <i class="fas fa-heart" title="Tambahkan ke Favorit"></i>
                                </a>
                            </div>
                            
                        </div>

                        <div class="productView mt-n2">
                            <a href="buy_product.php?id=<?php echo $data2['id_barang']; ?>" class="btn btn-primary">
                                Beli Produk
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- End New Product -->

                <button type="button" class="btn-product mt-5">
                    <a href="product.php" class="nav-link load-product text-white">
                        Lihat Lebih Banyak Lagi
                        <span><i class="fas fa-long-arrow-alt-right"></i></span>
                    </a>
                </button>

            </div>
        </div>
    </section>


    <section class="info">
        <div class="container info-contain p-4">
            <div class="row">
                <div class="col-lg-7 info-text text-white text-left">
                    <h5>DAFTAR UNTUK MENDAPATKAN INFO MENARIK LAINNYA</h5>
                </div>
                <div class="col-lg-5 info-input">
                    <input class="form-control w-100" type="text" placeholder="Masukkan Email">
                    <button class="btn-subscribe mt-2 w-100" type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>


    <section class="description">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-6">
                    <h6>MeKadoo</h6>
                    <p class="text-justify">
                        MeeKado usaha mikro kecil dan menengah yang bergerak dibidang jasa dan kerajinan tangan. MeeKado hadir untuk memenuhi kebutuhan konsumen yang kebingungan untuk mencari kado bagi terdekat ataupun orang spesial, sesuai dengan moto dari MeeKado yaitu kadoku
                        kado kita semua. Nilai tambah dari produk ini yaitu desainnya yang unik, inovatif dan limited edition atau bahasa kerennya anti mainstream. Desain yang sangat variatif membuat konsumen bisa lebih leluasa untuk memilih kado yang
                        sesuai dengan keinginan.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6>Inovasi dan Kreativitas</h6>
                    <p class="text-justify">
                        Mau kado anda berkesan? Kamu bisa request design custom loh.. Tersedia berbagai produk yang menarik dan yang pasti gak pasaran. Varian produk yang beragam mulai dari Scrapframe, Snack Bouquet, Snack Cake, Lukisan digital. Kamu juga bisa request tema atau
                        gambar favoritmu. Soal harga nyaman dikantong banget deh..
                    </p>
                    <p>
                        Tuangkan imajinasimu di MeeKado kemudian kami akan mewujudkannya menjadi sesuatu yang menakjubkan.
                    </p>
                </div>
            </div><br>
            <h6 class="text-center">Ayo support produk Indonesia dengan beli produk lokal. </h5>
        </div>
    </section>


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