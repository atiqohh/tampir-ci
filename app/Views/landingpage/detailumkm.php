<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!--================Blog Area =================-->
<section class="blog_area single-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h2 class="text-center text-uppercase"><?= $umkm['0']['nama_umkm']; ?></h2>
                    </div>
                    <?php if ($umkm['0']['gambar'] != NULL) : ?>
                        <div class="feature-img text-center">
                            <img src="<?= base_url(); ?>/img/umkm/<?= $umkm['0']['gambar']; ?>" class="gambar justify-content-center" alt="image" width="600px">
                        </div>
                    <?php endif; ?>
                    <div class="blog_details">
                        <h6 class="font-weight-bold text-center">Pemilik: <?= $umkm['0']['pemilik']; ?></h6>
                        <h6 class="text-center">Kontak: <?= $umkm['0']['kontak']; ?></h6>
                        <p><?= $umkm['0']['deskripsi']; ?></p>
                    </div>
                </div>
            </div>

            <?= $this->include('landingpage/templates/side'); ?>

        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>