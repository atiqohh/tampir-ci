<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <!-- <link rel="icon" href="img/Fevicon.png" type="image/png"> -->

    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/mystyle.css">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/aos/aos.css" rel="stylesheet">

</head>

<body>

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="<?= base_url(); ?>/home"><img src="img/logo.png" alt=""></a>
                    <p class="judul mt-3">POKDARWIS TAMPIR KULON ASRI</p>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url(); ?>/home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/artikel">Artikel</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/wisata">Wisata</a>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/paket">Paket Wisata</a>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/reservasi">Reservasi</a>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/galeri">Galeri</a>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/umkm">UMKM</a>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tentang Kami</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/tentangkami/sejarah">Sejarah</a>
                                        <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/tentangkami/kepengurusan">Kepengurusan</a> -->
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/tentangkami/kontak">Kontak</a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <?= $this->renderSection('content'); ?>


    <!-- ================ start footer Area ================= -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4 class="text-center">LOKASI</h4>
                    <h6 class="text-center">Tampir Kulon, Candimulyo, Magelang, Jawa Tengah</h6>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4 class="text-center">KONTAK</h4>
                    <ul class="text-center">
                        <li>
                            <h6 class="mb-1">Phone: </h6>
                            <h6><a href="tel:085643092969">085643092969</a></h6>
                        </li>
                        <li></li>
                        <li>
                            <h6 class="mb-1">Email:</a></h6>
                            <h6><a href="mailto:desawisatatampirkulon@gmail.com">desawisatatampirkulon@gmail.com</a></h6>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4 class="text-center">SOSIAL MEDIA</h4>
                    <ul class="text-center">
                        <li><a href="#"><i class="ti-youtube"></i> Youtube</a></li>
                        <li><a href="https://www.instagram.com/xanggastubingtampirkulon/" target="_blank""><i class=" ti-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i> Twitter</a></li>
                        <li><a href=""><i class="ti-facebook"></i> Facebook</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom row align-items-center text-center text-lg-left">
                <p class="footer-text m-0 col-lg-8 col-md-12">
                    Copyright &copy; Pokdarwis Tampir Kulon Asri <?= date('Y'); ?>
                </p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="https://www.instagram.com/xanggastubingtampirkulon/" target="_blank""><i class=" ti-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->


    <script src="<?= base_url(); ?>/vendor/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>/js/lora/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url(); ?>/js/lora/mail-script.js"></script>
    <script src="<?= base_url(); ?>/js/lora/main.js"></script>
</body>

</html>