<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>pengumuman</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">pengumuman</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!--================Blog Area =================-->
<section class="blog_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <?php foreach ($pengumuman as $p) : ?>
                    <article class="blog_item">
                        <div class="blog_details">
                            <a class="d-inline-block" href="<?= base_url(); ?>/pengumuman/detailpengumuman/<?= $p['id_pengumuman']; ?>">
                                <h2 class="text-capitalize"><?= $p['judul_pengumuman']; ?></h2>
                            </a>
                            <p><?= substr($p['isi_pengumuman'], 0, 150); ?> ......</p>
                            <ul class="blog-info-link">
                                <li><a href="<?= base_url(); ?>/pengumuman/detailpengumuman/<?= $p['id_pengumuman']; ?>">Baca Selengkapnya ...</a></li>
                            </ul>
                        </div>

                    </article>
                <?php endforeach; ?>

                <nav class="blog-pagination justify-content-center d-flex">
                    <?= $pager->links('pengumuman', 'pagination') ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>