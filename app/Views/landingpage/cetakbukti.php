<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>CETAK BUKTI RESERVASI</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cetak Bukti Reservasi</li>
            </ol>
        </nav>
    </div>
</section>
<!--================ Banner SM Section end =================-->

<!--================Blog Area =================-->
<section class="blog_area section-margin">
    <div class="container">
        <div class="text-center text-bold">
            <h3>CETAK BUKTI RESERVASI</h3>
        </div>
        <div class="cetakbukti">
            <hr>
            <h6>Silahkan cetak bukti reservasi ini untuk konfirmasi kepada narahubung!!</h6>
            <hr>
            <form action="<?= base_url(); ?>/reservasi/cetak" method="post" target="_blank">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-8 cap">: <?= $nama; ?></div>
                    <input type="hidden" class="" name="nama" id="nama" value="<?= $nama; ?>">
                </div>
                <div class="form-group row ">
                    <label class="col-sm-3 col-form-label" for="paket">Paket</label>
                    <div class="col-sm-8">: <?= $paket['0']['nama_paket']; ?></div>
                    <input type="hidden" class="" name="paket" id="paket" value="<?= $paket['0']['nama_paket']; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-8 cap">: <?= $alamat; ?></div>
                    <input type="hidden" class="" name="alamat" id="alamat" value="<?= $alamat; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="jumlah_orang">Jumlah Orang</label>
                    <div class="col-sm-8">: <?= $jumlah_orang; ?></div>
                    <input type="hidden" class="" name="jumlah_orang" id="jumlah_orang" value="<?= $jumlah_orang; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="tgl_reservasi">Tanggal Reservasi</label>
                    <div class="col-sm-8">: <?= $tgl_reservasi; ?></div>
                    <input type="hidden" class="" name="tgl_reservasi" id="tgl_reservasi" value="<?= $tgl_reservasi; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="no_hp">No HP</label>
                    <div class="col-sm-8">: <?= $no_hp; ?></div>
                    <input type="hidden" class="" name="no_hp" id="no_hp" value="<?= $no_hp; ?>">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary pdf"><i class="fas fa-print"></i> Cetak Bukti Reservasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>

<!-- Export MPDF -->
<script>
    $('.pdf').on("click", function() {
        window.location = "<?= base_url(); ?>/reservasi/cetak";
    });
</script>
<!-- Export MPDF -->