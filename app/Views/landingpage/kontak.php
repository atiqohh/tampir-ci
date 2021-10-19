<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>KONTAK</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!-- ================ contact section start ================= -->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="d-none d-sm-block mb-5 pb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4179639621784!2d110.24834333305233!3d-7.529308246990212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a89398fdd6d91%3A0x72a8dcf38370af26!2sTUBING%20X-ANGGAS!5e0!3m2!1sen!2sid!4v1612939066772!5m2!1sen!2sid" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="d-none d-sm-block mt-5 pb-4 ml-3">
                <div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Alamat Kantor</h3>
                            <p>Tampir Kulon, Candimulyo,</p>
                            <p>Magelang, Jawa Tengah</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:085643092969">No WA: 085643092969</a></h3>
                            <p>Senin-Minggu (24 jam)</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:desawisatatampirkulon@gmail.com">desawisatatampirkulon@gmail.com</a></h3>
                            <!-- <p>Send us your query anytime!</p> -->
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-instagram"></i></span>
                        <div class="media-body">
                            <h3><a href="https://www.instagram.com/xanggastubingtampirkulon/" target="_blank">@xanggastubingtampirkulon</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?= $this->endSection(); ?>