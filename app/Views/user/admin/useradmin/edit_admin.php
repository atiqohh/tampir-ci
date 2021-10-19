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
                        <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">EDIT DATA ADMIN: <?= $users['0']['nama_user']; ?></h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" href="#editprofile" data-toggle="tab"><i class="ti-bar-chart"></i> Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#editpassword" data-toggle="tab"><i class="ti-settings"></i> Edit Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="editprofile">
                                <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/admin/update/<?= $users['0']['id_user']; ?>" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="form-group row ml-3">
                                        <label for="oldImage"></label>
                                        <input type="hidden" class="form-control" name="oldImage" value="<?= $users['0']['foto_profil']; ?>">
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label class="col-sm-2 col-form-label" for="nama_user">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" name="nama_user" id="nama_user" value="<?= $users['0']['nama_user']; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_user'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-3">
                                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= $users['0']['email']; ?>" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-3">
                                        <label class="col-sm-2 col-form-label" for="foto_profil">Foto Profil</label>
                                        <div class="col-sm-4">
                                            <label class="" for="foto_profil">
                                                <?= $users['0']['foto_profil']; ?>
                                                <input type="file" class="form-control <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" multiple="true" name="foto_profil" id="foto_profil" value="<?= $users['0']['foto_profil']; ?>">
                                            </label>
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
                            <div class="tab-pane fade" id="editpassword">
                                <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/admin/updatepassword/<?= $users['0']['id_user']; ?>" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <br>
                                    <?php if (session()->getFlashData('lama')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashData('lama') ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashData('baru')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashData('baru') ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <input type="hidden" value="<?= $users['0']['id_user']; ?>">
                                    <input type="hidden" name="password" id="password" value="<?= $users['0']['password']; ?>">

                                    <div class="form-group row ml-3">
                                        <label class="col-sm-3 col-form-label" for="pass_lama">Password Lama</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control <?= ($validation->hasError('pass_lama')) ? 'is-invalid' : ''; ?>" name="pass_lama" id="pass_lama" placeholder="masukkan password lama" value="<?= old('pass_lama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pass_lama'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-3">
                                        <label class="col-sm-3 col-form-label" for="pass_baru">Password Baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control <?= ($validation->hasError('pass_baru')) ? 'is-invalid' : ''; ?>" name="pass_baru" id="pass_baru" placeholder="masukkan password baru" value="<?= old('pass_baru'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pass_baru'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-3">
                                        <label class="col-sm-3 col-form-label" for="pass_konfirmasi">Konfirmasi Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control <?= ($validation->hasError('pass_konfirmasi')) ? 'is-invalid' : ''; ?>" name="pass_konfirmasi" id="pass_konfirmasi" placeholder="masukkan ulang password baru" value="<?= old('pass_konfirmasi'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pass_konfirmasi'); ?>
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
        </div>

    </div>
</div>
<?= $this->endSection(); ?>