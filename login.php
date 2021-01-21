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

    <title>Login & Register | MeKadoo</title>
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
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="box-account mt-5 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Login -->
                        <form action="auth/function/proses_login.php" method="POST">
                            <h2>Login</h2>
                            <hr>
                            <div class="form-group">
                                <label for="username_login">Username<sup>*</sup></label>
                                <input type="text" class="form-control" id="username_login" name="username_login" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password_login">Password<sup>*</sup></label>
                                <input type="password" class="form-control" id="password_login" name="password_login" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary mb-2">Login</button><br>
                            <a href="#" class="text-decoration-none">Lupa Password?</a>
                        </form>
                        <!-- End Login -->
                    </div>
                    <div class="col-md-6">
                        <!-- Register -->
                        <form action="auth/function/proses_daftar.php" method="POST">
                            <h2>Register</h2>
                            <hr>
                            <div class="form-group">
                                <label for="username_register">Username<sup>*</sup></label>
                                <input type="text" class="form-control" id="username_register" name="username_register" required>
                            </div>

                            <div class="form-group">
                                <label for="password_register">Password<sup>*</sup></label>
                                <input type="password" class="form-control" id="password_register" name="password_register" required>
                            </div><br>
                            
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </form>
                        <!-- End Register -->
                    </div>
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