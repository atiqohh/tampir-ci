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
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <h2 class="text-center text-capitalize"><?= $pengumuman['0']['judul_pengumuman']; ?></h2>
                    <br>
                    <?php if ($pengumuman['0']['lampiran'] != NULL) : ?>
                        <div class="feature-img text-center">
                            <embed type="application/pdf" src="<?= base_url(); ?>/file/pengumuman/<?= $pengumuman['0']['lampiran']; ?>" class="lampiran justify-content-center" width="1000px" height="500px">
                        </div>
                    <?php endif; ?>
                    <div class="blog_details">
                        <p><?= $pengumuman['0']['isi_pengumuman']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>