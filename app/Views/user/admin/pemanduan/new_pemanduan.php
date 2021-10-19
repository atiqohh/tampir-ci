<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Pemanduan: <?= $pemandu['0']['nama_pemandu']; ?></h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/pemanduanadmin/save/<?= isset($pemandu['0']['id']); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="col-sm-10">
                            <input type="hidden" class="" name="id" id="id" value="<?= isset($pemandu['0']['id']); ?>">
                        </div>

                        <?php if (isset($pemandu['0']['id'])) : ?>
                            <div class="col-sm-10">
                                <input type="hidden" class="" name="id" id="id" value="<?= isset($pemandu['0']['id']); ?>">
                            </div>
                        <?php else : ?>
                            <div class="col-sm-10">
                                <label class="col-sm-2 col-form-label" for="id">Nama Pemandu</label>
                                <div class="col-sm-10 col-lg-5">
                                    <select class="form-control <?= ($validation->hasError('id')) ? 'is-invalid' : ''; ?>" name="id" id="id" value="<?= old('id'); ?>" required>
                                        <option value="">pilih nama pemandu..</option>
                                        <?php foreach ($p as $p) : ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['nama_pemandu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="form-group row ml-3 lenght-10">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal Pemanduan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-p form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" id="tanggal" placeholder="Tanggal Pemanduan" value="<?= old('tanggal'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="waktu">Waktu Pemanduan</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-p form-control <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" name="waktu" id="waktu" placeholder="Waktu Pemanduan" value="<?= old('waktu'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('waktu'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="jumlah">Jumlah Pengunjung</label>
                            <div class="col-sm-10">
                                <input type="number" class=" form-p form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" name="jumlah" id="jumlah" placeholder="Jumlah Pengunjung yang Dipandu" value="<?= old('jumlah'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col mt-1">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>