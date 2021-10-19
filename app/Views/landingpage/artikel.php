<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>ARTIKEL</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
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
                    <?php foreach ($artikel as $a) : ?>
                        <article class="blog_item">
                            <?php if ($a['gambar'] != NULL) : ?>
                                <div class="blog_item_img">
                                    <img src="<?= base_url(); ?>/img/artikel/<?= $a['gambar']; ?>" class="gambar justify-content-center" alt="image" width="600px">
                                </div>
                            <?php endif; ?>
                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url(); ?>/artikel/detailartikel/<?= $a['id_artikel']; ?>">
                                    <h2 class="text-capitalize"><?= $a['judul_artikel']; ?></h2>
                                </a>
                                <p><?= substr($a['isi_artikel'], 0, 150); ?> ......</p>
                                <ul class="blog-info-link">
                                    <li><a href="<?= base_url(); ?>/artikel/detailartikel/<?= $a['id_artikel']; ?>">Baca Selengkapnya ...</a></li>
                                </ul>
                            </div>

                        </article>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pager->links('artikel', 'pagination') ?>
                    </nav>
                </div>
            </div>

            <?= $this->include('landingpage/templates/side'); ?>

        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>