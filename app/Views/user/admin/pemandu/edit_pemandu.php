<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/pemanduadmin/index_pemandu" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Pemandu</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT DATA PEMANDU</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/pemanduadmin/update/<?= $pemandu['0']['id']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label " for="nama_pemandu">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-p form-control <?= ($validation->hasError('nama_pemandu')) ? 'is-invalid' : ''; ?>" name="nama_pemandu" id="nama_pemandu" placeholder="Nama pemandu" value="<?= $pemandu['0']['nama_pemandu']; ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_pemandu'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ml-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan pemandu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>