<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>PAKET WISATA</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Paket Wisata</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!--================Blog Area =================-->
<section class="blog_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach ($paket as $p) : ?>
                        <article class="blog_item">
                            <div class="card text-center card-pricing">
                                <div class="card-pricing__header">
                                    <h4><?= $p['nama_paket']; ?></h4>
                                    <br>
                                    <h5 class="font-weight-bold"><?= $p['harga_paket']; ?></h5>
                                    <hr class="divider d-none d-md-block">
                                    <p><?= $p['fasilitas']; ?></p>
                                    <hr class="divider d-none d-md-block">
                                    <a href="<?= base_url(); ?>/reservasi"><button class="button">Reservasi</button></a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <?= $this->include('landingpage/templates/side'); ?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>