<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">DATA ADMIN</h5>
        </div>
        <br>
        <div class="button ml-4">
            <a href="<?= base_url(); ?>/user/admin/admin/new_admin" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Admin Baru</a>
        </div>

        <div class="card-body">

            <?php if (session()->getFlashData('gagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('gagal') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="nomer">NO</th>
                            <th class="text-center tabel-atur">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="nomer"><?= $i++; ?></td>
                                <td><?= $user['nama_user']; ?></td>
                                <td class="text-center"><?= $user['email']; ?></td>
                                <td class="tabel-atur">
                                    <a href="<?= base_url(); ?>/user/admin/admin/detail_admin/<?= $user['id_user']; ?>" class="btn btn-primary"><i class="fas fa-window-restore"></i> Detail</a>
                                    <a href="<?= base_url(); ?>/user/admin/admin/edit_admin/<?= $user['id_user']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>/user/admin/admin/delete/<?= $user['id_user']; ?>" class="btn btn-danger btn-hapus-admin swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                                        <i class="far fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>