<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>WISATA</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wisata</li>
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
                    <?php foreach ($wisata as $w) : ?>
                        <article class="blog_item">
                            <div class="card text-center card-pricing">
                                <div class="card-pricing__header">
                                    <h4><?= $w['nama_wisata']; ?></h4>
                                    <br>
                                    <h5 class="font-weight-bold">Harga Tiket: <?= $w['harga_tiket']; ?></h5>
                                    <h6 class="">Buka: <?= $w['hari_operasi']; ?>,<?= $w['jam_operasi']; ?></h6>
                                    <hr class="divider d-none d-md-block">
                                    <a href="<?= base_url(); ?>/wisata/detailwisata/<?= $w['id_wisata']; ?>"><button class="button">Detail</button></a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pager->links('wisata', 'pagination') ?>
                    </nav>
                </div>
            </div>
            <?= $this->include('landingpage/templates/side'); ?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>