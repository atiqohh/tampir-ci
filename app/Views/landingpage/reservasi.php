<?= $this->extend('landingpage/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================ Banner SM Section start =================-->
<section class="hero-banner hero-banner-sm text-center">
    <div class="container">
        <h1>RESERVASI</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
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
                    <h4 class="text-center">Reservasi Wisata Tampir Kulon</h4>
                    <br>
                    <br>

                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/reservasi/save" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="id_paket">Paket Wisata</label>
                            <div class="col-sm-10 col-lg-5">
                                <select class="form-control <?= ($validation->hasError('id_paket')) ? 'is-invalid' : ''; ?>" name="id_paket" id="id_paket" value="<?= old('id_paket'); ?>" required>
                                    <option value="">pilih paket..</option>
                                    <?php foreach ($paket as $p) : ?>
                                        <option value="<?= $p['id_paket']; ?>"><?= $p['nama_paket']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_paket'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="nama pemesan" value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="alamat">Alamat Asal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" placeholder="alamat asal pemesan" value="<?= old('alamat'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="jumlah_orang">Jumlah Orang</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_orang')) ? 'is-invalid' : ''; ?>" name="jumlah_orang" id="jumlah_orang" placeholder="jumlah orang" value="<?= old('jumlah_orang'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah_orang'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="tgl_reservasi">Tanggal Reservasi</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_reservasi')) ? 'is-invalid' : ''; ?>" multiple="true" name="tgl_reservasi" id="tgl_reservasi" placeholder="tanggal reservasi" value="<?= old('tgl_reservasi'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_reservasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-3 col-form-label" for="no_hp">No HP</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" multiple="true" name="no_hp" id="no_hp" placeholder="no hp pemesan" value="<?= old('no_hp'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_hp'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-left">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan reservasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget">
                        <h5>Petunjuk Reservasi</h5>
                        <hr>
                        <ol class="text-justify">
                            <li>Isi form reservasi dengan data yang benar</li>
                            <li>Rincian pilihan paket wisata dapat dilihat pada menu paket wisata</li>
                            <li>Setelah melakukan pengisian form, cetak bukti reservasi</li>
                            <li>Simpan bukti reservasi (file pdf)</li>
                            <li>Pembayaran uang muka reservasi ke rekening: </li>
                            <li>Konfirmasi reservasi dengan mengirim bukti reservasi dan bukti pembayaran uang muka ke narahubung: </li>
                        </ol>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>