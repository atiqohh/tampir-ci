<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><b>DETAIL PENGUMUMAN</b></h1>
    </div>

    <div class="row">

        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul"><?= $pengumuman['0']['judul_pengumuman']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/pengumumanadmin/index_pengumuman" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Pengumuman</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/pengumumanadmin/edit_pengumuman/<?= $pengumuman['0']['id_pengumuman']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/pengumumanadmin/delete/<?= $pengumuman['0']['id_pengumuman']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($pengumuman['0']['lampiran'] != NULL) : ?>
                <div class="card-img text-center">
                    <div class="row justify-content-center">
                        <embed type="application/pdf" src="<?= base_url(); ?>/file/pengumuman/<?= $pengumuman['0']['lampiran']; ?>" class="lampiran" width="1000" height="400">
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body align-items-center">
                <div class="row">
                    <p class="card-text text-justify"><?= $pengumuman['0']['isi_pengumuman']; ?></p>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>