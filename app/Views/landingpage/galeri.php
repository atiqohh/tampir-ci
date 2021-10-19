<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>GALERI</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!--================Galeri Area =================-->
<div class="card-body">
    <div class="card shadow mb-4">
        <div class="card-body">
            <section id="portfolio" class="portfolio">
                <div class="container">
                    <!-- Container for the image gallery -->
                    <div class="container">

                        <!-- Full-width images with number text -->
                        <?php foreach ($galeri as $g) : ?>
                            <div class="mySlides text-center">
                                <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" height="550px" width="550px">
                            </div>
                        <?php endforeach; ?>

                        <!-- Next and previous buttons -->
                        <a class="prevslide" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="nextslide" onclick="plusSlides(1)">&#10095;</a>

                        <!-- Image text -->
                        <div class="caption-container">
                            <p id="caption">
                            </p>
                        </div>

                        <!-- Thumbnail images -->
                        <div class="row">
                            <?php foreach ($galeri as $g) : ?>
                                <div class="column">
                                    <br>
                                    <img class="demo cursor" src="<?= base_url('img/galeri/' . $g['gambar']); ?>" style="width:100%" onclick="currentSlide(1)" alt="<?= $g['ket']; ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>