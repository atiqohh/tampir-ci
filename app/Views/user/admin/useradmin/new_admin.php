<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/admin/index_admin" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Admin</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH DATA ADMIN</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/admin/save" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="nama_user">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" name="nama_user" id="nama_user" placeholder="nama admin.." value="<?= old('nama_user'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="email admin.." value="<?= old('email'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="password admin.." value="<?= old('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="pass_konfirmasi">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control <?= ($validation->hasError('pass_konfirmasi')) ? 'is-invalid' : ''; ?>" name="pass_konfirmasi" id="pass_konfirmasi" placeholder="konfirmasi password admin.." value="<?= old('pass_konfirmasi'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pass_konfirmasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="foto_profil">Foto Profil</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" multiple="true" name="foto_profil" id="foto_profil" value="<?= old('foto_profil'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto_profil'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>