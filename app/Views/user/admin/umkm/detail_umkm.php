<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><b>DETAIL UMKM</b></h1>
    </div>

    <div class="row">

        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul"><?= $umkm['0']['nama_umkm']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/umkmadmin/index_umkm" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar UMKM</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/umkmadmin/edit_umkm/<?= $umkm['0']['id_umkm']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/umkmadmin/delete/<?= $umkm['0']['id_umkm']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($umkm['0']['gambar'] != NULL) : ?>
                <div class="card-img">
                    <div class="row">
                        <img src="<?= base_url('img/umkm/' . $umkm['0']['gambar']); ?>" class="gambar" alt="image" width="500px">
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body align-items-center">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Pemilik </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $umkm['0']['pemilik']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Kontak </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $umkm['0']['kontak']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Deskripsi </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $umkm['0']['deskripsi']; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>