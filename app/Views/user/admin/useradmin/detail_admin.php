<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul">DETAIL ADMIN <?= $users['0']['nama_user']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/admin/index_admin" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Admin</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/admin/edit_admin/<?= $users['0']['id_user']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/admin/delete/<?= $users['0']['id_user']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="row no-gutters">
                    <div class="col-md-4 card-img mt-2 ml-5 mb-2">
                        <img src="<?= base_url('/img/user/' . $users['0']['foto_profil']); ?>" class="fotoprofil" alt="<?= $users['0']['nama_user']; ?>">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-row" style="width: 28%">
                                                <b>Nama </b>
                                            </div>
                                            <div class="col" style="width: 72%">
                                                : <?= $users['0']['nama_user']; ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-row" style="width: 28%">
                                                <b>Email </b>
                                            </div>
                                            <div class="col" style="width: 72%">
                                                : <?= $users['0']['email']; ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>