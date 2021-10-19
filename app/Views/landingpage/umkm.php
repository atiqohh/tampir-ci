<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>UMKM Tampir Kulon</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">UMKM</li>
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
                    <?php foreach ($umkm as $umkm) : ?>
                        <article class="blog_item">
                            <div class="card text-center card-pricing">
                                <?php if ($umkm['gambar'] != NULL) : ?>
                                    <div class="row">
                                        <div class="col-lg-8 mb-lg-0">
                                            <div class="blog_item_img">
                                                <img src="<?= base_url(); ?>/img/umkm/<?= $umkm['gambar']; ?>" class="gambar justify-content-center" alt="image" height="300px" width="500px">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 ml-4">
                                            <div class="card-pricing__header">
                                                <h4><?= $umkm['nama_umkm']; ?></h4>
                                                <br>
                                                <h5 class="font-weight-bold">Pemilik: <?= $umkm['pemilik']; ?></h5>
                                                <h6 class="">Kontak: <?= $umkm['kontak']; ?></h6>
                                                <hr class="divider d-none d-md-block">
                                                <a href="<?= base_url(); ?>/umkm/detailumkm/<?= $umkm['id_umkm']; ?>"><button class="button">Detail</button></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="card-pricing__header">
                                        <h4><?= $umkm['nama_umkm']; ?></h4>
                                        <br>
                                        <h5 class="font-weight-bold">Pemilik: <?= $umkm['pemilik']; ?></h5>
                                        <h6 class="">Kontak: <?= $umkm['kontak']; ?></h6>
                                        <hr class="divider d-none d-md-block">
                                        <a href="<?= base_url(); ?>/umkm/detailumkm/<?= $umkm['id_umkm']; ?>"><button class="button">Detail</button></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pager->links('umkm', 'pagination') ?>
                    </nav>
                </div>
            </div>
            <?= $this->include('landingpage/templates/side'); ?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>