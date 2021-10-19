<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>SEJARAH TAMPIR KULON</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->



<!--================Blog Area =================-->
<section class="blog_area section-margin">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="container">
                    <p class="judul-sejarah">Sejarah Desa Tampir Kulon</p>

                    <div class="row m-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13304.286521764658!2d110.24840115779787!3d-7.532586162638209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a89383563953b%3A0xae49181eada208ea!2sTampirkulon%2C%20Candimulyo%2C%20Magelang%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1613124633346!5m2!1sen!2sid" width="1000" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <br>
                        <p class="text-justify">Pada dasarnya awal mula sejarah Desa Tampir Kulon tidak dapat diceritakan secara jelas dan detail. Namun dari cerita para sesepuh secara turun temurun dikisahkan.</p>
                        <p class="text-justify">Jauh dari Bangsa Indonesia merasakan nikmatnya kemerdekaan. Bangsa Belanda menjajah negeri ini selama kurang lebih 350 tahun lamanya. Semasa penjajahan Belanda di negeri ini, rakyat selalu berjuang mengusir tentara Belanda dengan gagah berani. Pada waktu itu kerajaan Mataram memberikan perlawanan dengan menyebarkan para penggawa kerajaan untuk memimpin perang gerilya. Strategi gerilya diterapkan untuk mengelabuhi para penjajah, mengingat persenjataan para pejuang kalah jauh dari para penjajah yang sangat canggih.</p>
                        <p class="text-justify">Dari sekian banyak perlawanan rakyat terhadap penjajah yang tersebar diberbagai tempat dan pelosok untuk berperang dan bersembunyi sesuai strategi gerilya diceritakan: “Di suatu tempat, sekelompok para pejuang yang dikomando oleh penggawa Kerajaan Mataram yang bernama COKRO GATI melakukan suatu perjalanan untuk beristirahat dari perjuangan gerilya yang begitu memeras segala tenaga dan pikiran. Sang panggawa COKRO GATI memberikan suatu komando dengan perkataan “Kita mampir ing deso sebelah Kulon” yang diartikan “Mampir ing Kulon”. Maks desa tersebut hingga saat ini diberikan nama “DESA TAMPIR KULON”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>