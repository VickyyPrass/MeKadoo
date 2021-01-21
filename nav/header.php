
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="content-top-bar d-flex flex-column flex-md-row justify-content-between">
                    <div class="left-top-bar">
                        <a class="nav-link text-white" href="product.php">BELI PRODUK BARU DISINI !</a>
                    </div>
                    <div class="right-top-bar d-flex flex-row justify-content-between">
                        <a class="nav-link text-white" href="#">
                            <i class="far fa-bell"></i>
                            <span>Notifikasi</span>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <i class="fas fa-question"></i>
                            <span>Bantuan</span>
                        </a>
                        <!-- jika sudah login -->
                        <?php if(isset($_SESSION['user'])) { ?>

                        <a class="nav-link text-white" href="account.php">
                        <i class="far fa-user"></i>
                        <span><?php echo $_SESSION['user']; ?></span>
                        </a>
                        <?php }else{ ?>

                        <a class="nav-link text-white" href="account.php">
                            <i class="far fa-user"></i>
                            <span>Akun Saya</span>
                        </a>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg d-flex navbar-light" style="background-color: #ffffff;">
            <div class="container">
                <a class="navbar-brand order-sm-1 order-md-1 order-lg-1" href="index.php">
                    <img src="asset/img/logo/MeKadoo.png" alt="" title="Mekadoo Official Logo">
                </a>

                <div class="button-bar order-sm-3 order-md-3 order-lg-3 ml-auto">
                    <div class="align-items-center">
                        <div class="user d-flex flex-row">
                            <div class="search">
                                <i class="fas fa-search"></i>
                            </div>

                            <div class="wishlist">
                                <a href="wishlist.php" class="btn wishlist p-1" title="Favorit">
                                    <i class="fa fa-heart fa-1x"></i>
                                </a>
                            </div>

                            <div class="cart">
                                <a href="cart.php" class="btn cart p-1" title="Troli">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="navbar-toggler order-sm-3 p-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse order-sm-3 order-3 order-md-3 order-lg-2" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-5 p-2">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark" href="product.php">Produk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark" href="about.php">Tentang Kami</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark" href="contact.php">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="search.php" method="GET" class="wrap-input-search">
            <input type="search" name="search_keyword" class="search_keyword" id="search_keyword" placeholder="Ketikkan sesuatu...">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </header>
