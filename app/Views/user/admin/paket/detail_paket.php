<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><b>DETAIL PAKET WISATA</b></h1>
    </div>

    <div class="row">

        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul"><?= $paket['0']['nama_paket']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/paketadmin/index_paket" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Paket</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/paketadmin/edit_paket/<?= $paket['0']['id_paket']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/paketadmin/delete/<?= $paket['0']['id_paket']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body align-items-center">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Harga Paket </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $paket['0']['harga_paket']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Fasilitas</b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $paket['0']['fasilitas']; ?>
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