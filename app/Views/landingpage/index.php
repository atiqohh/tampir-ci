<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner Section start =================-->
<section class="hero-banner text-center">
    <div class="container">
        <p class="text-uppercase"></p>
        <h1>POKDARWIS TAMPIR KULON ASRI</h1>
        <p class="hero-subtitle"></p>
    </div>
</section>
<!--================ Banner Section end =================-->


<!--================ Daya tarik section start =================-->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="card-feature card-feature-content">
                    <h2>Daya Tarik Wisata Tampir Kulon</h2>
                    <p></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="img/home/png/003-pencil.png" alt="">
                        </div>
                        <h3>Wisata Alam</h3>
                        <p>Wisata Tampir Kulon memiliki daya tarik wisata alam, yaitu sungai dengan air yang jernih dan area persawahan</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="img/home/png/004-home-page.png" alt="">
                        </div>
                        <h3>Wisata Budaya</h3>
                        <p>Daya tarik wisata budaya Tampir Kulon antara lain kerajinan, rumah tradisional dan tari tradisional</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="img/home/png/005-headset.png" alt="">
                        </div>
                        <h3>Kuliner</h3>
                        <p>Di Desa Wisata Tampir Kulon terdapat beberapa tempat makan, mulai dari cafe hingga rumah makan keluarga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Daya tarik section end =================-->


<!--================ Paket wisata section start =================-->
<section class="section-padding priceTable-bg">
    <div class="container">
        <div class="section-intro-white pb-40px text-center">
            <h2>Paket Wisata</h2>
            <div class="section-style"></div>
            <br>
        </div>

        <div class="priceTable-relative">
            <div class="priceTable-wrapper">
                <div class="row">
                    <?php foreach ($paket as $p) : ?>
                        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="card text-center card-pricing">
                                <div class="card-pricing__header">
                                    <h4><?= $p['nama_paket']; ?></h4>
                                    <br>
                                    <h5 class="font-weight-bold"><?= $p['harga_paket']; ?></h5>
                                    <!-- Divider -->
                                    <hr class="divider d-none d-md-block">
                                    <a href="<?= base_url(); ?>/paket"><button class="button">Detail</button></a>
                                    <a href="<?= base_url(); ?>/reservasi"><button class="button">Reservasi</button></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Paket wisata section end =================-->


<!--================ Fasilitas section start =================-->
<section class="section-margin mb-5 pb-50px">
    <div class="container">
        <div class="section-intro pb-40px text-center">
            <h2>Fasilitas</h2>
            <div class="section-style"></div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/006-server.png" alt="">
                    </div>
                    <h3>Penginapan</h3>
                    <p>Terdapat fasilitas penginapan yaitu <i>Homestay</i> “Omah Mbok e“ yang dapat digunakan wisatawan untuk menginap dan beristirahat</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/004-home-page.png" alt="">
                    </div>
                    <h3>Pemandu Wisata</h3>
                    <p>Wisatawan yang datang akan didampingi oleh pemandu wisata berpengalaman</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/007-server-1.png" alt="">
                    </div>
                    <h3>Balai Pertemuan</h3>
                    <p>Balai pertemuan yang dapat digunakan yaitu Balai Desa Tampirkulon, Ruang Pertemuan “Omah Mbok e” dan Omah Sawah</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/002-shield.png" alt="">
                    </div>
                    <h3>Toilet</h3>
                    <p>Terdapat toilet umum dibeberapa titik yang dapat digunakan oleh wisatawan</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/008-mail.png" alt="">
                    </div>
                    <h3>Tempat Makan</h3>
                    <p>Terdapat beberapa tempat makan yang dapat menjadi pilihan wisata untuk menyantap makanan</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-service text-center">
                    <div class="service-icon">
                        <img src="img/home/png/009-art.png" alt="">
                    </div>
                    <h3>Area Parkir</h3>
                    <p>Area wisata Tampir Kulon dilengkapi dengan area parkir yang cukup luas</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Fasilitas section end =================-->



<!--================ Galeri section start =================-->
<section class="section-padding galeri-bg">
    <div class="container">
        <div class="section-intro-white text-center">
            <h2>GALERI</h2>
            <div class="section-style"></div>
            <br>
        </div>

        <div class="priceTable-relative">
            <div class="priceTable-wrapper">
                <div class="row">
                    <div class="owl-carousel owl-theme testimonial">
                        <?php foreach ($galeri as $galeri) : ?>
                            <img src="<?= base_url('img/galeri/' . $galeri['gambar']); ?>" class="img-fluid" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div>
</section>
<!--================ Galeri section end =================-->

<!--================ Pengumuman section start =================-->
<section class="bg-gray section-padding">
    <div class="container">
        <div class="section-intro text-center">
            <h2>Pengumuman</h2>
            <div class="section-style"></div>
            <br>
        </div>

        <div class="owl-carousel owl-theme testimonial">
            <?php foreach ($pengumuman as $pengumuman) : ?>
                <div class="testimonial-item">
                    <div class="media">
                        <div class="media-body text-center">
                            <h4><?= $pengumuman['judul_pengumuman']; ?></h4>
                            <p><?= $pengumuman['created_at']; ?></p>
                            <hr class="divider d-none d-md-block">
                            <a href="<?= base_url(); ?>/pengumuman/detailpengumuman/<?= $pengumuman['id_pengumuman']; ?>"><button class="button">Detail</button></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--================ Pengumuman section end =================-->

<!--================  Dedicated server section start =================-->
<!-- <section class="section-margin">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="mb-4">Dedicated <br class="d-none d-xl-block"> and Secured server <br class="d-none d-xl-block"> for your website</h2>
                <p>There third us one you. Spirit tree. Together have brought bez and to wherein a so above all female likeness open herbed rappear yielding own behold fourth without. You creature kind cree There third us one your</p>
            </div>
            <div class="col-lg-7">
                <div class="text-center">
                    <img class="img-fluid" src="img/home/server.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--================  Dedicated server section end =================-->

<?= $this->endSection(); ?>