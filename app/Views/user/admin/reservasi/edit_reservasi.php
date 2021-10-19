<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/reservasiadmin/index_reservasi" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Reservasi</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH RESERVASI</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/reservasiadmin/update/<?= $reservasi['0']['id_reservasi']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="id_paket">Paket Wisata</label>
                            <div class="col-sm-10 col-lg-5">
                                <select class="form-control <?= ($validation->hasError('id_paket')) ? 'is-invalid' : ''; ?>" name="id_paket" id="id_paket" value="<?= $reservasi['0']['nama_paket']; ?>" required>
                                    <option value="<?= $reservasi['0']['id_paket']; ?>"><?= $reservasi['0']['nama_paket']; ?></option>
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
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="nama pemesan" value="<?= $reservasi['0']['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="alamat">Alamat Asal</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" placeholder="alamat asal pemesan" value="<?= $reservasi['0']['alamat']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="jumlah_orang">Jumlah Orang</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_orang')) ? 'is-invalid' : ''; ?>" name="jumlah_orang" id="jumlah_orang" placeholder="jumlah orang" value="<?= $reservasi['0']['jumlah_orang']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah_orang'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="tgl_reservasi">Tanggal Reservasi</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_reservasi')) ? 'is-invalid' : ''; ?>" multiple="true" name="tgl_reservasi" id="tgl_reservasi" placeholder="tanggal reservasi" value="<?= $reservasi['0']['tgl_reservasi']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_reservasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="no_hp">No HP</label>
                            <div class="col-sm-10 col-lg-5">
                                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" multiple="true" name="no_hp" id="no_hp" placeholder="no hp pemesan" value="<?= $reservasi['0']['no_hp']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_hp'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="pembayaran">Pembayaran</label>
                            <div class="col-sm-10 col-lg-5">
                                <select class="form-control <?= ($validation->hasError('pembayaran')) ? 'is-invalid' : ''; ?>" name="pembayaran" id="pembayaran" value="<?= $reservasi['0']['pembayaran']; ?>">
                                    <option value="<?= $reservasi['0']['pembayaran']; ?>"><?= $reservasi['0']['pembayaran']; ?></option>
                                    <option value="Uang Muka">Uang Muka</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pembayaran'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-left">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan reservasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>