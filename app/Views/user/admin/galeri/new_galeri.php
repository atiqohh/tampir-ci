<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/galeriadmin/index_galeri" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Galeri</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH GAMBAR</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/galeriadmin/save" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" multiple name="gambar" id="gambar" value="<?= old('gambar'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="ket">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan gambar" value="<?= old('ket'); ?>" autofocus>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan Gambar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>