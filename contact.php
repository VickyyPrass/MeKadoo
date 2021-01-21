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
            <h2>Kontak</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="card-contact mt-5">
                <h4 class="text-center">Kami Siap Membantu Kalian...</h2>
                    <p class="text-center mb-4">Kirim pesan kalian kepada kami untuk membantu pengembangan website kami</p>
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="form-group">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="First name" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder="Last name">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control validate" id="inputEmail" placeholder="email@example.com" required>
                                    <small>We'll never share your email with anyone else.</small>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" placeholder="Ketikkan sesuatu..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>
                                Send Message</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <div class="box-contact">
                                <h2 class="text-left">MeKadoo</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi incidunt laboriosam quaerat sunt ut optio eveniet nihil nostrum velit saepe fuga dolorem odit ipsa iure, distinctio nulla est.
                                </p>

                                <p>
                                    <i class="fas fa-map-marker-alt text-primary"></i> &nbsp; Sleman, Yogyakarta, 55671
                                </p>

                                <p>
                                    <i class="far fa-envelope text-primary"></i> &nbsp;Mekadoo.Official@gmail.com
                                </p>

                                <p class="social-media">
                                    <a href="https://instagram.com/" target="_blank">
                                        <span class="box-social-media" title="">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                    </a>

                                    <a href="https://id-id.facebook.com/" target="_blank">
                                        <span class="box-social-media" title="">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                    </a>

                                    <a href="https://twitter.com/" target="_blank">
                                        <span class="box-social-media" title="">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="mapouter mt-5 mb-5">
                <div class="gmap_canvas"><iframe width="1080" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=lp3i%20yogyakarta&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">google maps html widget</a></div>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 600px;
                        width: 1080px;
                    }
                    
                    .gmap_canvas {
                        overflow: hidden;
                        background: none!important;
                        height: 600px;
                        width: 1080px;
                    }
                </style>
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