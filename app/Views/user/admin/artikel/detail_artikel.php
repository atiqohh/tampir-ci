<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><b>DETAIL ARTIKEL</b></h1>
    </div>
    <div class="row">

        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul"><?= $artikel['0']['judul_artikel']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/artikeladmin/index_artikel" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Artikel</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/artikeladmin/edit_artikel/<?= $artikel['0']['id_artikel']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/artikeladmin/delete/<?= $artikel['0']['id_artikel']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($artikel['0']['gambar'] != NULL) : ?>
                <div class="card-img">
                    <div class="row mt-1">
                        <img src="<?= base_url(); ?>/img/artikel/<?= $artikel['0']['gambar']; ?>" class="gambar" alt="image" width="600px">
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body align-items-center">
                <div class="row">
                    <p class="card-text text-justify"><?= $artikel['0']['isi_artikel']; ?></p>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>