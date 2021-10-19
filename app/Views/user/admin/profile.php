<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center judul">MY PROFILE</h6>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="ibox">
                                <div class="ibox-body text-center">
                                    <div class="">
                                        <br>
                                        <img src="<?= base_url('/img/user/' . session()->get('foto_profil')); ?>" class="" alt="<?= session()->get('nama_user'); ?>" width="200">
                                    </div>
                                    <hr>
                                    <h5 class="font-strong"><?= session()->get('nama_user'); ?></h5>
                                    <div class="text-muted"><?= session()->get('email'); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="ibox">
                                <div class="ibox-body">
                                    <br>
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
                                            <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/homeadmin/update/<?= session()->get('id_user'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="form-group row ml-2">
                                                    <label for="oldImage"></label>
                                                    <input type="hidden" class="form-control" name="oldImage" value="<?= session()->get('foto_profil'); ?>">
                                                </div>
                                                <br>
                                                <div class="form-group row ml-2">
                                                    <label class="col-sm-3 col-form-label" for="nama_user">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" name="nama_user" id="nama_user" value="<?= session()->get('nama_user'); ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('nama_user'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row ml-2">
                                                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= session()->get('email'); ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('email'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row ml-2">
                                                    <label class="col-sm-3 col-form-label" for="foto_profil">Foto Profil</label>
                                                    <div class="col-sm-8">
                                                        <label class="" for="foto_profil">
                                                            <?= session()->get('foto_profil'); ?>
                                                            <input type="file" class="form-control <?= ($validation->hasError('foto_profil')) ? 'is-invalid' : ''; ?>" multiple="true" name="foto_profil" id="foto_profil" value="<?= session()->get('foto_profil'); ?>">
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('foto_profil'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row ml-2">
                                                    <div class="col text-right mr-2">
                                                        <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="editpassword">
                                            <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/homeadmin/updatepassword/<?= session()->get('id_user'); ?>" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>

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

                                                <input type="hidden" value="<?= session()->get('id_user'); ?>">

                                                <br>
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
        </div>
    </div>
</div>

<?= $this->endSection(); ?>