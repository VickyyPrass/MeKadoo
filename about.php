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
    <title>Tentang Kami | MeKadoo</title>
</head>

<body>
    <?php 
    require_once "nav/header.php";
    ?>

    <main>
        <div class="bg-image text-white d-flex flex-column justify-content-center align-items-center">
            <h2>Tentang Kami</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <div class="box-about mt-5 mb-5">
                <h5>Apa itu Mekadoo</h5>
                <p class="text-justify">
                    MeeKado usaha mikro kecil dan menengah yang bergerak dibidang jasa dan kerajinan tangan. MeeKado hadir untuk memenuhi kebutuhan konsumen yang kebingungan untuk mencari kado bagi terdekat ataupun orang spesial, sesuai dengan moto dari MeeKado yaitu kadoku
                    kado kita semua. Nilai tambah dari produk ini yaitu desainnya yang unik, inovatif dan limited edition atau bahasa kerennya anti mainstream. Desain yang sangat variatif membuat konsumen bisa lebih leluasa untuk memilih kado yang sesuai
                    dengan keinginan.
                </p>

                <h5>Inovasi dan Kreativitas</h5>
                <p class="text-justify">
                    Mau kado anda berkesan? Kamu bisa request design custom loh.. Tersedia berbagai produk yang menarik dan yang pasti gak pasaran. Varian produk yang beragam mulai dari Scrapframe, Snack Bouquet, Snack Cake, Lukisan digital. Kamu juga bisa request tema atau
                    gambar favoritmu. Soal harga nyaman dikantong banget deh..
                </p>
                <br>
                <p class="text-center">
                    Tuangkan imajinasimu di MeeKado kemudian kami akan mewujudkannya menjadi sesuatu yang menakjubkan.
                </p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container p-4">
            <div class="row footer-contain">
                <div class="col-md-3">
                    <h6><strong>Kategori</strong></h6>
                    <ul class="nav flex-column mx-n3">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="product.php">Gambar Digital</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="product.php">Parcel dan Mahar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="product.php">Scrapframe 3D</a>
                        </li>
                    </ul><br>
                </div>
                <div class="col-md-3">
                    <h6><strong>Bantuan</strong></h6>
                    <ul class="nav flex-column mx-n3">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="#">Lihat Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Pengembalian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Pengiriman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">FAQs</a>
                        </li>
                    </ul>
                    <br>
                </div>
                <div class="col-md-3">
                    <h6><strong>Kontak Kami</strong></h6>
                    <p class="mt-3">Yogyakarta, Indonesia</p>
                    <p>
                        <i class="fab fa-whatsapp"> +62 8123 4567 890</i>
                    </p>
                    <p>
                        <i class="far fa-envelope"></i> Mekadoo.Official@gmail.com
                    </p>
                </div>
                <div class="col-md-3">
                    <h6><strong>Ikuti Kami di :</strong></h6>
                    <ul class="nav flex-row mx-n3">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="https://www.instagram.com/">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="https://id-id.facebook.com/">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="https://twitter.com/login?lang=id">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row copyright">
                <div class="col-md-12 d-flex flex-row justify-content-center">
                    <img src="asset/img/logo/MeKadoo.png" alt="">
                    <div class="text-copyrightv d-flex flex-column justify-content-center ml-3">
                        <p class="mt-3">Copyright&copy; 2020 MeKadoo | All right reserved.</p>
                        <!-- <p class="text-center"></p> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="asset/framework/jquery/jquery-3.5.1.min.js"></script>
    <script src="asset/framework/bootstrap/js/bootstrap.js"></script>
    <!-- Personal Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>