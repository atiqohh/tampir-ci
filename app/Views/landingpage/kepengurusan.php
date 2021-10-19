<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>KEPENGURUSAN POKDARWIS TAMPIR KULON</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kepengurusan</li>
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

                </div>
            </div>

            <?= $this->include('landingpage/templates/side'); ?>

        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>