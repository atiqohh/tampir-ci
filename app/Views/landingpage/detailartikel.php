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
                    <?php if ($artikel['0']['gambar'] != NULL) : ?>
                        <div class="feature-img text-center">
                            <img src="<?= base_url(); ?>/img/artikel/<?= $artikel['0']['gambar']; ?>" class="gambar justify-content-center" alt="image" width="600px">
                        </div>
                    <?php endif; ?>
                    <div class="blog_details">
                        <h2 class="text-center text-capitalize"><?= $artikel['0']['judul_artikel']; ?></h2>
                        <p><?= $artikel['0']['isi_artikel']; ?></p>
                    </div>
                </div>
            </div>

            <?= $this->include('landingpage/templates/side'); ?>

        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>